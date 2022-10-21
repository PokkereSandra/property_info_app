<div class="modal fade" id="addType" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Pievieno tipu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{asset('/add-type')}}">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="land_type" class="form-label">Jau pieejami zemesgabalu lietojuma veidi</label>
                        <select id="land_type" name="land_type">
                            @foreach(\App\Models\Type::getTypes() as $value)
                                <option>{{$value->type}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="new_type" class="form-label">Jaunais veids</label>
                        <input class="form-control" id="new_type" name="new_type"/>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Aizvērt</button>
                        <button type="submit" class="btn btn-success">Pievienot sarakstam</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
