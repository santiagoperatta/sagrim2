<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use Illuminate\Support\HtmlString;
use Illuminate\Support\Facades\Lang;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
	public function boot()
	{
	VerifyEmail::$toMailCallback = function($notifiable, $verificationUrl) {
	return (new MailMessage)
	->subject(Lang::get('Confirmar Cuenta'))
	->greeting(Lang::get("Hola ") . $notifiable->name)
	->line(Lang::get('Haz click en el siguiente enlace para verificar tu cuenta'))
	->action(Lang::get('Verificar'), $verificationUrl)
	->line(Lang::get('Si no creaste esta cuenta, puedes ignorar este mail.'))
	->salutation(new HtmlString(
	Lang::get("Gracias por confiar en nosotros.").'<br>' .'<strong>'. Lang::get("Colegio de Agrimensores") . '</strong>'
	));
	};
	}
}
