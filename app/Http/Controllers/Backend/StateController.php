<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StateStoreRequest;
use App\Models\Contry;
use App\Models\State;
use Illuminate\Http\Request;

class StateController extends Controller
{
    //
    public function index (Request $request)
    {
        $states=State::all();
        if($request->has('search')){
            $states=State::where('name','like',"%{$request->search}%")->get();
        }
        return view('states.index',compact('states'));
    }

    public function create()
    {
        // code
        $countries=Contry::all();
        return view('states.create',compact('countries'));
    }

    public function store(StateStoreRequest $request){
        // code
        State::create($request->validated());
        return redirect()->route('states.index')->with('message','State created successfully');
    }

    public function edit(State $state){
        // code
        $countries=Contry::all();
        return view('states.edit', compact('state','countries'));
    }

    public function update(StateStoreRequest $request, State $state)
    {
        $state->update([
            'contry_id'=>$request->contry_id,
            'name'=>$request->name
        ]);
        return redirect()->route('states.index')->with('message','State Updated successfully');
    }

    public function destroy(State $state)
    {
        // code
        $state->delete();
        return redirect()->route('states.index')->with('message','State deleted successfully');
    }
}
