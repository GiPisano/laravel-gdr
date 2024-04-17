<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Character;
use Illuminate\Http\Request;

class CharacterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $characters = Character::select('name', 'description', 'strength', 'defence', 'speed', 'intelligence', 'life', 'type_id')->with('type')->get();
        return response()->json($characters);
    }

    /** 
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user_character = Character::select('name', 'description', 'strength', 'defence', 'speed', 'intelligence', 'life', 'type_id')->with('type')->where('id', $id)->first();
        $rand_num = rand(1, Character::count());
        $cpu_character = Character::select('name', 'description', 'strength', 'defence', 'speed', 'intelligence', 'life', 'type_id')->with('type')->where('id', $rand_num)->first();
        return response()->json(['user_character' => $user_character, 'cpu_character' => $cpu_character]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
