<?php

namespace App\Http\Controllers\Accounts;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use App\Repositories\CustomerRepository;

class AccountController extends Controller
{
    public function __construct(
        UserRepository $user_repository,
        CustomerRepository $customer_repository
    )
    {
        $this->user_repository = $user_repository;
        $this->customer_repository = $customer_repository;
    }

    public function index()
    {
        $user = auth()->user()->toArray();

        return view('events.index')->with(compact('user'));
    }

    public function showCreate()
    {

        return view('events.create');
    }

    public function create(Request $request)
    {
        $data = $request->all();

        return redirect()->route('events.index');
    }

    public function showEdit($id)
    {
        $account = $this->account_management_service->find($id);
        $currencies = $this->currency_management_service->all();
        $transactions = $this->account_management_service->getLatestTransactions($id);

        return view('events.edit')->with(compact('account', 'currencies', 'transactions'));
    }

    public function edit(AccountCreateRequest $request, $id)
    {
        $data = [
            'id' => $id,
            'name' => request('name'),
            'description' => request('description'),
            'balance' => request('balance'),
            'currency_id' => request('currency'),
            'icon' => request('icon'),
            'user_id' => auth()->user()->id,
        ];

        $this->account_management_service->save($data);

        return redirect()->route('events.index');
    }

    public function delete($id)
    {
        $this->account_management_service->delete($id);

        return redirect()->route('events.index');
    }
}
