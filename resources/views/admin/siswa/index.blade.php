@extends('layouts.admin.main')
@section('title', 'Data Siswa')
@section('content')
    <div class="content">
        <section class="content-header">
            <br>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex align-items-center">
                            <h3 class="card-title mb-0">Data Siswa</h3>

                            <a href="{{ route('admin.siswa.create') }}" class="btn btn-primary btn-sm ml-auto">
                                <i class="fas fa-plus mr-1"></i> Tambah Siswa
                            </a>
                            <div class="card-tools">
                            </div>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>NISN</th>
                                        <th>Kelas</th>
                                        <th>Jurusan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($siswas as $siswa)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $siswa->nama }}</td>
                                            <td>{{ $siswa->nisn }}</td>
                                            <td>{{ $siswa->kelas }}</td>
                                            <td>{{ $siswa->jurusan }}</td>
                                            <td class="align-middle ">
                                                <div class="d-flex justify-content">
                                                   
                                                    <a href="{{ route('admin.siswa.edit', $siswa->id_siswa) }}"
                                                        class="btn btn-info btn-sm mr-1" title="Edit Kategori">
                                                        <i class="fas fa-pen"></i>
                                                    </a>

                                                    <form action="{{ route('admin.siswa.destroy', $siswa->id_siswa) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger btn-sm" title="Hapus Kategori"
                                                            onclick="return confirm('Yakin hapus data kategori?')">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>


                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
    </div>
    </div>
@endsection
