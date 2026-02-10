@extends('layouts.admin.main')
@section('title', 'Tambah Data Siswa')

@section('content')
    <div class="content">
        <section class="content-header">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Tambah Data Siswa</h3>
                        </div>

                        <form action="{{ route('admin.siswa.store') }}" method="POST">
                            @csrf
                            <div class="card-body">

                                <div class="form-group">
                                    <label>Nama Siswa</label>
                                    <input type="text" name="nama" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>NISN</label>
                                    <input type="text" name="nisn" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Kelas</label>
                                    <select name="kelas" class="form-control">
                                        <option value="">-- Pilih Kelas --</option>
                                        <option value="X">X</option>
                                        <option value="XI">XI</option>
                                        <option value="XII">XII</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Jurusan</label>
                                    <input type="text" name="jurusan" class="form-control">
                                </div>
                            </div>


                            <div class="card-footer">
                                <a href="{{ route('admin.siswa.index') }}" class="btn btn-secondary">
                                    Kembali
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    Simpan
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
