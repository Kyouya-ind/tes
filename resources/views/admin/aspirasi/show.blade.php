@extends('layouts.admin.main')

@section('title', 'Detail Aspirasi')

@section('content')
    <div class="content">
        <section class="content-header">
            <br>
            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <div class="card-header d-flex justify-content-between">
                            <h3 class="card-title">Detail Aspirasi</h3>

                        </div>

                        <div class="card-body">
                            <table class="table table-bordered">
                                <tr>
                                    <th width="30%">Nama Siswa</th>
                                    <td>{{ $aspirasi->siswa->nama }}</td>
                                </tr>
                                <tr>
                                    <th>Kelas / Jurusan</th>
                                    <td>
                                        {{ $aspirasi->siswa->kelas }} -
                                        {{ $aspirasi->siswa->jurusan }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Tanggal</th>
                                    <td>{{ $aspirasi->tanggal }}</td>
                                </tr>
                                <tr>
                                    <th>Kategori</th>
                                    <td>{{ $aspirasi->kategori->ket_kategori }}</td>
                                </tr>
                                <tr>
                                    <th>Lokasi</th>
                                    <td>{{ $aspirasi->lokasi }}</td>
                                </tr>
                                <tr>
                                    <th>Keterangan Siswa</th>
                                    <td>{{ $aspirasi->ket }}</td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>
                                        <span class="badge badge-info">
                                            {{ $aspirasi->aspirasi->status ?? 'Menunggu' }}
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Feedback Admin</th>
                                    <td>
                                        {{ $aspirasi->aspirasi->feedback ?? '-' }}
                                    </td>
                                </tr>
                            </table>
                        </div>

                        <div class="card-footer text-right">
                            <a href="{{ route('admin.aspirasi.edit', $aspirasi->id_pelaporan) }}" class="btn btn-primary">
                                Tanggapi Aspirasi
                            </a>
                            <a href="{{ route('admin.aspirasi.index') }}" class="btn btn-secondary btn-sm">
                                Kembali
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
