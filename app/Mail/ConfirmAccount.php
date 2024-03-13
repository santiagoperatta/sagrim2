<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;

class ConfirmAccount extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $confirmUrl;

    public function __construct(User $user)
    {
        $this->user = $user;
        $this->confirmUrl = url('/confirm-account/'.$user->id); // Cambia la URL según tu lógica de confirmación de cuenta
    }

    public function build()
    {
        return $this->view('emails.confirm-account');
    }
}