<?php
	
	namespace App\Http\Controllers;

	use App\Views\Views as Response;
	use Illuminate\Http\Request;
	use App\User;
	use App\Repositories\Repository;
	
	class UsersController
	{
		protected $response;

		protected $model;

		public function __construct(Response $response, User $user)
		{
			$this->response = $response;
			$this->model = new Repository($user);
		}

		public function index()
		{	
			$users = $this->model->all();

			$templateData = [
		        'title' => 'Title',
		        'text' => 'This is the users!',
		        'users' => $users
		    ];

			$this->response->view('page',$templateData);
		}
	}