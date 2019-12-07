@extends('master')

@section('title')
    Daftar Tugas {{$pengguna->nama}}
@endsection
@section('content')
<a href="/tugas" class="btn btn-info">Kembali</a>
<a href="/tugas/{{ $pengguna->id }}/create" class="btn btn-info">Tambah</a>
<a href="/tugas/{{ $pengguna->id }}/done" class="btn btn-warning">Done List</a>
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
            <form action="/tugas/{{ $pengguna->id }}/{{ $task->id }}" method="post">
                @csrf
                @method('DELETE')

                <a href="/tugas/{{ $pengguna->id }}/{{ $task->id }}/edit" class="btn btn-info">Edit</a>

                <input type="submit" value="Selesai" class="btn btn-warning">
            </form>
        </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection