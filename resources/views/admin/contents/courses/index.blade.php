@extends('admin.main')
@section('content')
    <div class="pagetitle">
        <h1>Courses</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item active">Courses</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="card">
            <div class="card-body">
                @if (Auth::user()->role == 'admin')
                    <a href="/admin/courses/create" class="btn btn-primary my-4"><i class="bx bx-plus"></i> Courses</a>
                @endif
                <table class="table">
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Description</th>
                        @if (Auth::user()->role == 'admin')
                        <th>Action</th>
                        @endif
                    </tr>
                    @foreach ($courses as $courses)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $courses->name }}</td>
                            <td>{{ $courses->category }}</td>
                            <td>{{ $courses->description }}</td>
                            @if (Auth::user()->role == 'admin')
                            <td class="d-flex">
                                    <a href="/admin/courses/edit/{{ $courses->id }}" class="btn btn-warning me-1"><i
                                            class="bx bxs-edit"></i></a>
                                <form action="/admin/courses/delete/{{ $courses->id }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit"
                                        onclick="return confirm('Apakah anda yakin?')"><i class="bx bxs-trash"></i></button>
                                </form>
                            </td>
                            @endif
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </section>
@endsection
