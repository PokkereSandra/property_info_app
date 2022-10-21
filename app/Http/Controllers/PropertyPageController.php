<?php

namespace App\Http\Controllers;

use App\Services\PersonService;
use App\Services\PropertyPartService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PropertyPageController extends Controller
{
    public function index(): Factory|View|Application
    {
        $persons = (new PersonService)->showAll();

        return view('summary', [
            'persons' => $persons,
        ]);
    }

    public function storeType(Request $request): RedirectResponse
    {
        return (new PropertyPartService())->saveType($request);
    }

}
