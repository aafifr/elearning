@extends('admin.main')
@section('content')
<div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"></li>
        <li class="breadcrumb-item active">Courses</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="card">
        <div class="card-body">
            <a href="/admin/courses/create" class="btn btn-primary my-4">+ Courses</a>
            <table class="table">
                <tr>
                    <th>No</th>
                    <th>Hari</th>
                    <th>Waktu</th>
                    <th>Ruang</th>
                    <th>Matkul</th>
                    <th>Dosen</th>
                    <th>Action</th>
                </tr>
                @foreach($courses as $courses)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $courses->hari }}</td>
                    <td>{{ $courses->waktu }}</td>
                    <td>{{ $courses->ruang }}</td>
                    <td>{{ $courses->matkul }}</td>
                    <td>{{ $courses->dosen }}</td>
                    <td class="d-flex">
                        <a href="/admin/courses/edit/{{ $courses->id }}" class="btn btn-warning me-1"></i>Edit</a>
                        <form action="/admin/courses/delete/{{ $courses->id }}" method="post">
                          @csrf
                          @method('DELETE')
                          <button class="btn btn-danger" type="submit" onclick="return confirm('Apakah anda yakin?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
  </section>
@endsection