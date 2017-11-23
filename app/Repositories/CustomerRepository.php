<?php

namespace App\Repositories;

use App\Customer;

class CustomerRepository extends BaseRepository
{
    public function __construct()
    {
        $this->model = new Customer;
    }

    public function save($data)
    {
        $customer = null;

        if (property_exists($data, 'id')) {
            $customer = $this->model->find($data->id);
        } else {
            $customer = $this->model;
        }

        if (property_exists($data, 'first_name')) {
            $customer->first_name = $data->first_name;
        }

        if (property_exists($data, 'last_name')) {
            $customer->last_name = $data->last_name;
        }

        if (property_exists($data, 'phone')) {
            $customer->phone = $data->phone;
        }

        if (property_exists($data, 'address')) {
            $customer->address = $data->address;
        }

        if (property_exists($data, 'user_id')) {
            $customer->user_id = $data->user_id;
        }

        $customer->save();

        return $customer;
    }
}