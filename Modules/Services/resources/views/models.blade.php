<div class="modal fade" id="delete-{{ $service->id }}" role="dialog" aria-hidden="true" aria-labelledby="deleteservice"
    tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteservice">Delete service</h1>
            </div>
            <form action="{{ route('services', ['id' => $service->id]) }}" method="POST">
                @csrf
                @method('delete')
                <div class="modal-body">
                    <div class="mb-3">
                        <input type="hidden" name="id" value="{{ $service->id }}">
                        <h4>You sure delete this is service <b class="text-danger">{{ $service->name }}</b></h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-danger">Yes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="updateStatus-{{ $service->id }}" role="dialog" aria-labelledby="updateStatusService"
    tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="updateStatusService">update status service</h1>
            </div>
            <form action="{{ route('services.updateStatus') }}" method="POST">
                @method('patch')
                @csrf
                <div class="modal-body">
                    <div class="model-text">
                        <div class="mb-3">
                            <input type="hidden" name="id" value="{{ $service->id }}">
                            <label for="status" class="form-label">status</label>
                            <select class="form-control" name="status" id="status">
                                <option value="" selected disabled>...</option>
                                <option value="1" {{ $service->status == 1 ? 'selected' : '' }}>enable</option>
                                <option value="0" {{ $service->status == 0 ? 'selected' : '' }}>disable</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">cancel</button>
                        <button type="submit" class="btn btn-danger">update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="edit-{{ $service->id }}" aria-hidden="true" aria-labelledby="Editservice" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="Editservice">Edit service</h1>
            </div>
            <form action="{{ route('services.update',['id' => $service->id]) }}" method="POST">
                @csrf
                @method('patch')
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">name</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ $service->name }}">
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">price</label>
                        <input type="text" class="form-control" name="price" id="price" value="{{ $service->price }}">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">description</label>
                        <input type="text" class="form-control" name="description" id="description"
                            value="{{ $service->description }}">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">cancel</button>
                        <button type="submit" class="btn btn-primary">update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>