<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class ReplyNotification extends Notification
{
    use Queueable;

    protected $subject;
    protected $replyMessage; // Renomeamos para evitar conflitos

    public function __construct(string $subject, string $replyMessage)
    {
        $this->subject = $subject;
        $this->replyMessage = $replyMessage;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject($this->subject)
            ->view('emails.reply', [
                'subject' => $this->subject,
                'replyMessage' => $this->replyMessage, // Usamos a nova variável
                'notifiable' => $notifiable,
            ]);
    }

    public function toArray($notifiable)
    {
        return [];
    }
}
