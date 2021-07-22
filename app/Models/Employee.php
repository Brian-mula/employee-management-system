<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable=['first_name','last_name','middle_name','address','contry_id',
    'state_id','city_id','department_id','zip_code','birthdate','date_hired'
];

public function country()
{
    return $this->belongsTo(Contry::class,'contry_id');
}
public function state()
{
    return $this->belongsTo(State::class,'state_id');
}
public function city()
{
    return $this->belongsTo(City::class,'city_id');
}
public function department()
{
    return $this->belongsTo(Department::class,'department_id');
}

}
