@extends('layouts.siswa.main')
@section('title', 'Edit Aspirasi')

@section('content')
    <div class="content">
        <section class="content-header">
            <br>
            <div class="col-md-12">
                <div class="card card-warning">

                    <div class="card-header">
                        <h3 class="card-title">Edit Aspirasi</h3>
                    </div>

                    <form action="{{ route('siswa.aspirasi.update', $aspirasi->id_pelaporan) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="card-body">

                            <div class="form-group">
                                <label>Kategori</label>
                                <select name="id_kategori" class="form-control" required>
                                    @foreach ($kategoris as $kt)
                                        <option value="{{ $kt->id_kategori }}"
                                            {{ $aspirasi->id_kategori == $kt->id_kategori ? 'selected' : '' }}>
                                            {{ $kt->ket_kategori }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Tanggal</label>
                                <input type="date" name="tanggal" class="form-control" value="{{ $aspirasi->tanggal }}"
                                    required>
                            </div>

                            <div class="form-group">
                                <label>Lokasi</label>
                                <input type="text" name="lokasi" class="form-control" value="{{ $aspirasi->lokasi }}"
                                    required>
                            </div>

                            <div class="form-group">
                                <label>Keterangan</label>
                                <textarea name="ket" class="form-control" rows="4" required>{{ $aspirasi->ket }}</textarea>
                            </div>

                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-warning">
                                <i class="fas fa-save mr-1"></i> Update
                            </button>
                            <a href="{{ route('siswa.aspirasi.index') }}" class="btn btn-secondary">
                                Batal
                            </a>
                        </div>

                    </form>

                </div>
            </div>
        </section>
    </div>
@endsection
