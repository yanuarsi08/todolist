<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pengguna;

class PenggunaController extends Controller
{
    public function index(){
        $penggunas = Pengguna::paginate(10);
        return view('pengguna.index', ['penggunas' => $penggunas]);
    }

    public function create(){
        return view('pengguna.create');
    }

    public function store(Request $request){
        $this->validate($request, [
            'nama' => 'required',
            'username' => 'required'
        ]);

        Pengguna::create([
            'nama' => $request->nama,
            'username' => $request->username,
            'alamat' => $request->alamat
        ]);

        return redirect('/pengguna');
    }

    public function edit($id){
        $pengguna = Pengguna::find($id);

        return view('pengguna.edit', [
            'pengguna' => $pengguna
        ]);
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'nama' => 'required',
            'username' => 'required'
        ]);

        $pengguna = Pengguna::find($id);
        $pengguna->nama = $request->nama;
        $pengguna->username = $request->username;
        $pengguna->alamat = $request->alamat;
        $pengguna->save();

        return redirect('/pengguna');
    }

    public function destroy($id){

        $pengguna = Pengguna::find($id);
        $pengguna->delete();

        return redirect('/pengguna');
    }

    public function trash(){
        $penggunas = Pengguna::onlyTrashed()->paginate(10);

        return view('pengguna.trash', [
            'penggunas' => $penggunas
        ]);
    }

    public function restore($id){
        $pengguna = Pengguna::onlyTrashed()->where('id', $id);
        $pengguna->restore();

        return redirect('/pengguna/trash');
    }

    public function forceDelete($id){
        $pengguna = Pengguna::onlyTrashed()->where('id', $id);
        $pengguna->forceDelete();

        return redirect('/pengguna/trash');
    }
}
