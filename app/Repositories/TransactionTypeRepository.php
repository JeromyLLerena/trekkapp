<?php

namespace App\Repositories;

use App\TransactionType;

class TransactionTypeRepository extends BaseRepository
{
	public function __construct()
	{
		$this->model = new TransactionType;
	}
}