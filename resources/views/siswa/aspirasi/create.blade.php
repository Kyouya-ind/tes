@extends('layouts.siswa.main')
@section('title', 'Tambah Aspirasi')

@section('content')
    <div class="content">
        <section class="content-header">
            <br>
            <div class="col-md-12">
                <div class="card card-primary">

                    <div class="card-header">
                        <h3 class="card-title">Tambah Aspirasi</h3>
                    </div>

                    <form action="{{ route('siswa.aspirasi.store') }}" method="POST">
                        @csrf

                        <div class="card-body">

                            <div class="form-group">
                                <label>Kategori</label>
                                <select name="id_kategori" class="form-control" required>
                                    <option value="">-- Pilih Kategori --</option>
                                    @foreach ($kategoris as $kt)
                                        <option value="{{ $kt->id_kategori }}">
                                            {{ $kt->ket_kategori }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Tanggal</label>
                                <input type="date" name="tanggal" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label>Lokasi</label>
                                <input type="text" name="lokasi" class="form-control"
                                    placeholder="Contoh: Ruang Kelas X-1" required>
                            </div>

                            <div class="form-group">
                                <label>Keterangan</label>
                                <textarea name="ket" class="form-control" rows="4" placeholder="Tuliskan aspirasi anda" required></textarea>
                            </div>

                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save mr-1"></i> Simpan
                            </button>
                            <a href="{{ route('siswa.aspirasi.index') }}" class="btn btn-secondary">
                                Kembali
                            </a>
                        </div>

                    </form>

                </div>
            </div>
        </section>
    </div>
@endsection
