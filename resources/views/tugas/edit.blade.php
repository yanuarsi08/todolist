@extends('master')

@section('title')
    Edit Tugas {{ $pengguna->nama }}
@endsection

@section('content')
<form action="/tugas/{{ $pengguna->id }}/{{ $tugas->id }}" method="post">
    @csrf
    @method('PUT')

<a href="/tugas/{{ $pengguna->id }}" class="btn btn-info">Kembali</a>
    
        <div class="form-group">
            <label>Judul</label>
            <input type="text" name="judul" class="form-control" value="{{ old('judul', $tugas->judul) }}">

            @if($errors->has('judul'))
                <div class="text-danger">
                    {{ $errors->first('judul')}}
                </div>
            @endif
        </div>

        <div class="form-group">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control">{{ old('deskripsi', $tugas->deskripsi) }}</textarea>
        </div>

        <div class="form-group">
            <input type="submit" class="btn btn-success" value="Simpan">
        </div>
    </form>
@endsection