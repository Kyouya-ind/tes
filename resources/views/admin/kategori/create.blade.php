@extends('layouts.admin.main')
@section('title', 'Tambah Kategori')

@section('content')
    <div class="content">
        <section class="content-header">
            <br>
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Data Kategori</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('admin.kategori.store') }}" method="POST">
                        @csrf

                        <div class="card-body">
                            <div class="form-group">
                                <label>Nama Kategori</label>
                                <input type="text" name="ket_kategori" class="form-control"
                                    placeholder="Contoh: Ruang kelas">
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('admin.kategori.index') }}" class="btn btn-secondary">Kembali</a>
                        </div>
                    </form>
                </div>
                <!-- /.card -->


                <!-- /.card-footer -->
                </form>
            </div>
            <!-- /.card -->

    </div>
    </section>
    </div>
@endsection
