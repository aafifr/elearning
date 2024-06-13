<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    // menampilkan data dari database
    public function index(){
        // tarik data dari db
        $courses = Courses::all();

        // panggil view dan kirim data students
        return view('admin.contents.courses.index', [
            'courses' => $courses,
        ]);
    }

    //method untuk menampilkan form tambah student 
    public function create(){
        return view('admin.contents.courses.create');
    }

    //method untuk menyimpan data baru 
    public function store(Request $request){

        // dd($request->all());
        // Validasi Request
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'description' => 'required',
        ]);

        // Simpan ke Database
        Courses::create([
            'name' => $request->name,
            'category' => $request->category,
            'description' => $request->description,
        ]);

        // kembalikan ke halaman student
        return redirect('/admin/courses')->with('message', 'Berhasil Menambahkan Student');
    }


    // method untuk menampilkan form edit
    public function edit($id){
        // cari data student berdasarkan id
        $courses = Courses::find($id); // select * from students where id=$id;

        return view('admin.contents.courses.edit', [
            'courses' => $courses
        ]);
    }
    // Menyimpan hasil update
    public function update($id, Request $request){
        // cari data student berdasarkan id
        $courses = Courses::find($id); // select * from students where id=$id;

        // Validasi Request
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'description' => 'required',
        ]);

        // Simpan Perubahan
        $courses->update([
            'name' => $request->name,
            'category' => $request->category,
            'description' => $request->description,
        ]);

         // kembalikan ke halaman courses
         return redirect('/admin/courses')->with('message', 'Berhasil Mengedit Courses');
    }

    // Method untuk menghapus courses
    public function destroy($id){
        // cari data courses berdasarkan id
        $courses = Courses::find($id); // select * from courses where id=$id;

        // hapus courses
        $courses->delete();

        // kembalikan ke halaman courses
        return redirect('/admin/courses')->with('message', 'Berhasil Menghapus Courses');
    }
}
