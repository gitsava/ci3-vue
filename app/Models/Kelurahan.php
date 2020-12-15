<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kelurahan extends Model
{
    protected $table = 'kelurahan';
	protected $primaryKey = 'id';
	protected $fillable = ['kec_id_fk','nama','alamat','geomtri'];

    public function kecamatan()
    {
    	return $this->belongsTo('App\Models\Kecamatan');
    }
}
