<div class="modal fade" id="editPropertyPartModal{{$part->id}}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Aizpildi informāciju par zemesgabalu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{asset('edit-land/' . $part->id)}}">
                    @csrf
                    <div class="mb-3">
                        <label for="cadastral_number" class="form-label">Īpašuma kadastra numurs</label>
                        <div class="form-control" id="cadastral_number">{{$part->property->cadastral_number}}</div>
                    </div>
                    <div class="mb-3">
                        <label for="property_type" class="form-label">Zemes izmantošanas veids</label>
                        <select id="property_type" name="property_type">
                            <option selected>---</option>
                            @foreach(\App\Models\Type::getTypes() as $value)
                                @if($value->id === $part->type_id)
                                    <option selected value="{{$value->id}}">{{$value->type}}</option>
                                @else
                                    <option value="{{$value->id}}">{{$value->type}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="cadastral_designation" class="form-label">Zemes kadastra apzīmējums</label>
                        <input class="form-control" id="cadastral_designation" name="cadastral_designation"
                               value="{{$part->cadastral_designation}}" required/>
                        <small style="color:green">Kadastra apzīmējumam jāsastāv no 11 cipariem bez atstarpēm un simboliem</small>
                    </div>
                    <div class="mb-3">
                        <label for="area_ha" class="form-label">Zemes platība, hektāros</label>
                        <input class="form-control" id="area_ha" name="area_ha" value="{{$part->area_ha}}" required/>
                    </div>
                    <div class="mb-3">
                        <label for="measured_at" class="form-label">Uzmērīšanas datums</label>
                        <input type="date" class="form-control" id="measured_at" name="measured_at"
                               value="{{$part->measured_at}}" required/>
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
