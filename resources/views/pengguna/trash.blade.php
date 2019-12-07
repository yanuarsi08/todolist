@extends('master')

@section('title', 'Trash')

@section('content')
    <a href="/pengguna" class="btn btn-info">Kembali</a>
    <br>
    <br>
    <table class="table table-sm table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>nama</th>
                <th>username</th>
                <th>opsi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($penggunas as $pengguna)
            <tr>
            <td>{{ $pengguna->nama }}</td>
            <td>{{ $pengguna->username }}</td>
            <td>    
                <a href="/pengguna/trash/{{ $pengguna->id }}/restore" class="btn btn-success">Restore</a>
                <a href="/pengguna/trash/{{ $pengguna->id }}/forceDelete" class="btn btn-danger">Hapus Permanen</a>
            </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $penggunas->links() }}
@endsection