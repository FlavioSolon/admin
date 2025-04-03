<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class SacNotification extends Notification
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
            ->subject('Nova Solicitação ao SAC - Nutricandies')
            ->greeting('Olá, equipe do SAC!')
            ->line('Uma nova solicitação foi registrada:')
            ->line('**Nome:** ' . $this->data['name'])
            ->line('**E-mail:** ' . $this->data['email'])
            ->line('**Produto Reportado:** ' . $this->data['reported_product'])
            ->line('**Problema Reportado:** ' . $this->data['reported_problem'])
            ->action('Acessar o Sistema', url('https://nutricandies.com'))
            ->line('Por favor, verifique!');
    }

    public function toArray($notifiable)
    {
        return [];
    }
}
