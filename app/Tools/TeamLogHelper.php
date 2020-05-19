<?php

namespace App\Tools;

use App\teamlog;

/**
 * This Class holds some Helperfunction for the Teamlog-Model
 */
class TeamLogHelper {

    CONST PLAYER_KICKED_ACTION_DB_NAME = "player_kicked";
    CONST TEAM_CREATED_ACTION_DB_NAME = "team_created";
    CONST ROLE_CHANGED = "role_changed";
    CONST DEFAULT_SETTINGS_CHANGED = "settings_changed";

    /**
     * Returns the UUID For a Player Kicked Event from the Database
     * @return string UUID which constructs the action-ID in the Database
     */
    function getPlayerKickedUUIDFromDatabase() {


        //Getting Teamlog Data with the wished Action 
        $teamlog = teamlog::where('action', "=", self::PLAYER_KICKED_ACTION_DB_NAME)->get();

        //Returning the Action-ID
        return $teamlog[0]['action_id'];
    }

    /**
     * Returns the UUID For a Team Creation-Event from the Database
     * @return string UUID which constructs the action-ID in the Database
     */
    function getTeamCreatedUUIDFromDatabase() {


        //Getting Teamlog Data with the wished Action 
        $teamlog = teamlog::where('action', "=", self::TEAM_CREATED_ACTION_DB_NAME)->get();

        //Returning the Action-ID
        return $teamlog[0]['action_id'];
    }

    /**
     * Returns the UUID For a Role Changed Event in the Database
     * @return string UUID which constructs the action-ID in the Database
     */
    function getRoleChangedUUIDFromDatabase() {

        //Getting Teamlog Data with the wished Action 
        $teamlog = teamlog::where('action', "=", self::ROLE_CHANGED)->get();

        //Returning the Action-ID
        return $teamlog[0]['action_id'];
    }
    
    
    
    /**
     * Returns the UUID for a Change in the Settings (Default, Socials)
     * @return type
     */
    function getTeamSettingsChanged() {

        //Getting Teamlog Data with the wished Action 
        $teamlog = teamlog::where('action', "=", self::DEFAULT_SETTINGS_CHANGED)->get();

        //Returning the Action-ID
        return $teamlog[0]['action_id'];
    }

}
?>

