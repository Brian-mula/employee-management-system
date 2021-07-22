<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Contry;
use App\Models\Department;
use App\Models\State;
use Illuminate\Http\Request;

class EmployeeDataController extends Controller
{
    //
    public function countries()
    {
        $countries=Contry::all();
        return response()->json($countries);
    }
    public function states(Contry $country){
        
        return response()->json($country->states);
    }
    public function cities(State $state){
        return response()->json($state->cities);
    }
    public function departments(){
        $departments=Department::all();
        return response()->json($departments);
    }
}
