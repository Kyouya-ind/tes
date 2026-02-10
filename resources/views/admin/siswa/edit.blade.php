@extends('layouts.admin.main')
@section('title', 'Edit Data Siswa')

@section('content')
    <div class="content">
        <section class="content-header">
            <div class="row">
                <div class="col-12">
                    <div class="card card-warning">
                        <div class="card-header">
                            <h3 class="card-title">Edit Data Siswa</h3>
                        </div>

                        <form action="{{ route('admin.siswa.update', $siswa->id_siswa) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="card-body">

                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" name="nama" class="form-control" value="{{ $siswa->nama }}"
                                        required>
                                </div>

                                <div class="form-group">
                                    <label>NISN</label>
                                    <input type="text" class="form-control" value="{{ $siswa->nisn }}" readonly>
                                </div>

                                <div class="form-group">
                                    <label>Kelas</label>
                                    <select name="kelas" class="form-control" required>
                                        <option value="X" {{ $siswa->kelas == 'X' ? 'selected' : '' }}>X</option>
                                        <option value="XI" {{ $siswa->kelas == 'XI' ? 'selected' : '' }}>XI</option>
                                        <option value="XII" {{ $siswa->kelas == 'XII' ? 'selected' : '' }}>XII</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Jurusan</label>
                                    <input type="text" name="jurusan" class="form-control" value="{{ $siswa->jurusan }}"
                                        required>
                                </div>

                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-warning">Update</button>
                                <a href="{{ route('admin.siswa.index') }}" class="btn btn-secondary">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
