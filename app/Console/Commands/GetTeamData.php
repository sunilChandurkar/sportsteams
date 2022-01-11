<?php

namespace App\Console\Commands;

use App\Models\BasketballTeam;
use App\Models\FootballTeam;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class GetTeamData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'getdata:yearly';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get Team Data and save to DB';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     * Connect to API and get Team Data.
     */
    public function handle()
    {
        //Get Football Data
        try{
            $response = Http::withHeaders([
                'x-rapidapi-key' => '554f62a8fdmsh111afca69ab2f43p1d3609jsn33c5c390b13f',
                'x-rapidapi-host' => 'football-data1.p.rapidapi.com'
            ])->get('https://football-data1.p.rapidapi.com/tournament/teams?tournamentId=1');

        }catch(\Illuminate\Http\Client\ConnectionException $e){
            return $e->getMessage();
        }
        if($response){
            $jsonArray = json_decode($response->body(), true);
            foreach ($jsonArray as $arr){
                $team = new FootballTeam();
                $team->is_national = $arr["isNational"];
                $team->country = $arr["country"]["shortName"];
                $team->name = $arr["name"];
                $team->short_name = $arr["shortName"];
                $team->medium_name = $arr["mediumName"];
                $team->team_id = $arr["id"];
                $team->save();
            }

        }
        //Get Basketball Data
        try{
            $response = Http::withHeaders([
                'x-rapidapi-key' => '554f62a8fdmsh111afca69ab2f43p1d3609jsn33c5c390b13f',
                'x-rapidapi-host' => 'free-nba.p.rapidapi.com'
            ])->get('https://free-nba.p.rapidapi.com/teams?page=0');
        }catch(\Illuminate\Http\Client\ConnectionException $e){
            return $e->getMessage();
        }
        if($response){
            $jsonArray = json_decode($response->body(), true);
            foreach ($jsonArray["data"] as $arr){
                $team = new BasketballTeam();
                $team->abbreviation = $arr["abbreviation"];
                $team->city = $arr["city"];
                $team->conference = $arr["conference"];
                $team->division = $arr["division"];
                $team->full_name = $arr["full_name"];
                $team->name = $arr["name"];
                $team->team_id = $arr["id"];
                $team->save();
            }
        }
        $this->info('Team data inserted.');
    }
}
