<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use DB;

class TeamNameNotTaken implements Rule {

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct() {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value) {


        $team_result = DB::table('teams')->select('team_name')->where('team_name', 'like',$value . "%")->doesntExist();
        
        return $team_result;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message() {
        return 'This Teamname is already taken';
    }

}
