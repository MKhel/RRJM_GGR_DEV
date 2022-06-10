<?php

namespace App\Notifications;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class userActivities extends Notification
{
    use Queueable;
    private $userActivityData;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    // public function __construct($userActivityData)
    // {
    //     $this->userActivityData = $userActivityData;
    // }
    public function __construct()
    {
        
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    // public function toMail($notifiable)
    // {
    //     return (new MailMessage)
    //                 ->line($this->userActivityData['body'])
    //                 ->action($this->userActivityData['userActivityText'],
    //                 $this->userActivityData['url'])
    //                 ->line($this->userActivityData['thankyou']);
    // }
    
    public function toDatabase($notifiable)
    {
        return [
            'repliedTime'=>Carbon::now()
        ]; 
    }     


    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ]; 
    }
}
