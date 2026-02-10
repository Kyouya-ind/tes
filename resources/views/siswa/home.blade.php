@extends('layouts.siswa.main')
@section('title', 'Home')

@section('content')
    <div class="content">
        <section class="content-header">
            <div class="container-fluid">
                <h4>Selamat datang, {{ auth()->user()->siswa->nama }}</h4>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ $totalAspirasi }}</h3>
                                <p>Total Aspirasi</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-inbox"></i>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-secondary">
                            <div class="inner">
                                <h3>{{ $menunggu }}</h3>
                                <p>Menunggu</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-clock"></i>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{ $diproses }}</h3>
                                <p>Diproses</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-spinner"></i>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{ $selesai }}</h3>
                                <p>Selesai</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-check-circle"></i>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </section>
    </div>
@endsection
