@extends('admin.main')
@section('content')
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"></li>
                <li class="breadcrumb-item active">Student</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Form Student</h5>
                <form action="/admin/student/store" method="post">
                    @csrf
                    <div class="row mb-3">
                        <label for="name" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" id="name" class="form-control">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="nim" class="col-sm-2 col-form-label">NIM</label>
                        <div class="col-sm-10">
                            <input type="text" name="nim" id="nim" class="form-control">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="class" class="col-sm-2 col-form-label">Class</label>
                        <div class="col-sm-10">
                            <input type="text" name="class" id="class" class="form-control">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label for="major" class="col-sm-2 col-form-label">Major</label>
                        <div class="col-sm-10">
                            <select class="form-select" name="major" id="major">
                                <option value="">-- Pilih Jurusan --</option>
                                <option value="Teknik Informatika">Teknik Informatika</option>
                                <option value="Sistem Informasi">Sistem Informasi</option>
                                <option value="Bisnis Digital">Bisnis Digital</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label class="col-sm-2"></label>
                        <div class="col-sm-10">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
