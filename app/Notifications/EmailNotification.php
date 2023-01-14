<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class EmailNotification extends Notification
{
    use Queueable;
    public $name = '';
    public $channel = '';

    public function __construct($name, $channel)
    {
        $this->name = $name;
        $this->channel = $channel;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        // return (new MailMessage)
        //             // ->line('We Are Service Your Business Solutions')
        //             // ->action('Notification Action', url('/'))
        //             // ->line('Thank you for using our application!');
        $name = $this->name;
        $channel = $this->channel;
        return (new MailMessage)->view('email', compact('name', 'channel'));
    }

    public function toArray($notifiable)
    {
        return [

        ];
    }
}
