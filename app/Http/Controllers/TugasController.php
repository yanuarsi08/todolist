<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Pengguna;
use App\Tugas;

class TugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penggunas = Pengguna::paginate(10);

        return view('tugas.index', [
            'penggunas' => $penggunas
        ]);
    }

    public function list($pengguna_id){
        $data = Tugas::where('pengguna_id', $pengguna_id);

        return view('tugas.list', [
            'pengguna' => Pengguna::find($pengguna_id),
            'tugas' => $data->paginate(10)
        ]);
    }
        
        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
    public function create($pengguna_id){
        $pengguna = Pengguna::find($pengguna_id);
        return view('tugas.create', [
            'pengguna' => $pengguna
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $pengguna_id)
    {
        $this->validate($request, [
            'judul' => 'required'
        ]);

        $pengguna = Pengguna::find($pengguna_id);
        $pengguna->tugas()->create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi
        ]);

        return redirect()->action(
            'TugasController@list', ['id' => $pengguna_id]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($pengguna_id, $tugas_id)
    {
        $tugas = Tugas::find($tugas_id);
        return view('tugas.edit', [
            'tugas' => $tugas,
            'pengguna' => Pengguna::find($pengguna_id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $pengguna_id, $tugas_id)
    {
        $this->validate($request, [
            'judul' => 'required'
        ]);

        $tugas = Tugas::find($tugas_id);
        $tugas->judul = $request->judul;
        $tugas->deskripsi = $request->deskripsi;
        $tugas->save();

        return redirect()->action('TugasController@list', [
            'id' => $pengguna_id
        ]);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($pengguna_id, $tugas_id)
    {
        $tugas = Tugas::find($tugas_id);
        $tugas->delete();

        return redirect()->action('TugasController@list', [
            'id' => $pengguna_id
        ]);
    }

    public function done($pengguna_id){
        $data = Tugas::onlyTrashed()->where('pengguna_id', $pengguna_id);
        
        return view('tugas.done', [
            'pengguna' => Pengguna::find($pengguna_id),
            'tugas' => $data->paginate(10)
            ]);
        }
        
    public function retask($pengguna_id, $tugas_id){
        $data = Tugas::onlyTrashed()->where('id', $tugas_id);
        $data->restore();

        return redirect()->action('TugasController@done', [
            'pengguna_id' => $pengguna_id
        ]);
    }

    public function forceDelete($pengguna_id, $tugas_id){
        $data = Tugas::onlyTrashed()->where('id', $tugas_id);
        $data->forceDelete();

        return redirect()->action('TugasController@done', [
            'pengguna_id' => $pengguna_id
        ]);
    }
    
}
