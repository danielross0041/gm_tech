<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class labour extends Model
{
 	protected $primaryKey = 'id';
  	protected $table = 'labour';
    protected $guarded = [];  

    public function labour()
    {
        return $this->belongsTo(User::class, 'tech');
    }
}
