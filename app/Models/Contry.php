<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contry extends Model
{
    use HasFactory;

    protected $fillable = ['country_code','name'];

    public function states()
    {
    return $this->hasMany(State::class,'contry_id');    
    }
}
