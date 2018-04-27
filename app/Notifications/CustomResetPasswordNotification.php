<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class CustomResetPasswordNotification extends Notification
{
   public $token;
   
   public function __construct($token)
   {
      $this->token = $token;
   }
   
   public function via($notifiable)
   {
      return ['mail'];
   }

   public function toMail($notifiable)
   {
      return (new MailMessage)
        ->subject('Restablecimiento de clave personal - Sistema web MAJUMBA')
        ->greeting('Cordial Saludo,')
        ->line('Usted ha solicitado el restablecimiento de su contraseña.')
        ->line('Ingrese en el siguiente enlace para continuar con esta operación. Cabe aclarar que este enlace solo será valido una vez y caducará en 24 horas desde su generación.')
        ->action('Reestablecer contraseña', url('password/reset', $this->token))
        ->line('Por favor no responder este correo. Si no realizó esta solicitud, haga caso omiso.')
        ->salutation('Cordialmente, Laboratorio de Investigaciones de Microbiología Avanzada y Biología Aplicada');

   }
}
