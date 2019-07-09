<?php

namespace App\Http\Controllers\Api\v1;

use App\Person;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PersonController extends Controller
{
    use ApiResponse;

    public function index()
    {
        $people = Person::all();
        return $this->showAll($people);
    }

    public function show($id)
    {
        $person = Person::findOrFail($id);
        return $this->showOne($person);
    }

    public function store(Request $request)
    {
//        $request->validate([
//            'first_name' => 'required|max:255',
//            'email' => 'required|email|max:255|unique:people',
//            'phone_no' => 'required',
//        ]);

        $data = $request->all();
        $person = Person::create($data);

        return $this->showOne($person);
    }
}
