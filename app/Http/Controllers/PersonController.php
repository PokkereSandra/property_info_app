<?php

namespace App\Http\Controllers;

use App\Services\PersonService;
use App\Services\PropertyAppValidationService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PersonController
{
    public function persons(): Factory|View|Application
    {
        $persons = (new PersonService)->showAll();

        return view('person-list', [
            'persons' => $persons,
        ]);
    }

    public function personsWithoutProperties(): Factory|View|Application
    {
        $persons = (new PersonService())->showAllWithoutProperties();

        return view('person-list', [
            'persons' => $persons,
        ]);
    }

    public function storePerson(Request $request): RedirectResponse
    {
        $validator = (new PropertyAppValidationService())->validatePerson($request);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }
        return (new PersonService())->savePerson($request);
    }

    public function editPerson(Request $request, int $id): RedirectResponse
    {
        $validator = (new PropertyAppValidationService())->validatePerson($request);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }

        return (new PersonService())->edit($request, $id);
    }

    public function destroyPerson(int $id): RedirectResponse
    {
        return (new PersonService())->delete($id);
    }

}
