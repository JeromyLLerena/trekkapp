<?php

namespace App\Repositories;

use App\Transaction;

class TransactionRepository extends BaseRepository
{
	public function __construct()
	{
		$this->model = new Transaction;
	}

	public function save($data)
	{
		$transaction = null;

		if (array_key_exists('id', $data)) {
			$transaction = $this->model->find($data['id']);
		} else {
			$transaction = $this->model;
		}

		if (array_key_exists('first_name', $data)) {
			$transaction->first_name = $data->first_name;
		}

		if (array_key_exists('last_name', $data)) {
			$transaction->last_name = $data->last_name;
		}

		if (array_key_exists('phone', $data)) {
			$transaction->phone = $data->phone;
		}

		if (array_key_exists('address', $data)) {
			$transaction->address = $data->address;
		}

		if (array_key_exists('document_type_id', $data)) {
			$transaction->document_type_id = $data->document_type_id;
		}

		if (array_key_exists('document_number', $data)) {
			$transaction->document_number = $data->document_number;
		}

		if (array_key_exists('birth_date', $data)) {
			$transaction->birth_date = $data->birth_date;
		}

		if (array_key_exists('user_id', $data)) {
			$transaction->user_id = $data->user_id;
		}

		if (array_key_exists('photo', $data)) {
			$transaction->photo = $data->photo;
		}

		if (array_key_exists('rate', $data)) {
			$transaction->rate = $data->rate;
		}

		$transaction->save();

		return $transaction;
	}
}