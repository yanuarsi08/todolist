@extends('master')

@section('title', 'Daftar Pengguna')

@section('content')
    <a href="/beranda" class="btn btn-info">Kembali</a>
    <a href="/pengguna/create" class="btn btn-info">Tambah</a>
    <a href="/pengguna/trash" class="btn btn-warning">Trash</a>
    <br>
    <br>
    <table class="table table-sm table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>Nama</th>
                <th>Username</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($penggunas as $pengguna)
            <tr>
            <td>{{ $pengguna->nama }}</td>
            <td>{{ $pengguna->username }}</td>
            <td>
                <form action="/pengguna/{{ $pengguna->id }}" method="post">
                    @csrf
                    @method('DELETE')
                    
                    <a href="/pengguna/{{ $pengguna->id }}/edit" class="btn btn-info">Ubah</a>
                    <input type="submit" class="btn btn-warning" value="Hapus">
                </form>
            </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $penggunas->links() }}
@endsection