@extends('layouts.siswa.main')

@section('title', 'Data Aspirasi')

@section('content')
    <div class="content">
        <section class="content-header">
            <br>
            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <div class="card-header d-flex align-items-center">
                            <h3 class="card-title mb-0">Data Aspirasi</h3>

                            <a href="{{ route('siswa.aspirasi.create') }}" class="btn btn-primary btn-sm ml-auto">
                                <i class="fas fa-plus mr-1"></i> Tambah
                            </a>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <form method="GET" action="{{ route('siswa.aspirasi.index') }}" class="mb-3 px-3 pt-3">
                                <div class="form-row align-items-end">
                                    <div class="col-md-3">
                                        <label>Status</label>
                                        <select name="status" class="form-control">
                                            <option value="">-- Semua Status --</option>
                                            <option value="Menunggu"
                                                {{ request('status') == 'Menunggu' ? 'selected' : '' }}>
                                                Menunggu
                                            </option>
                                            <option value="Diproses"
                                                {{ request('status') == 'Diproses' ? 'selected' : '' }}>
                                                Diproses
                                            </option>
                                            <option value="Selesai" {{ request('status') == 'Selesai' ? 'selected' : '' }}>
                                                Selesai
                                            </option>
                                        </select>
                                    </div>

                                    <div class="col-md-3">
                                        <button class="btn btn-primary btn-sm mr-1">
                                            <i class="fas fa-filter"></i> Filter
                                        </button>
                                        <a href="{{ route('siswa.aspirasi.index') }}" class="btn btn-secondary btn-sm">
                                            Reset
                                        </a>
                                    </div>
                                </div>
                            </form>

                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Kategori</th>
                                        <th>Lokasi</th>
                                        <th>Status</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($data as $asp)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $asp->tanggal }}</td>
                                            <td>{{ $asp->kategori->ket_kategori }}</td>
                                            <td>{{ $asp->lokasi }}</td>
                                            <td>
                                                <span class="badge badge-info">
                                                    {{ $asp->aspirasi->status ?? 'Menunggu' }}
                                                </span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <div class="d-flex justify-content-center">

                                                    <a href="{{ route('siswa.aspirasi.show', $asp->id_pelaporan) }}"
                                                        class="btn btn-info btn-sm mr-1">
                                                        <i class="fas fa-eye"></i>
                                                    </a>

                                                    @if (!$asp->aspirasi || $asp->aspirasi->status == 'Menunggu')
                                                        <a href="{{ route('siswa.aspirasi.edit', $asp->id_pelaporan) }}"
                                                            class="btn btn-warning btn-sm mr-1">
                                                            <i class="fas fa-pen"></i>
                                                        </a>

                                                        <form
                                                            action="{{ route('siswa.aspirasi.destroy', $asp->id_pelaporan) }}"
                                                            method="POST"
                                                            onsubmit="return confirm('Yakin hapus aspirasi ini?')">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-danger btn-sm">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    @endif
                                                </div>
                                            </td>

                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center">
                                                Belum ada aspirasi
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->

                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
