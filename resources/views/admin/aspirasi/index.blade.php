@extends('layouts.admin.main')
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
                        </div>

                        <div class="card-body border-bottom">
                            <form method="GET" action="{{ route('admin.aspirasi.index') }}">
                                <div class="row align-items-end">

                                    <div class="col-md-2">
                                        <label>Status</label>
                                        <select name="status" class="form-control form-control-sm"
                                            onchange="this.form.submit()">
                                            <option value="">Semua</option>
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

                                    <div class="col-md-2">
                                        <label>Tanggal</label>
                                        <input type="date" name="tanggal" class="form-control form-control-sm"
                                            value="{{ request('tanggal') }}" onchange="this.form.submit()">
                                    </div>

                                    <div class="col-md-2">
                                        <label>Bulan</label>
                                        <select name="bulan" class="form-control form-control-sm"
                                            onchange="this.form.submit()">
                                            <option value="">Semua</option>
                                            @for ($i = 1; $i <= 12; $i++)
                                                <option value="{{ $i }}"
                                                    {{ request('bulan') == $i ? 'selected' : '' }}>
                                                    {{ date('F', mktime(0, 0, 0, $i, 1)) }}
                                                </option>
                                            @endfor
                                        </select>
                                    </div>

                                    <div class="col-md-3">
                                        <label>Siswa</label>
                                        <select name="siswa" class="form-control form-control-sm"
                                            onchange="this.form.submit()">
                                            <option value="">Semua</option>
                                            @foreach ($siswas as $s)
                                                <option value="{{ $s->id_siswa }}"
                                                    {{ request('siswa') == $s->id_siswa ? 'selected' : '' }}>
                                                    {{ $s->nama }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-3">
                                        <label>Kategori</label>
                                        <select name="kategori" class="form-control form-control-sm"
                                            onchange="this.form.submit()">
                                            <option value="">Semua</option>
                                            @foreach ($kategoris as $k)
                                                <option value="{{ $k->id_kategori }}"
                                                    {{ request('kategori') == $k->id_kategori ? 'selected' : '' }}>
                                                    {{ $k->ket_kategori }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-12 text-right mt-2">
                                        <a href="{{ route('admin.aspirasi.index') }}" class="btn btn-secondary btn-sm">
                                            <i class="fas fa-undo"></i> Reset Filter
                                        </a>
                                    </div>

                                </div>
                            </form>
                        </div>

                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Siswa</th>
                                        <th>Tanggal</th>
                                        <th>Kategori</th>
                                        <th>Keterangan</th>
                                        <th>Status</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($aspirasis as $asp)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $asp->siswa->nama }}</td>
                                            <td>{{ $asp->tanggal }}</td>
                                            <td>{{ $asp->kategori->ket_kategori }}</td>
                                            <td title="{{ $asp->ket }}">
                                                {{ Str::limit($asp->ket, 50, '...') }}
                                            </td>

                                            <td>
                                                <span
                                                    class="badge 
                                                {{ optional($asp->aspirasi)->status == 'Selesai'
                                                    ? 'badge-success'
                                                    : (optional($asp->aspirasi)->status == 'Diproses'
                                                        ? 'badge-warning'
                                                        : 'badge-secondary') }}">
                                                    {{ $asp->aspirasi->status ?? 'Menunggu' }}
                                                </span>
                                            </td>
                                            <td class="text-center">
                                                <div class="btn-group btn-group-sm">
                                                    <a href="{{ route('admin.aspirasi.show', $asp->id_pelaporan) }}"
                                                        class="btn btn-info mr-1" title="Detail">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a href="{{ route('admin.aspirasi.edit', $asp->id_pelaporan) }}"
                                                        class="btn btn-warning" title="Tanggapi">
                                                        <i class="fas fa-pen"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center text-muted">
                                                Data aspirasi tidak ditemukan
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>
            </div>
        </section>
    </div>
@endsection
