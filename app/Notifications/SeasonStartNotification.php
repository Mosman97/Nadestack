<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use App\Team;

class SeasonStartNotification extends Notification {

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
        return ['data'=>"A new season is starting soon!"];
    }

}
