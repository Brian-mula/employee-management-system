<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CountryStoreRequest;
use App\Http\Requests\CountryUpdateRequest;
use App\Models\Contry;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    //
    public function index(Request $request)
    {
        $countries=Contry::all();
        if($request->has('search')){
            $countries=Contry::where('name','like',"%{$request->search}%")->orWhere('country_code','like',"%{$request->search}%")->get();
        }
        return view('countries.index',compact('countries'));
    }

    public function create()
    {
        return view('countries.create');
    }
    public function store(CountryStoreRequest $request)
    {
        //
        Contry::create($request->validated());
        return redirect()->route('countries.index')->with('message','Country created successfully');
    }
    public function edit(Contry $country)
    {
        return view('countries.edit',compact('country'));
    }

    public function update(CountryUpdateRequest $request,Contry $country)
    {
        //
        $country->update([
            'country_code' => $request->country_code,
            'name' => $request->name,
            
        ]);
        return redirect()->route('countries.index')->with('message','Country updated successfully');
    }

    public function destroy(Contry $country)
    {
        //
        
        $country->delete();
        return redirect()->route('countries.index')->with('message','Country deleted successfully');
    }
}
