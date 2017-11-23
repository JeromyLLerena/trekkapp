<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

class BaseRepository
{
	public function __construct()
	{
		$this->model = new Model;
	}

	public function all()
	{
		return $this->model->all();
	}

	public function find($id)
	{
		return $this->model->find($id);
	}

	public function findOrFail($id)
	{
		return $this->model->findOrFail($id);
	}

	public function delete($id)
	{
		return $this->model->destroy($id);
	}

	public function findByColumns($columns = [], $operator = null)
	{
		return $this->model->where($columns, $operator)->get();
	}

	public function between($column, $min, $max)
	{
		return $this->model->whereBetween($column, [$min, $max])->get();
	}

	public function orderByLimit($criteria, $limit = null, $mode = null)
	{
		return $this->model->orderBy($criteria, $mode)->limit($limit)->get();
	}

	public function getByNotNull($columns)
	{
		$res = $this->model;

		foreach ($columns as $column) {
			$res = $res->whereNotNull($column);
		}

		return $res->get();
	}
}