<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function users()
    {
    	protected $fillable = [
    		'user_id', 'name', 'explain',
    	];
    	
    	return $this ->belongsTo('App\Models\User');
    }
}
