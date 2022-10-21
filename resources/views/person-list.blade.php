@extends('layouts.property_page')
@section('content')
    @if(session()->has('success'))
        <div class="alert alert-success success-message">
            {{ session()->get('success') }}
        </div>
    @endif
    @if($errors->any())
        <h4 class="alert alert-danger success-message">{{$errors->first()}}</h4>
    @endif
    <div class="container">
        <div class="col-md-3">
            <div class="row header-row">
                <button data-bs-toggle="modal" data-bs-target="#addPersonModal" class="btn btn-outline-success">
                    Pievienot jaunu personu
                </button>
            </div>
        </div>
        <div class="row">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Vārds,uzvārds(uzņēmuma nosaukums)</th>
                    <th scope="col">Personas kods(reģistrācijas numurs)</th>
                    <th scope="col">Īpašumu kopplatība</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($persons as $person)
                    <tr>
                        <td>{{$person->name}}</td>
                        @if($person->status===\App\Models\Person::INDIVIDUAL)
                            <td>p.k. {{substr($person->identification_number,0,6)}}-{{substr($person->identification_number, 6)}}</td>
                        @else
                            <td> reģ. nr. {{$person->identification_number}}</td>
                        @endif
                        <td>{{$person->getPropertySum()}}</td>
                        <td><a href="{{asset('/properties/' . $person->id)}}" class="btn btn-outline-success">Apskatīt
                                īpašumus</a></td>
                        <td>
                            @include('inc.edit-person-modal')
                            <!-- Button trigger editPersonModal -->
                            <a type="button" class="btn btn-outline-warning" data-bs-toggle="modal"
                               data-bs-target="#editPersonModal{{$person->id}}">Labot</a>
                        </td>
                        <td>
                            <form method="post" action="{{asset('/delete-person/'. $person->id)}}">
                                @csrf
                                <button class="btn btn-outline-danger" type="submit">Dzēst</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @include('inc.add-person-modal')

@endsection
