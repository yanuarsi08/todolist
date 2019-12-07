@extends('master')

@section('title', 'Ubah Pengguna')

@section('content')
<a href="/pengguna" class="btn btn-info">Kembali</a>
<form action="/pengguna/{{ $pengguna->id }}" method="post">
@method('PUT')
@csrf

    <div class="form-group">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control" value="{{ old('nama', $pengguna->nama) }}">

        @if($errors->has('nama'))
            <div class="text-danger">
                {{ $errors->first('nama')}}
            </div>
        @endif
    </div>

    <div class="form-group">
        <label>Username</label>
    <input type="text" name="username" class="form-control" value="{{ old('username', $pengguna->username) }}">

        @if($errors->has('username'))
            <div class="text-danger">
                {{ $errors->first('username')}}
            </div>
        @endif
    </div>

    <div class="form-group">
        <label>Alamat</label>
        <textarea name="alamat" class="form-control">{{ old('alamat', $pengguna->alamat) }}</textarea>

            @if($errors->has('alamat'))
            <div class="text-danger">
                {{ $errors->first('alamat')}}
            </div>
        @endif

    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-success" value="Simpan">
    </div>
</form>
@endsection