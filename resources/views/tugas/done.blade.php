@extends('master')

@section('title')
    Daftar Tugas Done {{$pengguna->nama}}
@endsection
@section('content')
<a href="/tugas/{{ $pengguna->id }}" class="btn btn-info">Kembali</a>
    <br>
    <br>
<table class="table table-sm table-bordered">
    <thead class="thead-dark">
        <tr>
            <th>Judul</th>
            <th>Deskripsi</th>
            <th>Opsi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($tugas as $task)
        <tr>
        <td>{{ $task->judul }}</td>
        <td>{{ str_limit($task->deskripsi, 20, '...') }}</td>
        <td>
            <a href="/tugas/{{ $pengguna->id }}/{{ $task->id }}/retask" class="btn btn-success">Re-Task</a>
            <a href="/tugas/{{ $pengguna->id }}/{{ $task->id }}/forceDelete" class="btn btn-danger">Hapus Permanen</a>
        </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection