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
                <h5 class="card-title">Form Courses</h5>
                <form action="/admin/courses/store" method="post">
                    @csrf
                    <div class="row mb-3">
                        <label for="hari" class="col-sm-2 col-form-label">Hari</label>
                        <div class="col-sm-10">
                            <select class="form-select" name="hari" id="hari">
                                <option value="">-- Pilih Hari --</option>
                                <option value="Senin">Senin</option>
                                <option value="Selasa">Selasa</option>
                                <option value="Rabu">Rabu</option>
                                <option value="Kamis">Kamis</option>
                                <option value="Jumat">Jumat</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="waktu" class="col-sm-2 col-form-label">Waktu</label>
                        <div class="col-sm-10">
                            <input type="time" name="waktu" id="waktu" class="form-control">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="ruang" class="col-sm-2 col-form-label">Ruang</label>
                        <div class="col-sm-10">
                            <input type="text" name="ruang" id="ruang" class="form-control">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="matkul" class="col-sm-2 col-form-label">Matkul</label>
                        <div class="col-sm-10">
                            <input type="text" name="matkul" id="matkul" class="form-control">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label for="dosen" class="col-sm-2 col-form-label">Dosen</label>
                        <div class="col-sm-10">
                            <input type="text" name="dosen" id="dosen" class="form-control">
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
