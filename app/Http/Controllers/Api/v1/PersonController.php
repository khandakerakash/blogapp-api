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
        $request->validate([
            'first_name' => 'required|max:100',
            'last_name' => 'required|min:2|max:50',
            'email' => 'required|email|max:191|unique:people,email',
            'phone_no' => 'required',
        ]);

        $data = $request->all();
        $person = Person::create($data);

        return $this->showOne($person);

    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'first_name' => 'required|max:100',
            'last_name' => 'required|min:2|max:50',
            'email' => "required|email|max:191|unique:people,email,$id",
            'phone_no' => 'required',
        ]);

        $data = $request->all();

        $person = Person::findOrFail($id);

        $person->update($data);

        return $this->showMessage('Update successfully');
    }

    public function destroy($id)
    {
        $person = Person::findOrFail($id);
        $person->delete();

        return $this->showMessage('Delete successfully');
    }
}
