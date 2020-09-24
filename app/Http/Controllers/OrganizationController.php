<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use Illuminate\Http\Request;

class OrganizationController extends Controller
{

	public function index()
	{
		$organizations = Organization::with('users')->paginate(10);

		return view('organization.index', compact('organizations'));
	}

	public function store()
	{
		$this->validate(request(), [
			'name' => 'required|max:255',
			'description' => 'required'
		]);

		Organization::create(request()->only(['name', 'description']));

		return redirect()->route('organizations.index')->with('primary-alert', 'Organization has been created!');
	}

	public function create()
	{
		return view('organization.create');
	}

	public function show($organization)
	{
		$organization = Organization::find($organization);

		if(!$organization){
			return redirect()->route('organizations.index')->with('primary-alert', 'Organization does not exists.');
		}

		return view('organization.show', compact('organization'));
	}

	public function edit($organization)
	{
		$organization = Organization::find($organization);

		if(!$organization){
			return redirect()->route('organizations.index')->with('primary-alert', 'Organization does not exists.');
		}

		return view('organization.edit', compact('organization'));
	}

	public function update($organization)
	{
		$organization = Organization::find($organization);

		if(!$organization){
			return redirect()->route('organizations.index')->with('primary-alert', 'Organization does not exists.');
		}

		$this->validate(request(), [
			'name' => 'required|max:255',
			'description' => 'required'
		]);

		$organization->update(request()->only(['name', 'description']));

		return redirect()->route('organizations.index')->with('primary-alert', 'Organization has been updated!'); 
	}

	public function destroy($organization)
	{
		$organization = Organization::find($organization);

		if(!$organization){
			return redirect()->route('organizations.index')->with('primary-alert', 'Organization does not exists.');
		}

		$organization->delete();

		return redirect()->route('organizations.index')->with('primary-alert', 'Organization has been deleted!'); 
	}

}
