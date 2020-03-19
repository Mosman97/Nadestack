<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Match extends Model {

    protected $fillable = [
        'match_id', 'team_1_id', 'team_2_id', 'mapvote_log', 'match_results', 'match_closed', 'match_date'
    ];

   /* public static function boot() {
        parent::boot();
        self::creating(function ($model) {

            //Creating JSON-Template for Maplog

            /*  $mapvote_template = Array(
              'vote_status' => Array('team_1_ready' => false, 'team_2_ready' => false),
              'veto_status' => Array('team_1_map_bans' => Array(), 'team_2_map_bans' => Array()),
              'request_status' => Array('team_2_map_')
              );
  
 
              $mapvote_log = Array(
              'vote_status' => Array('team_1_ready' => false, 'team_2_ready' => false),
              'mapban_status' => Array('team_1_bannend_maps' => Array(), 'team_2_bannend_maps' => Array()),
              'mappick_status' => Array('team_1_picked_maps' => Array(), 'team_2_picked_maps' => Array()),
              'selected_players' => Array('team_1_player_ids' => Array(), 'team_2_player_ids' => Array()),
              'server_request_status' => Array('server_requested' => false, 'server_ip')
              );


              $model->match_id = (string) Str::uuid();
              $model->team_1_id = 21043;
              $model->team_2_id = 21044;
              $model->match_closed = 0;
              $model->match_date = date('Y-m-d H:i:s');
              $model->mapvote_log = json_encode($mapvote_log); 
        });
    }*/

}
