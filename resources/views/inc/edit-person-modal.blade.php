<div class="modal fade" id="editPersonModal{{$person->id}}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Labot personas datus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{asset('edit-person/' . $person->id)}}">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label required">Vārds,uzvārds/uzņēmuma nosaukums</label>
                        <input class="form-control" id="name" name="name" value="{{$person->name}}" required>
                    </div>
                    <div class="mb-3">
                        <label for="person_status" class="form-label required"></label>
                        <select id="person_status" name="person_status">
                            @foreach(\App\Models\Person::getPersonStatuses() as $value =>$status)
                                @if($value === $person->status)
                                    <option selected value="{{$value}}">{{$status}}</option>
                                @else
                                    <option value="{{$value}}">{{$status}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="identification_number" class="form-label">Personas kods/reģistrācijas numurs</label>
                        <input class="form-control" id="identification_number" name="identification_number"
                               value="{{$person->identification_number}}" required/>
                        <small style="color:green">Personas kodam vai reģistrācijas numuram jāsastāv no 11 cipariem bez atstarpēm un simboliem</small>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Aizvērt</button>
                        <button type="submit" class="btn btn-success">Saglabāt izmaiņas</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
