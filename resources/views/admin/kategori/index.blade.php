@extends('layouts.admin.main')
@section('title', 'Data Kategori')

@section('content')
    <div class="content">
        <section class="content-header">
            <br>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex align-items-center">
                            <h3 class="card-title mb-0">Data Kategori</h3>

                            <a href="{{ route('admin.kategori.create') }}" class="btn btn-primary btn-sm ml-auto">
                                <i class="fas fa-plus mr-1"></i> Tambah
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
                                        <th>Nama Kategori</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kategoris as $kt)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $kt->ket_kategori }}</td>
                                            <td class="align-middle ">
                                                <div class="d-flex justify-content">

                                                    <form action="{{ route('admin.kategori.destroy', $kt->id_kategori) }}"
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
        </section>
    </div>
@endsection
