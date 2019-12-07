@extends('master')

@section('title')
    Tambah Tugas {{ $pengguna->nama }}
@endsection

@section('content')
<form action="/tugas/{{ $pengguna->id }}" method="post">
    @csrf
<a href="/tugas/{{ $pengguna->id }}" class="btn btn-info">Kembali</a>
    
        <div class="form-group">
            <label>Judul</label>
            <input type="text" name="judul" class="form-control" value="{{ old('judul') }}">

            @if($errors->has('judul'))
                <div class="text-danger">
                    {{ $errors->first('judul')}}
                </div>
            @endif
        </div>

        <div class="form-group">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control">{{ old('deskripsi') }}</textarea>
        </div>

        <div class="form-group">
            <input type="submit" class="btn btn-success" value="Simpan">
        </div>
    </form>
@endsection