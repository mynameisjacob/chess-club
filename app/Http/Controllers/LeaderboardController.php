<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;

class LeaderboardController extends Controller
{
    public function __invoke()
    {
        $members = bestPlayers()[0];
        $wins = bestPlayers()[1];
        $games = bestPlayers()[2];
        


        return view('leaderboard',compact('members','wins', 'games'));
    }
}
