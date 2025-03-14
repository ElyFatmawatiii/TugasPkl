@extends('backend.app')

@section('content')

<div class="container">
    <div class="page-inner">
        <h3 class="fw-bold mb-3">Dashboard</h3>
        <div class="row">

            <!-- Total Users -->
            <div class="col-sm-6 col-md-3">
                <a href="{{ route('user') }}" class="text-decoration-none">
                    <div class="card card-stats card-primary card-round">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-5">
                                    <div class="icon-big text-center">
                                        <i class="fas fa-user"></i>
                                    </div>
                                </div>
                                <div class="col-7 col-stats">
                                    <div class="numbers">
                                        <p class="card-category">Users</p>
                                        <h4 class="card-title">{{ $totalUsers }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Total Siswa -->
            <div class="col-sm-6 col-md-3">
                <a href="{{ route('students') }}" class="text-decoration-none">
                    <div class="card card-stats card-info card-round">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-5">
                                    <div class="icon-big text-center">
                                        <i class="fas fa-user-graduate"></i>
                                    </div>
                                </div>
                                <div class="col-7 col-stats">
                                    <div class="numbers">
                                        <p class="card-category">Siswa</p>
                                        <h4 class="card-title">{{ $totalSiswa }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Total Guru -->
            <div class="col-sm-6 col-md-3">
                <a href="{{ route('teacher') }}" class="text-decoration-none">
                    <div class="card card-stats card-success card-round">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-5">
                                    <div class="icon-big text-center">
                                        <i class="fas fa-chalkboard-teacher"></i>
                                    </div>
                                </div>
                                <div class="col-7 col-stats">
                                    <div class="numbers">
                                        <p class="card-category">Guru</p>
                                        <h4 class="card-title">{{ $totalGuru }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Total Mapel -->
            <div class="col-sm-6 col-md-3">
                <a href="{{ route('mapel') }}" class="text-decoration-none">
                    <div class="card card-stats card-secondary card-round">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-5">
                                    <div class="icon-big text-center">
                                        <i class="fas fa-book-open"></i>
                                    </div>
                                </div>
                                <div class="col-7 col-stats">
                                    <div class="numbers">
                                        <p class="card-category">Mata Pelajaran</p>
                                        <h4 class="card-title">{{ $totalMapel }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

        </div>
    </div>
</div>

@endsection
