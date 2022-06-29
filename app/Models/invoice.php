<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class invoice extends Model
{
 	protected $primaryKey = 'id';
  	protected $table = 'invoice';
    protected $guarded = [];  
}
