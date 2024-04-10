<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Character;
use App\Models\Item;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class CharacterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $characters = Character::all();
        return view('auth.characters.index', compact('characters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        $types = Type::all();
        $items = Item::all();
        return view('auth.characters.create', compact('types', 'items'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = $request->all();
        $character = new Character();
        $character->fill($data);
        $character->save();


        if(Arr::exists($data, 'items'))$character->items()->attach($data['items']);

        return redirect()->route('characters.show', $character);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Character  $character
     */
    public function show(Character $character)
    {
        return view('auth.characters.show', compact('character'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Character  $character
     */
    public function edit(Character $character)
    {
        $types = Type::all();
        $items = Item::all();

        $items_id = $character->items->pluck('id')->toArray();

        return view('auth.characters.edit', compact('character', 'types', 'items', 'items_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Character  $character
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Character $character)
    {
        $data = $request->all();
        $character->update($data);

        if(Arr::exists($data, 'items'))$character->items()->attach($data['items']);

        return redirect()->route('characters.show', $character);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Character  $character
     * @return \Illuminate\Http\Response
     */
    public function destroy(Character $character)
    {
        $character->delete();

        return redirect()->route('characters.index');
    }
}
