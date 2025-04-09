<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class ReplyNotification extends Notification
{
    use Queueable;

    protected $subject;
    protected $message;

    public function __construct(string $subject, string $message)
    {
        $this->subject = $subject;
        $this->message = $message;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject($this->subject)
            ->greeting('Olá, ' . $notifiable->name . '!')
            ->line($this->message)
            ->salutation('Atenciosamente, Equipe Nutricandies');
    }

    public function toArray($notifiable)
    {
        return [];
    }
}
