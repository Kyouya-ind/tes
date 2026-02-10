@extends('layouts.admin.main')
@section('title', 'Dashboard Admin')

@section('content')
<div class="content">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $total_Aspirasi }}</h3>
                            <p>Total Aspirasi</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-comments"></i>
                        </div>
                        <a href="{{ route('admin.aspirasi.index') }}" class="small-box-footer">
                            Lihat data <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>


                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ $total_Siswa }}</h3>
                            <p>Total Siswa</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-user-graduate"></i>
                        </div>
                        <a href="{{ route('admin.siswa.index') }}" class="small-box-footer">
                            Lihat data <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>


                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ $total_Kategori }}</h3>
                            <p>Total Kategori</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-tags"></i>
                        </div>
                        <a href="{{ route('admin.kategori.index') }}" class="small-box-footer">
                            Lihat data <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>

                <!-- TOTAL SELESAI -->
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ $total_Selesai }}</h3>
                            <p>Aspirasi Selesai</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <a href="{{ route('admin.aspirasi.index', ['status' => 'Selesai']) }}"
                           class="small-box-footer">
                            Lihat data <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>
@endsection
