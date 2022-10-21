<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PropertyAppValidationService
{
    public function validatePerson(Request $request)
    {
        return Validator::make($request->all(), [
            'name' => 'required',
            'identification_number' => 'required|digits:11',
            'person_status' => 'required',
        ],
            [
                'required' => 'Obligāti aizpildāms lauciņš',
                'digits' => 'Personas kodam vai reģistrācijas numuram jāsastāv no 11 cipariem'
            ]);
    }

    public function validateProperty(Request $request)
    {
        return Validator::make($request->all(), [
            'property_title' => 'required',
            'cadastral_number' => 'required|digits:11',
        ],
            [
                'required' => 'Obligāti aizpildāms lauciņš',
                'digits' => 'Kadastra numuram jāsastāv no 11 cipariem'
            ]);
    }

    public function validatePropertyPart(Request $request)
    {
        return Validator::make($request->all(), [
            'cadastral_designation' => 'required|digits:11',
            'area_ha' => 'required',
            'measured_at' => 'required',
        ],
            [
                'required' => 'Obligāti aizpildāms lauciņš',
                'digits' => 'Kadastra apzīmējumam jāsastāv no 11 cipariem'
            ]);
    }

}
