<?php

	use Illuminate\Routing\Router;
	
	$router->group(['namespace'=>'App\Http\Controllers'], function(Router $router) {
		$router->resource('/','UsersController');
	});