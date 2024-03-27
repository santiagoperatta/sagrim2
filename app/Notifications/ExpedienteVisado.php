<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ExpedienteVisado extends Notification
{
    use Queueable;

	private $id_expediente;
	private $usuario_id;


    /**
     * Create a new notification instance.
     */
	public function __construct($id_expediente, $usuario_id)
	{
        $this->id_expediente = $id_expediente;
		$this->usuario_id = $usuario_id;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
		return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {		
		return (new MailMessage)
                    ->line('El expediente ' . $this->id_expediente . ' fue aprobado.');
    }
}
