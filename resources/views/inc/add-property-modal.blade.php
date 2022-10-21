<div class="modal fade" id="addPropertyModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Aizpildi informāciju par īpašumu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{asset('add-property')}}">
                    @csrf
                    <div class="mb-3">
                        <label for="person_status" class="form-label required">Personas statuss</label>
                        <select id="person_status" name="person_status">
                            @foreach(\App\Models\Person::getPersonStatuses() as $value =>$status)
                                <option value="{{$value}}">{{$status}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="identification_number" class="form-label required">Īpašnieka personas kods/reģistrācijas
                            numurs</label>
                        <input class="form-control" id="identification_number" name="identification_number" required>
                        <small style="color:green">Personas kodam vai reģistrācijas numuram jāsastāv no 11 cipariem bez atstarpēm un simboliem</small>
                    </div>
                    <div class="mb-3">
                        <label for="property_title" class="form-label required">Īpašuma nosaukums</label>
                        <input class="form-control" id="property_title" name="property_title" required/>
                    </div>
                    <div class="mb-3">
                        <label for="cadastral_number" class="form-label required">Kadastra numurs</label>
                        <input class="form-control" id="cadastral_number" name="cadastral_number" required>
                        <small style="color:green">Kadastra numuram jāsastāv no 11 cipariem bez atstarpēm un simboliem</small>
                    </div>
                    <div class="mb-3">
                        <label for="property_status" class="form-label required">Īpašuma tiesību statuss</label>
                        <select id="property_status" name="property_status">
                            @foreach(\App\Models\Property::getPropertyStatuses() as $value =>$status)
                                <option value="{{$value}}">{{$status}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Aizvērt</button>
                        <button type="submit" class="btn btn-success">Saglabāt</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
