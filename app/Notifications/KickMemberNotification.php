<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Team;
use Illuminate\Support\Facades\Auth;
class KickMemberNotification extends Notification {

    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct() {
        //
    }

    /**
     * Get the notification's delivery channels.
     */
    public function via($notifiable) {
        return ['database'];
    }

    public function toDatabase() {
        //getting Information about the Team before it gets deleted
        $teamname = Team::where('team_id', "=", Auth::user()->team_id)->get();
        return ['data' => "You got kicked from " . $teamname[0]['team_name'], "teamname" => $teamname[0]['team_name'], 'team_id' => $teamname[0]['team_id']];
    }

}
