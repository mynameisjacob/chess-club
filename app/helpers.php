<?php
use App\Models\Member;
use App\Models\Game;

function idToName($game){
    $white_player = Member::select('name')->where('id', $game->white)->first();
    $game->white = $white_player->name;
    $black_player = Member::select('name')->where('id', $game->black)->first();
    $game->black = $black_player->name;
    $winner = Member::select('name')->where('id', $game->winner)->first();
    $game->winner = $winner->name;
    return $game;
}

function getToday(){
    $month = date('m');
    $day = date('d');
    $year = date('Y');
    $today = $year . '-' . $month . '-' . $day;
    return $today;
}

function bestPlayers(){
    $games = Game::all();
    $whiteGamesCount = [];
    $blackGamesCount = [];
    $wins = [];

    foreach ($games as $game){
        array_push($whiteGamesCount, $game->white);
        array_push($blackGamesCount, $game->black);
        array_push($wins, $game->winner);
    }

    $whiteIdCount = array_count_values($whiteGamesCount);
    $whiteFilteredIds = [];
    foreach ($whiteIdCount as $polozka => $pocet) {
        if ($pocet >= 10) {
            array_push($whiteFilteredIds, $polozka);
        }
    }
    $blackIdCount = array_count_values($blackGamesCount);
    $blackFilteredIds = [];
    foreach ($blackIdCount as $polozka => $pocet) {
        if ($pocet >= 10) {
            array_push($blackFilteredIds, $polozka);
        }
    }

    $intersect = array_intersect($whiteFilteredIds, $blackFilteredIds);
    $members = Member::whereIn('id', $intersect)->get();
    return $members;
}