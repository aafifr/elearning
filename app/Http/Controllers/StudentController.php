<?php

namespace App\Http\Controllers;

use App\Models\Courses;
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
    public function create()
    {
        // mendapatkan data courses
        $courses = Courses::all();

        // panggil view
        return view('admin.contents.student.create', [ 'courses' => $courses,]);
    }
    //method untuk menyimpan data baru 
    public function store(Request $request)
    {

        // dd($request->all());
        // Validasi Request
        $request->validate([
            'name' => 'required',
            'nim' => 'required|numeric',
            'class' => 'required',
            'major' => 'required',
            'courses_id' => 'nullable',
        ]);

        // Simpan ke Database
        Student::create([
            'name' => $request->name,
            'nim' => $request->nim,
            'class' => $request->class,
            'major' => $request->major,
            'courses_id' => $request->courses_id,
        ]);

        // kembalikan ke halaman student
        return redirect('/admin/student')->with('message', 'Berhasil Menambahkan Student');
    }



    // method untuk menampilkan form edit
    public function edit($id)
    {
        // cari data student berdasarkan id
        $student = Student::find($id); // select * from students where id=$id;

        // Mendapatkan data courses
        $courses = Courses::all();

        return view('admin.contents.student.edit', [
            'student' => $student,
            'courses' => $courses,
        ]);

    }
    // Menyimpan hasil update
    public function update($id, Request $request)
    {
        // cari data student berdasarkan id
        $student = Student::find($id); // select * from students where id=$id;

        // Validasi Request
        $request->validate([
            'name' => 'required',
            'nim' => 'required|numeric',
            'class' => 'required',
            'major' => 'required',
            'courses_id' => 'nullable',
        ]);

        // Simpan Perubahan
        $student->update([
            'name' => $request->name,
            'nim' => $request->nim,
            'class' => $request->class,
            'major' => $request->major,
            'courses_id' => $request->courses_id,
        ]);

        // kembalikan ke halaman student
        return redirect('/admin/student')->with('message', 'Berhasil Mengedit Student');
    }


    // Method untuk menghapus student
    public function destroy($id)
    {
        // cari data student berdasarkan id
        $student = Student::find($id); // select * from students where id=$id;

        // hapus student
        $student->delete();

        // kembalikan ke halaman student
        return redirect('/admin/student')->with('message', 'Berhasil Menghapus Student');
    }
}
