@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Hasil Pencarian untuk: "{{ $query }}"</h2>

    @if($userResults->isEmpty() && $studentResults->isEmpty() && $teacherResults->isEmpty())
        <p>Tidak ada hasil ditemukan.</p>
    @else
        @if(!$userResults->isEmpty())
            <h3>Pengguna</h3>
            <ul class="list-group">
                @foreach($userResults as $user)
                    <li class="list-group-item">

                        <a href="{{ route('user.index') }}">{{ $user->name }} - {{ $user->email }}</a>
                    </li>
                @endforeach
            </ul>
        @endif

        @if(!$studentResults->isEmpty())
            <h3>Siswa</h3>
            <ul class="list-group">
                @foreach($studentResults as $student)
                    <li class="list-group-item">
                        <a href="{{ route('student.index') }}">{{ $student->name }} - {{ $student->email }}</a>
                    </li>
                @endforeach
            </ul>
        @endif

        @if(!$teacherResults->isEmpty())
            <h3>Guru</h3>
            <ul class="list-group">
                @foreach($teacherResults as $teacher)
                    <li class="list-group-item">
                        <a href="{{ route('teacher.index') }}">{{ $teacher->name }} - {{ $teacher->email }}</a>
                    </li>
                @endforeach
            </ul>
        @endif
    @endif
</div>
@endsection
