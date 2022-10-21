<?php

namespace App\Services;

use App\Models\Person;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PersonService
{
    public function showAll(): Collection
    {
        return Person::all();
    }

    public function showAllWithoutProperties(): array
    {
        $all = self::showAll();
        $persons = [];
        foreach ($all as $person) {
            if (count($person->properties) == 0) {
                $persons[] = $person;
            }
        }

        return $persons;
    }

    public function savePerson(Request $request): RedirectResponse
    {
        $person = Person::where('identification_number', $request->identification_number)->first();
        if (!$person) {
            $person = new Person([
                'name' => $request->name,
                'identification_number' => $request->identification_number,
                'status' => $request->person_status,
            ]);

            $person->save();

            return Redirect::back()->with(['success' => 'Ieraksts ir saglabāts']);
        } else {
            return Redirect::back()->withErrors(['msg' => 'Persona jau ir saglabāta']);
        }
    }

    public function edit(Request $request, int $id): RedirectResponse
    {
        $person = Person::where('id', $id)->first();

        $person->name = $request->name;
        $person->identification_number = $request->identification_number;
        $person->status = $request->person_status;

        $person->save();

        return Redirect::to('/persons')->with(['success' => 'Ieraksts ir labots']);
    }

    public function delete(int $id): RedirectResponse
    {
        Person::find($id)->delete();

        return Redirect::back()->with(['success' => 'Ieraksts ir izdzēsts']);

    }
}
