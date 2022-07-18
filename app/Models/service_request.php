<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class service_request extends Model
{
 	protected $primaryKey = 'id';
  	protected $table = 'service_request';
    protected $guarded = [];



    public function invoice()
    {
        return $this->hasOne(invoice::class, 'request_id');
    }

    public function labours()
    {
        return $this->hasMany(labour::class, 'request_id');
    }

    public function parts()
    {
        return $this->hasMany(parts::class, 'request_id');
    }
    public function technician()
    {
        return $this->belongsTo(User::class, 'tech');
    }
}
