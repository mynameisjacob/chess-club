<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;

class LeaderboardController extends Controller
{
    public function __invoke()
    {
        $members = bestPlayers();
        


        return view('leaderboard',compact('members'));
    }
}
