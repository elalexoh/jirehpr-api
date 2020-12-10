<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Person;

class PersonController extends Controller
{
    public function show()
    {
        $persons = Person::get()->toJson(JSON_PRETTY_PRINT);
        return response($persons, 200);
    }
    public function getPerson($id)
    {
        if (Person::where('id', $id)->exists()) {
            $person = Person::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($person, 200);
        } else {
            return response()->json([
                "message" => "Person not found"
            ], 404);
        }
    }
    public function newPerson(Request $request)
    {
        $person = new Person;
        $person->name = $request->name;
        $person->lastname = $request->lastname;
        $person->id_code = $request->id_code;
        $person->birthday = $request->birthday;
        $person->save();

        return response()->json([
            "data" => $person,
            "message" => "Person record created"
        ], 201);
    }
    public function updatePerson(Request $request, $id)
    {
        if (Person::where('id', $id)->exists()) {
            $person = Person::find($id);

            $person->name = is_null($request->name) ? $person->name : $request->name;
            $person->lastname = is_null($request->lastname) ? $person->lastname : $request->lastname;
            $person->id_code = is_null($request->id_code) ? $person->id_code : $request->id_code;
            $person->birthday = is_null($request->birthday) ? $person->birthday : $request->birthday;
            $person->save();

            return response()->json([
                "data" => Person::get(),
                "message" => "records updated successfully"
            ], 200);
        } else {
            return response()->json([
                "message" => "Person not found"
            ], 404);
        }
    }
    public function deletePerson($id)
    {
        if (Person::where('id', $id)->exists()) {
            $person = Person::find($id);
            $person->delete();

            return response()->json([
                "data" => Person::get(),
                "message" => "records deleted"
            ], 202);
        } else {
            return response()->json([
                "message" => "Person not found"
            ], 404);
        }
    }
}
