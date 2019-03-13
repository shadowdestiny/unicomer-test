<?php

return [

	/*
	|--------------------------------------------------------------------------
	| Authentication Language Lines
	|--------------------------------------------------------------------------
	|
	| The following language lines are used during authentication for various
	| messages that we need to display to the user. You are free to modify
	| these language lines according to your application's requirements.
	|
	*/

    'failed'   => 'Las credenciales introducidas son incorrectas.',
    'throttle' => 'Demasiados intentos de acceso. Inténtelo de nuevo en :seconds segundos.',

    'form' => [

        'login'    => [
            'title'    => 'Iniciar sesión',
            'action'   => 'Iniciar sesión',
            'remember' => 'Recuérdame',
            'forgot'   => 'Olvidaste tu contraseña',
        ],
        
        'recover'  => [
            'title'    => 'Recuperar contraseña',
            'subtitle' => 'Ingrese su correo electrónico y las instrucciones se le enviarán!',
            'action'   => 'Recuperar',
        ],

        'register'  => [
            'title'    => 'Regístrate ahora',
            'subtitle' => 'Crea tu cuenta',
            'action'   => 'Regístrate',
            'terms'    => [
                'text' => 'Estoy de acuerdo con todos',
                'link' => 'Términos',
            ],
            'question'    => [
                'text' => 'Ya tienes una cuenta?',
                'link' => 'Iniciar sesión',
            ],
        ],
    
    ],

	'error' => [
		'title' => 'Whoops!',
		'description' => 'Hubo algunos problemas con sus datos ',
	],

];
