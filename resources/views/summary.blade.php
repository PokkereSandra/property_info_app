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
        <div class="row header-row">
            <!-- Button trigger AddPersonModal -->
            <div class="col-md-2">
                <button type="button" class="btn btn-outline-dark" data-bs-toggle="modal"
                        data-bs-target="#addPersonModal">Pievienot jaunu personu
                </button>
            </div>
            <!-- Button trigger AddPropertyModal -->
            <div class="col-md-2">
                <a type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#addPropertyModal">Pievienot
                    jaunu īpašumu</a>
            </div>
            <!-- Button trigger AddPropertyPartModal -->
            <div class="col-md-2">
                <a type="button" class="btn btn-outline-dark" data-bs-toggle="modal"
                   data-bs-target="#addPropertyPartModal">Pievienot jaunu zemesgabalu</a>
            </div>
        </div>
        <table class="table table-striped table-secondary">
            <thead>
            <tr class="summary-head-row">
                <th scope="col" class="summary-cell">Vārds,uzvārds<br>(uzņēmuma nosaukums)</th>
                <th scope="col" class="summary-cell">Personas kods<br>(reģistrācijas numurs)</th>
                <th scope="col" class="summary-cell">Īpašums</th>
            </tr>
            </thead>
            <tbody>
            @foreach($persons as $person)
                <tr>
                    <td class="summary-cell">{{$person->name}}</td>
                    @if($person->status===\App\Models\Person::INDIVIDUAL)
                        <td class="summary-cell">p.k.<br> {{substr($person->identification_number,0,6)}}
                            -{{substr($person->identification_number, 6)}}</td>
                    @else
                        <td class="summary-cell"> reģ. nr.<br> {{$person->identification_number}}</td>
                    @endif
                    <td class="summary-cell">
                        <table class="table table-striped">
                            <thead>
                            <tr class="summary-head-row">
                                <th scope="col">Nosaukums</th>
                                <th scope="col">Kadastra numurs</th>
                                <th scope="col">Statuss</th>
                                <th scope="col" class="summary-cell">Zemesgabali</th>
                            </tr>
                            </thead>
                            @foreach($person->properties as $property)
                                <tr>
                                    <td>{{$property->title}}</td>
                                    <td>{{$property->cadastral_number}}</td>
                                    <td>{{$property->getPropertyStatus($property->status)}}</td>
                                    <td>
                                        <table class="table table-striped">
                                            <thead>
                                            <tr class="summary-head-row">
                                                <th scope="col">Kadastra apzīmējums</th>
                                                <th scope="col">Zemes lietojums</th>
                                                <th scope="col">Platība, ha</th>
                                                <th scope="col">Uzmērīšanas datums</th>
                                            </tr>
                                            </thead>
                                            @foreach($property->propertyParts as $part)
                                                <tr>
                                                    <td>{{$part->cadastral_designation}}</td>
                                                    @if(isset($part->type))
                                                        <td>{{$part->type->type}}</td>
                                                    @else
                                                        <td></td>
                                                    @endif
                                                    <td>{{$part->area_ha}}</td>
                                                    <td>{{date('d.m.Y',strtotime($part->measured_at))}}</td>
                                                </tr>
                                            @endforeach
                                        </table>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    @include('inc.add-person-modal')
    @include('inc.add-property-modal')
    @include('inc.add-property-part-modal')
@endsection
