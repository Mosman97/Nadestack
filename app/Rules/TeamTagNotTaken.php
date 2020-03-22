<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use DB;

class TeamTagNotTaken implements Rule {

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

        $tag_result = DB::table('teams')->select('team_tag')->where('team_tag', 'like', $value . "%")->doesntExist();

        return $tag_result;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message() {
        return 'The Teamtag is already taken!';
    }

}
