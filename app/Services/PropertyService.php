<?php

namespace App\Services;

use App\Models\Person;
use App\Models\Property;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


class PropertyService
{
    public function showAllToOnePerson(int $id)
    {
        return Property::where('person_id', $id)->get();
    }

    public function showOne(int $id)
    {
        return Property::where('id', $id)->first();
    }

    public function showAll(): Collection
    {
        return Property::all();
    }

    public function showPropertiesWithoutLand(): array
    {
        $all = self::showAll();
        $properties = [];
        foreach ($all as $property) {
            if (count($property->propertyParts) == 0) {
                $properties[] = $property;
            }
        }

        return $properties;
    }

    public function saveProperty(Request $request): RedirectResponse
    {
        $person = Person::where(['identification_number' => $request->identification_number],
            ['status' => $request->status])->first();

        $property = Property::where('cadastral_number', $request->cadastral_number)->first();

        if (!$person) {
            return Redirect::back()->withErrors(['msg' => 'Nav atrasta šāda persona, lūdzu, pārbaudiet personas kodu/reģistrācijas numuru']);
        } else if (!$property) {
            $property = new Property([
                'person_id' => $person->id,
                'title' => $request->property_title,
                'cadastral_number' => $request->cadastral_number,
                'status' => $request->property_status,
            ]);

            $property->save();

            return Redirect::back()->with(['success' => 'Ieraksts ir saglabāts']);
        } else {
            return Redirect::back()->withErrors(['msg' => 'Šāds īpašums jau ir reģistrēts']);
        }
    }

    public function edit(Request $request, int $id): RedirectResponse
    {
        $property = Property::where('id', $id)->first();

        $property->title = $request->property_title;
        $property->cadastral_number = $request->cadastral_number;
        $property->status = $request->property_status;

        $property->save();

        return Redirect::back()->with(['success' => 'Ieraksts ir labots']);
    }

    public function delete(int $id): RedirectResponse
    {
        Property::find($id)->delete();

        return Redirect::back()->with(['success' => 'Ieraksts ir izdzēsts']);

    }

}
