<?php

	namespace App\Views;

	use Illuminate\Container\Container;
	use Illuminate\Events\Dispatcher;
	use Illuminate\Filesystem\Filesystem;
	use Illuminate\View\Compilers\BladeCompiler;
	use Illuminate\View\Engines\CompilerEngine;
	use Illuminate\View\Engines\EngineResolver;
	use Illuminate\View\Engines\PhpEngine;
	use Illuminate\View\Factory;
	use Illuminate\View\FileViewFinder;

	Class Views
	{
		public function view($pageName, $args = [])
		{

		    // Configuration
		    // Note that you can set several directories where your templates are located
		    $pathsToTemplates = [__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'resources' . DIRECTORY_SEPARATOR . 'views'];
		    $pathToCompiledTemplates = __DIR__ . '/compiled';

		    // Dependencies
		    $filesystem = new Filesystem;
		    $eventDispatcher = new Dispatcher(new Container);

		    // Create View Factory capable of rendering PHP and Blade templates
		    $viewResolver = new EngineResolver;
		    $bladeCompiler = new BladeCompiler($filesystem, $pathToCompiledTemplates);

		    $viewResolver->register('blade', function () use ($bladeCompiler) {
		        return new CompilerEngine($bladeCompiler);
		    });

		    $viewResolver->register('php', function () {
		        return new PhpEngine;
		    });

		    $viewFinder = new FileViewFinder($filesystem, $pathsToTemplates);
		    $viewFactory = new Factory($viewResolver, $viewFinder, $eventDispatcher);

		    echo $viewFactory->make($pageName, $args)->render();

		}
	}