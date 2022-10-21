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
            <!-- Button trigger AddPropertyPartModal -->
            <div class="col-md-4">
                <a type="button" class="btn btn-outline-dark" data-bs-toggle="modal"
                   data-bs-target="#addPropertyPartModal">Pievienot jaunu zemesgabalu</a>
            </div>
            <div class="col-md-4"></div>
            <!-- Button trigger AddPropertyPartModal -->
            <div class="col-md-4">
                <a type="button" class="btn btn-outline-dark" data-bs-toggle="modal"
                   data-bs-target="#addType">Pievienot zemesgabala lietošanas veidu</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <h5>Īpašums: {{$property->title}}</h5>
            </div>
            <div class="col-md-4">
                Kopējā platība: {{$property->sumOfPropertyParts()}} ha
            </div>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Kadastra apzīmējums</th>
                <th scope="col">Zemes lietojums</th>
                <th scope="col">Platība, ha</th>
                <th scope="col">Uzmērīšanas datums</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
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
                    <td>
                        @include('inc.edit-property-part-modal')
                        <!-- Button trigger editPropertyPartModal -->
                        <a type="button" class="btn btn-outline-warning" data-bs-toggle="modal"
                           data-bs-target="#editPropertyPartModal{{$part->id}}">Labot zemesgabala datus</a>
                    </td>
                    <td>
                        <form method="post" action="{{asset('/delete-land/'. $part->id)}}">
                            @csrf
                            <button class="btn btn-outline-danger" type="submit">Dzēst</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    @include('inc.add-property-part-modal')
    @include('inc.add-type-modal')
@endsection
