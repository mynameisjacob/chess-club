<?php
use App\Models\Member;
use App\Models\Game;

function idToName($game){ //show name of member instead of id
    $white_player = Member::select('name')->where('id', $game->white)->first();
    $game->white = $white_player->name;
    $black_player = Member::select('name')->where('id', $game->black)->first();
    $game->black = $black_player->name;
    $winner = Member::select('name')->where('id', $game->winner)->first();
    $game->winner = $winner->name;
    return $game;
}

function getToday(){ //get today date
    $month = date('m');
    $day = date('d');
    $year = date('Y');
    $today = $year . '-' . $month . '-' . $day;
    return $today;
}

function bestPlayers(){ //get best players (not completely done)
    $games = Game::all();
    $whiteGamesCount = [];
    $blackGamesCount = [];
    $gamesCount = [];
    $wins = [];

    foreach ($games as $game){
        array_push($whiteGamesCount, $game->white);
        array_push($blackGamesCount, $game->black);
        array_push($wins, $game->winner);
        array_push($gamesCount, $game->white);
        array_push($gamesCount, $game->black);
    }
    //filter members with >=10 matches with white color
    $whiteIdCount = array_count_values($whiteGamesCount);
    $whiteFilteredIds = [];
    foreach ($whiteIdCount as $polozka => $pocet) {
        if ($pocet >= 10) {
            array_push($whiteFilteredIds, $polozka);
        }
    }
    //filter members with >=10 matches with black color
    $blackIdCount = array_count_values($blackGamesCount);
    $blackFilteredIds = [];
    foreach ($blackIdCount as $polozka => $pocet) {
        if ($pocet >= 10) {
            array_push($blackFilteredIds, $polozka);
        }
    }
    $winsCount = array_count_values($wins); //win count for each member with >= matches
    $gamesCount = array_count_values($gamesCount);
    $intersect = array_intersect($whiteFilteredIds, $blackFilteredIds); //members with at least 10 matches with each color
    $members = Member::whereIn('id', $intersect)->get();
    return array($members, $winsCount, $gamesCount);
}
