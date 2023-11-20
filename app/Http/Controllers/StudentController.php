<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();
        return view('students.index', ['students' => $students]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nim' => 'required|max:10|unique:students',
            'nama' => 'required|max:50',
            'prodi' => 'required|max:15',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'photo' => 'required|file',
            'telepon' => 'required|max:12|unique:students'
        ]);

        $ext = $request->file('photo')->extension();
        //check ekstensi foto
        if (!in_array($ext, ['jpg', 'jpeg', 'png'])) {
            return redirect()->back()->withInput()->withErrors(['photo' => 'The photo must be a jpg, jpeg, or png file.']);
        }

        $path = $request->file('photo')->storePublicly('photos', 'public');
        // $ext = $request->file('photos')->extension();
        // return "File stored at: " . $path . "<br />File Extension: " . $ext;
        $students = new Student();
        $students->nim = $request->nim;
        $students->nama = $request->nama;
        $students->prodi = $request->prodi;
        $students->tanggal_lahir = $request->tanggal_lahir;
        $students->alamat = $request->alamat;
        $students->telepon = $request->telepon;
        $students->photo = $path;
        $students->save();
        // dd($request->all());
        // // return 'Berhasil Menyimpan data students dengan id= ' . $students->id;
        return redirect('/students');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $students = Student::findOrFail($id);
        $photos = Storage::url($students->photo);
        return view('students.show', ['students' => $students, 'photos' => $photos]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $students =  Student::findOrFail($id);
        return view('students.edit', ['students' => $students]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'nim' => 'max:10',
            'nama' => 'max:50',
            'prodi' => 'max:15',
            'tanggal_lahir' => '',
            'alamat' => '',
            'photo' => 'file',
            'telepon' => 'max:12'
        ]);
        // Check duplicate nim
        $students = Student::where('nim', $request->nim)
            ->where('id', '!=', $id)
            ->get();
        if ($students->count() > 0) {
            return redirect()->back()->withInput()->withErrors(['nim' => 'The nim is already taken.']);
        }

        // Check duplicate telepon
        $students = Student::where('telepon', $request->telepon)
            ->where('id', '!=', $id)
            ->get();
        if ($students->count() > 0) {
            return redirect()->back()->withInput()->withErrors(['telepon' => 'The number is already used.']);
        }

        $students = Student::findOrFail($id);
        if ($request->file('photo') == null) {
            $students->nim = $request->nim;
            $students->nama = $request->nama;
            $students->prodi = $request->prodi;
            $students->tanggal_lahir = $request->tanggal_lahir;
            $students->alamat = $request->alamat;
            $students->telepon = $request->telepon;
            $students->created_at = $request->created_at;                // Kalo ga keitung jumlah kolom, ntar di komen aja
            $students->updated_at = $request->updated_at;                // Kalo ga keitung jumlah kolom, ntar di komen aja
            $students->save();
        } else {
            $ext = $request->file('photo')->extension();
            if (!in_array($ext, ['jpg', 'jpeg', 'png'])) {
                return redirect()->back()->withInput()->withErrors(['photo' => 'The photo must be a jpg, jpeg, or png file.']);
            }

            $path = $request->file('photo')->storePublicly('photos', 'public');
            $students->nim = $request->nim;
            $students->nama = $request->nama;
            $students->prodi = $request->prodi;
            $students->tanggal_lahir = $request->tanggal_lahir;
            $students->alamat = $request->alamat;
            $students->telepon = $request->telepon;
            $students->photo = $path;
            $students->created_at = $request->created_at;                // Kalo ga keitung jumlah kolom, ntar di komen aja
            $students->updated_at = $request->updated_at;                // Kalo ga keitung jumlah kolom, ntar di komen aja
            $students->save();
        }
        // return 'Berhasil Menyimpan data students dengan id= ' . $students->id;
        return redirect('/students');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $students = Student::find($id);
        $students->delete();
        return redirect('/students');
    }
}
