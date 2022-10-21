<?php

namespace App\Http\Controllers;

use App\Services\PropertyAppValidationService;
use App\Services\PropertyService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PropertyController
{
    public function properties(): Factory|View|Application
    {
        $properties = (new PropertyService())->showAll();

        return view('property-list', [
            'properties' => $properties,
        ]);
    }

    public function propertiesWithoutLand(): Factory|View|Application
    {
        $properties = (new PropertyService())->showPropertiesWithoutLand();

        return view('property-list', [
            'properties' => $properties,
        ]);
    }

    public function showPropertiesToOnePerson(int $id): Factory|View|Application
    {
        $properties = (new PropertyService())->showAllToOnePerson($id);

        return view('property-list', [
            'properties' => $properties,
        ]);
    }

    public function showProperty(int $id): Factory|View|Application
    {
        $property = (new PropertyService())->showOne($id);

        return view('property', [
            'property' => $property,
        ]);
    }

    public function storeProperty(Request $request): RedirectResponse
    {
        $validator = (new PropertyAppValidationService())->validateProperty($request);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }

        return (new PropertyService())->saveProperty($request);
    }

    public function editProperty(Request $request, int $id): RedirectResponse
    {
        $validator = (new PropertyAppValidationService())->validateProperty($request);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }

        return (new PropertyService())->edit($request, $id);
    }

    public function destroyProperty(int $id): RedirectResponse
    {
        return (new PropertyService())->delete($id);
    }

}
