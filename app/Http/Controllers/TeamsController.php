<?php

namespace App\Http\Controllers;

use App\Models\BasketballTeam;
use App\Models\FavoriteTeam;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;

use App\Models\FootballTeam;
use Illuminate\Support\Facades\DB;

class TeamsController extends Controller
{
    public function getFavoriteTeam(Request $request){
        $user = \Auth::user();
        $favoriteTeam = DB::table('favorite_teams')
            ->select('favorite_team')
            ->where('user_id', $user->id)
            ->get();
        return response()->json($favoriteTeam);
    }

    public function setFavoriteTeam(Request $request){
        //input validation
        $validatedData = $request->validate([
            'favoriteTeam' => 'required|string|max:100'
        ]);

        $user = \Auth::user();

        $favoriteTeam = FavoriteTeam::updateOrCreate(
            ['user_id' => $user->id],
            ['favorite_team' => $validatedData['favoriteTeam']]
        );

        return $favoriteTeam;
    }

    public function getFootballTeams(Request $request)
    {
        $footballTeams = FootballTeam::all();
        return response()->json($footballTeams);
    }

    public function getBasketBallTeams(Request $request){
        $basketballTeams = BasketballTeam::all();
        return response()->json($basketballTeams);
    }


}
