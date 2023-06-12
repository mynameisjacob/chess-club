<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Game;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $members = Member::all();

        return view('members\index',compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $month = date('m');
        $day = date('d');
        $year = date('Y');
        $today = $year . '-' . $month . '-' . $day;
        return view('members\create',compact('today'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'contact' => 'required',
            'joined' => 'required',
        ]);

        Member::create($request->all());

        return redirect()->route('members.index')
                        ->with('success','Member created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Member $member)
    {
        $games = Game::all();
        $games_count = 0;
        $white_wins = 0;
        $black_wins = 0;
        $least_win_moves = 0;

        foreach ($games as $game){
            if ($member->id == $game->white || $member->id == $game->black){
                $games_count++;
                if ($member->id == $game->white){
                    if ($member->id == $game->winner){
                        $white_wins++;
                        if ($least_win_moves != 0){
                            if ($least_win_moves > $game->wmoves && $game->wmoves != NULL){
                                $least_win_moves = $game->wmoves;
                            }
                        }
                        else{
                            $least_win_moves = $game->wmoves;
                        }
                    }
                }
                else{
                    if ($member->id == $game->winner){
                        $black_wins++;
                        if ($least_win_moves != 0){
                            if ($least_win_moves > $game->bmoves && $game->bmoves != NULL){
                                $least_win_moves = $game->bmoves;
                            }
                        }
                        else{
                            $least_win_moves = $game->bmoves;
                        }
                    }
                }
            }
        }
        $wins_count = $white_wins + $black_wins;
        $losses_count = $games_count - $wins_count;
        $wb_wins_ratio = $white_wins . ':' . $black_wins;
        if ($least_win_moves != 0){
            $least_win_moves = str($least_win_moves).' moves';
        }
        else{
            $least_win_moves = 'No win so far :-(';
        }
        return view('members\show',compact('member','wins_count','losses_count','least_win_moves','wb_wins_ratio'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Member $member)
    {
        return view('members\edit',compact('member'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Member $member)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'contact' => 'required',
            'joined' => 'required',
        ]);

        $member->update($request->all());

        return redirect()->route('members.index')
                        ->with('success','Member edited successfully.');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Member $member)
    {
        //
    }

}
