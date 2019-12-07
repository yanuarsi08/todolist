<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;;

class Tugas extends Model
{
    use SoftDeletes;
    protected $fillable = ['judul', 'deskripsi'];

    public function pengguna(){
        return $this->belongsTo('App\Pengguna');
    }
}
