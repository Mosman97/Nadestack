<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use App\Team;

class LeaveTeamNotification extends Notification {

    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct() {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable) {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable) {
        return (new MailMessage)
                        ->line('The introduction to the notification.')
                        ->action('Notification Action', url('/'))
                        ->line('Thank you for using our application!');
    }

    public function toDatabase() {
        //getting Information about the Team before it gets deleted
        $teamname = Team::where('team_id', "=", Auth::user()->team_id)->get();
        
        return ['data'=>"You just left ".$teamname[0]['team_name'],"teamname"=> $teamname[0]['team_name'],'team_id'=>$teamname[0]['team_id']];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable) {
        return [
                //
        ];
    }

}
