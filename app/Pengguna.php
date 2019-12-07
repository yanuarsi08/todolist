<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pengguna extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['nama', 'username', 'alamat'];

    public function tugas(){
        return $this->hasMany('App\Tugas');
    }

    public function tugasDone(){
        return $this->hasMany('App\Tugas')->onlyTrashed();
    }
}
