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
        return ['data'=>"An admin replied to your ticket"];
    }

}
