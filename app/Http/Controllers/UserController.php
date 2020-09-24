<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

	public function index()
	{
		$users = User::with('organizations')->paginate(10);

		return view('user.index', compact('users'));
	}

	public function store()
	{

		$this->validate(request(), [
			'name' => 'required|max:255',
			'email' => 'required|email|max:255|unique:users',
			'organizations' => 'array',
			'password' => 'required'
		]);

		$user = User::make(request()->all());

		// Sync the organizations selected to the pivot table.
		$user->organizations()->sync(request('organizations'));

		return redirect()->route('users.index')->with('primary-alert', 'Person has been created!');
	}

	public function create()
	{
		$organizations = Organization::all();

		return view('user.create', compact('organizations'));
	}

	public function show($user)
	{
		$user = User::with('organizations')->find($user);

		if(!$user){
			return redirect()->back()->with('primary-alert', 'Person does not exists.');
		}

		return view('user.show', compact('user'));
	}

	public function edit($user)
	{
		$user = User::with('organizations')->find($user);

		if(!$user){
			return redirect()->back()->with('primary-alert', 'Person does not exists.');
		}

		$organizations = Organization::all();

		$user_organizations_id = $user->organizations()->get()->pluck('id')->toArray();

		return view('user.edit', compact('organizations', 'user', 'user_organizations_id'));
	}

	public function update($user)
	{
		$user = User::with('organizations')->find($user);

		if(!$user){
			return redirect()->back()->with('primary-alert', 'Person does not exists.');
		}

		$this->validate(request(), [
			'name' => 'required|max:255',
			'email' => 'required|email|max:255|unique:users,email,' . $user->id,
			'organizations' => 'array'
		]);

		$user->update([
			'name' => request('name'),
			'email' => request('email'),
			'password' => request('password') ?: $user->password
		]);

		// Sync the organizations selected to the pivot table.
		$user->organizations()->sync(request('organizations'));

		return redirect()->route('users.index')->with('primary-alert', 'Person has been updated!');
	}

	public function destroy($user)
	{
		$user = User::with('organizations')->find($user);

		if(!$user){
			return redirect()->back()->with('primary-alert', 'Person does not exists.');
		}

		$user->delete();

		return redirect()->route('users.index')->with('primary-alert', 'Person has been deleted!');
	}

}
