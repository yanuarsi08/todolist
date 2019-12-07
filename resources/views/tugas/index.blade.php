@extends('master')

@section('title', 'Daftar Tugas Pengguna')

@section('content')
    <a href="/beranda" class="btn btn-info">Kembali</a>
    <br>
    <br>
    <table class="table table-sm table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>Nama</th>
                <th>Tugas</th>
                <th>Done</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($penggunas as $pengguna)
            <tr>
            <td>{{ $pengguna->nama }}</td>
            <td>{{ $pengguna->tugas->count() }}</td>
            <td>{{ $pengguna->tugasDone->count() }}</td>
            <td>
                <a href="/tugas/{{ $pengguna->id }}" class="btn btn-info">Tugas</a>
            </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $penggunas->links() }}
@endsection