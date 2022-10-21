<?php

namespace App\Http\Controllers;

use App\Services\PropertyAppValidationService;
use App\Services\PropertyPartService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PropertyPartController
{
    public function storePropertyPart(Request $request): RedirectResponse
    {
        $validator = (new PropertyAppValidationService())->validatePropertyPart($request);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }

        return (new PropertyPartService())->savePropertyPart($request);
    }

    public function editPropertyPart(Request $request, int $id): RedirectResponse
    {
        $validator = (new PropertyAppValidationService())->validatePropertyPart($request);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }

        return (new PropertyPartService())->edit($request, $id);
    }

    public function destroyPropertyPart(int $id): RedirectResponse
    {
        return (new PropertyPartService())->delete($id);
    }

}
