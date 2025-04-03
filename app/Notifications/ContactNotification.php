<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class ContactNotification extends Notification
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
            ->subject('Novo Contato Geral - Nutricandies')
            ->greeting('Olá, equipe de Contato!')
            ->line('Um novo contato foi registrado:')
            ->line('**Nome:** ' . $this->data['name'])
            ->line('**E-mail:** ' . $this->data['email'])
            ->line('**Setor:** ' . $this->data['sector'])
            ->line('**Motivo:** ' . $this->data['reason'])
            ->line('**Mensagem:** ' . $this->data['message'])
            ->action('Acessar o Sistema', url('https://nutricandies.com'))
            ->line('Por favor, verifique!');
    }

    public function toArray($notifiable)
    {
        return [];
    }
}
