<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use App\Team;

class TicketAnswerNotification extends Notification {

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

        return ['data'=>"An admin replied to your ticket"];
    }

}
