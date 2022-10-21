<?php

namespace App\Services;

use App\Models\Property;
use App\Models\PropertyPart;
use App\Models\Type;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PropertyPartService
{
    public function savePropertyPart(Request $request): RedirectResponse
    {
        $property = Property::where('cadastral_number', $request->cadastral_number)->first();

        $propertyPart = PropertyPart::where('cadastral_designation', $request->cadastral_designation)->first();

        if (!$property) {
            return Redirect::back()->withErrors(['msg' => 'Nav atrasts šāds īpašums, pārbaudiet kadastra numuru']);
        } else if (!$propertyPart) {
            $propertyPart = new PropertyPart([
                'property_id' => $property->id,
                'cadastral_designation' => $request->cadastral_designation,
                'area_ha' => $request->area_ha,
                'measured_at' => $request->measured_at,
            ]);

            $type = Type::where('id', $request->property_type)->first();

            $propertyPart->type_id = $type->id ?? null;

            $propertyPart->save();

            return Redirect::back()->with(['success' => 'Ieraksts ir saglabāts']);
        } else {
            return Redirect::back()->withErrors(['msg' => 'Šāds zemesgabals jau ir reģistrēts']);
        }
    }

    public function edit(Request $request, int $id): RedirectResponse
    {
        $propertyPart = PropertyPart::where('id', $id)->first();

        $propertyPart->cadastral_designation = $request->cadastral_designation;
        $propertyPart->area_ha = $request->area_ha;
        $propertyPart->measured_at = $request->measured_at;

        $type = Type::where('id', $request->property_type)->first();

        $propertyPart->type_id = $type->id ?? null;

        $propertyPart->save();

        return Redirect::back()->with(['success' => 'Ieraksts ir labots']);
    }

    public function delete(int $id): RedirectResponse
    {
        PropertyPart::find($id)->delete();

        return Redirect::back()->with(['success' => 'Ieraksts ir izdzēsts']);

    }

    public function saveType(Request $request): RedirectResponse
    {
        $type = new Type([
            'type' => $request->new_type,
        ]);

        $type->save();
        return Redirect::back()->with(['success' => 'Ieraksts ir pievienots']);
    }

}
