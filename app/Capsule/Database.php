<?php

	namespace App\Capsule;

	use Illuminate\Database\Capsule\Manager as Capsule;	
	use Illuminate\Events\Dispatcher;
	use Illuminate\Container\Container;

	class Database
	{
		public function initialize()
		{
			$capsule = new Capsule;

		    $capsule->addConnection([
		        'driver'    => 'mysql',
		        'host'      => 'localhost',
		        'database'  => 'illuminate_non_laravel',
		        'username'  => 'root',
		        'password'  => '',
		        'charset'   => 'utf8',
		        'collation' => 'utf8_unicode_ci',
		        'prefix'    => '',
		    ]);

		    // Set the event dispatcher used by Eloquent models... (optional)
		    $capsule->setEventDispatcher(new Dispatcher(new Container));

		    // Set the cache manager instance used by connections... (optional)
		    // $capsule->setCacheManager(...);

		    // Make this Capsule instance available globally via static methods... (optional)
		    $capsule->setAsGlobal();

		    // Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
		    $capsule->bootEloquent();
		}
	}