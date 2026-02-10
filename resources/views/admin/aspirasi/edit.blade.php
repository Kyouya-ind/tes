@extends('layouts.admin.main')

@section('title', 'Tanggapi Aspirasi')

@section('content')
<div class="content">
    <section class="content-header">
        <br>
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-header d-flex justify-content-between">
                        <h3 class="card-title">Tanggapi Aspirasi</h3>

                    </div>

                    <form action="{{ route('admin.aspirasi.update', $aspirasi->id_pelaporan) }}"
                          method="POST">
                        @csrf
                        @method('PUT')

                        <div class="card-body">

                            <div class="form-group">
                                <label>Status</label>
                                <select name="status" class="form-control" required>
                                    <option value="Menunggu"
                                        {{ optional($aspirasi->aspirasi)->status == 'Menunggu' ? 'selected' : '' }}>
                                        Menunggu
                                    </option>
                                    <option value="Diproses"
                                        {{ optional($aspirasi->aspirasi)->status == 'Diproses' ? 'selected' : '' }}>
                                        Diproses
                                    </option>
                                    <option value="Selesai"
                                        {{ optional($aspirasi->aspirasi)->status == 'Selesai' ? 'selected' : '' }}>
                                        Selesai
                                    </option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Feedback Admin</label>
                                <textarea name="feedback"
                                          class="form-control"
                                          rows="4"
                                          required>{{ old('feedback', optional($aspirasi->aspirasi)->feedback) }}</textarea>
                            </div>

                        </div>

                        <div class="card-footer text-right">
                            <button class="btn btn-success">
                                Simpan
                            </button>
                                                    <a href="{{ route('admin.aspirasi.index') }}"
                           class="btn btn-secondary btn-sm">
                            Kembali
                        </a>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </section>
</div>
@endsection
