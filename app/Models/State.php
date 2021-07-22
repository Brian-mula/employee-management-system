<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;

    protected $fillable=['contry_id','name'];


    public function country()
    {
        return $this->belongsTo(Contry::class,'contry_id');
    }

    public function cities()
    {
        return $this->hasMany(City::class,'state_id');
    }
   
}
