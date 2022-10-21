<div class="modal fade" id="editPropertyModal{{$property->id}}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{asset('edit-property/' . $property->id)}}">
                    @csrf
                    <div class="mb-3">
                        <label for="person_name" class="form-label">Īpašnieks</label>
                        <div class="form-control" id="person_name">{{$property->person->name}}</div>
                    </div>
                    <div class="mb-3">
                        <label for="person_status" class="form-label">Personas statuss</label>
                        <div class="form-control"
                             id="person_status">{{\App\Models\Person::getPersonStatuses()[$property->person->status]}}</div>
                    </div>
                    <div class="mb-3">
                        <label for="identification_number" class="form-label">Īpašnieka personas kods/reģistrācijas
                            numurs</label>
                        <div class="form-control"
                             id="identification_number">{{$property->person->identification_number}}</div>
                    </div>
                    <div class="mb-3">
                        <label for="property_title" class="form-label">Īpašuma nosaukums</label>
                        <input class="form-control" id="property_title" name="property_title"
                               value="{{$property->title}}" required/>
                    </div>
                    <div class="mb-3">
                        <label for="cadastral_number" class="form-label">Kadastra numurs</label>
                        <input class="form-control" id="cadastral_number" name="cadastral_number"
                               value="{{$property->cadastral_number}}" required/>
                        <small style="color:green">Kadastra numuram jāsastāv no 11 cipariem bez atstarpēm un simboliem</small>
                    </div>
                    <div class="mb-3">
                        <label for="property_status" class="form-label">Īpašuma tiesību statuss</label>
                        <select id="property_status" name="property_status">
                            @foreach(\App\Models\Property::getPropertyStatuses() as $value =>$status)
                                @if($value === $property->status)
                                    <option selected value="{{$value}}">{{$status}}</option>
                                @else
                                    <option value="{{$value}}">{{$status}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Aizvērt</button>
                        <button type="submit" class="btn btn-success">Saglabāt izmaiņas</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
