<?php

namespace App\Notifications;

use App\Models\Conge;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class DemandeCongeNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    protected $conge;
    public function __construct(Conge $conge)
    {
        $this->conge = $conge;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];

    }

    /**
     * Get the mail representation of the notification.
     */
 

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
               // Notification dans la plateforme
               return [
                'message' => 'Nouvelle demande de congé de ' . $this->conge->user->first_name,
                'conge_id' => $this->conge->id,
                'date_debut' => $this->conge->date_debut,
                'date_fin' => $this->conge->date_fin,
                'raison' => $this->conge->raison,
                'user_name' => $this->conge->user->first_name . ' ' . $this->conge->user->last_name,
            ];
    
    }
}
