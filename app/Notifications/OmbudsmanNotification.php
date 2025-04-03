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
            ->greeting('Olá, equipe da Ouvidoria!')
            ->line('Uma nova solicitação foi registrada:')
            ->line('**Nome:** ' . $this->data['name'])
            ->line('**E-mail:** ' . $this->data['email'])
            ->line('**Canal:** ' . $this->data['channel'])
            ->line('**Mensagem:** ' . $this->data['message'])
            ->action('Acessar o Sistema', url('https://nutricandies.com'))
            ->line('Por favor, verifique!');
    }

    public function toArray($notifiable)
    {
        return [];
    }
}
