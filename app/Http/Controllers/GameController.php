<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Member;
use Illuminate\Http\Request;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $games = Game::all();

        foreach ($games as $game){
            $game = idToName($game);
        }

        return view('games\index',compact('games'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $today = getToday();
        return view('games\create', compact('today'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->white == $request->black){
            return redirect()->route('games.create')->with('danger','Players must be different!');
        }

        if ($request->winner != $request->white && $request->winner != $request->black){
            return redirect()->route('games.create')->with('danger','Incorrect winner!');
        }

        $request->validate([
            'white' => 'required',
            'black' => 'required',
            'date' => 'required',
        ]);

        Game::create($request->all());

        return redirect()->route('games.index')
                        ->with('success','Game created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Game $game)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Game $game)
    {
        $game = idToName($game);
        
        return view('games\edit',compact('game'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Game $game)
    {
        if ($request->white == $request->black){
            return redirect()->route('games.create')->with('danger','Players must be different!');
        }

        if ($request->winner != $request->white && $request->winner != $request->black){
            return redirect()->route('games.create')->with('danger','Incorrect winner!');
        }
        
        $request->validate([
            'white' => 'required',
            'black' => 'required',
            'date' => 'required',
        ]);

        $game->update($request->all());

        return redirect()->route('games.index')
                        ->with('success','Game edited successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Game $game)
    {
        //
    }

}
