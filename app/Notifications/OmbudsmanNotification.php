<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class OmbudsmanNotification extends Notification
{
    use Queueable;

    protected $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Nova Solicitação à Ouvidoria - Nutricandies')
            ->view('emails.ombudsman', ['data' => $this->data]);
    }

    public function toArray($notifiable)
    {
        return [];
    }
}
