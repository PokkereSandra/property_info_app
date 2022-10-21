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
            <!-- Button trigger AddPropertyModal -->
            <div class="col-md-4">
                <a type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#addPropertyModal">Pievienot
                    jaunu īpašumu</a>
            </div>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Nosaukums</th>
                <th scope="col">Kadastra numurs</th>
                <th scope="col">Statuss</th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($properties as $property)
                <tr>
                    <td>{{$property->title}}</td>
                    <td>{{$property->cadastral_number}}</td>
                    <td>{{$property->getPropertyStatus($property->status)}}</td>
                    <td><a href="{{asset('/property/' . $property->id)}}" class="btn btn-outline-success">Apskatīt
                            zemesgabalus</a></td>
                    <td>
                        @include('inc.edit-property-modal')
                        <!-- Button trigger editPropertyModal -->
                        <a type="button" class="btn btn-outline-warning" data-bs-toggle="modal"
                           data-bs-target="#editPropertyModal{{$property->id}}">Labot īpašuma ierakstu</a>
                    </td>
                    <td>
                        <form method="post" action="{{asset('/delete-property/'. $property->id)}}">
                            @csrf
                            <button class="btn btn-outline-danger" type="submit">Dzēst</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    @include('inc.add-property-modal')
@endsection
