<?php

return [
    'providers' => [
    	Illuminate\Validation\ValidationServiceProvider::class,
		Illuminate\View\ViewServiceProvider::class,
		/*
		* Package Service Providers...
		*/
		gkblabs\susbscription\susbscriptionServiceProvider::class,
		/*
		* Application Service Providers...
		*/
		App\Providers\AppServiceProvider::class,
		App\Providers\AuthServiceProvider::class,

    ],
];