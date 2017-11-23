<?php

namespace App\Repositories;

use App\User;

class UserRepository extends BaseRepository
{
	public function __construct()
	{
		$this->model = new User;
	}


    public function save($data)
    {
        $label = null;

        if (property_exists($data, 'id')) {
            $label = $this->model->find($data->id);
        } else {
            $label = $this->model;
        }

        if (property_exists($data, 'email')) {
            $label->email = $data->email;
        }

        if (property_exists($data, 'password')) {
            $label->password = $data->password;
        }

        $label->save();

        return $label;
    }
}