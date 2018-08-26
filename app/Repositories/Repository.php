<?php

	namespace App\Repositories;

	use Illuminate\Database\Eloquent\Model;
	use App\Repositories\RepositoryInterface;

	class Repository implements RepositoryInterface
	{
		protected $model;

		// Constructor to bind model to repo
		public function __construct(Model $model)
		{
			$this->model = $model;
		}

		// Get all instances of model
		public function all()
		{
			return $this->model->all();
		}

		// show the record with the given id
		public function show($id)
		{
			return $this->model->findOrFail($id);

		}

		//insert new record in the database
		public function store(array $data)
		{	
			return $this->model->insert($data);
		}

		// show the record to be edit from the given id
		public function edit($id)
		{
			return $this->model->findOrFail($id);
		}

		// update record in the database
		public function update(array $data, $id)
		{
			$this->model->update($data);
		}

		// remove record from the database
		public function delete($id)
		{
			$this->model->destroy($id);
		}

		// Get the associated model
		public function getModel()
		{
			return $this->model;
		}

		// Set the associated model
		public function setModel($model)
		{
			$this->model = $model;
			return $this;
		}

		// Eager load database relationships
		public function with($relations)
		{
			return $this->model->with($relations);
		}
	}