<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    //method untuk menampilkan student 
    public function index()
    {
        // tarik data dari db
        $students = Student::all();

        // panggil view dan kirim data students
        return view('admin.contents.student.index', [
            'students' => $students,
        ]);
    }

    //method untuk menampilkan form tambah student 
    public function create(){
        return view('admin.contents.student.create');
    }
    //method untuk menyimpan data baru 
    public function store(Request $request){

        // dd($request->all());
        // Validasi Request
        $request->validate([
            'name' => 'required',
            'nim' => 'required|numeric',
            'class' => 'required',
            'major' => 'required',
        ]);

        // Simpan ke Database
        Student::create([
            'name' => $request->name,
            'nim' => $request->nim,
            'class' => $request->class,
            'major' => $request->major,
        ]);

        // kembalikan ke halaman student
        return redirect('/admin/student')->with('message', 'Berhasil Menambahkan Student');
    }



    // method untuk menampilkan form edit
    public function edit($id){
        // cari data student berdasarkan id
        $student = Student::find($id); // select * from students where id=$id;

        return view('admin.contents.student.edit', [
            'student' => $student
        ]);
    }
    // Menyimpan hasil update
    public function update($id, Request $request){
        // cari data student berdasarkan id
        $student = Student::find($id); // select * from students where id=$id;

        // Validasi Request
        $request->validate([
            'name' => 'required',
            'nim' => 'required|numeric',
            'class' => 'required',
            'major' => 'required',
        ]);

        // Simpan Perubahan
        $student->update([
            'name' => $request->name,
            'nim' => $request->nim,
            'class' => $request->class,
            'major' => $request->major,
        ]);

         // kembalikan ke halaman student
         return redirect('/admin/student')->with('message', 'Berhasil Mengedit Student');
    }


    // Method untuk menghapus student
    public function destroy($id){
        // cari data student berdasarkan id
        $student = Student::find($id); // select * from students where id=$id;

        // hapus student
        $student->delete();

        // kembalikan ke halaman student
        return redirect('/admin/student')->with('message', 'Berhasil Menghapus Student');
    }
}
