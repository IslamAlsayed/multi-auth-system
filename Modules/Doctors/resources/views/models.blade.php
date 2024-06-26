<div class="modal fade" id="deleteAll" role="dialog" aria-labelledby="deleteAllDoctor" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteAllDoctor">delete all doctor</h1>
            </div>
            <form action="{{ route('doctors') }}" method="POST">
                @csrf
                @method('delete')
                <div class="modal-body">
                    <div class="model-text">
                        <div class="mb-3">
                            <input type="hidden" name="id" value="{{ $doctor->id }}">
                            <input type="hidden" name="ids" id="ids">
                            <p>You sure deleted <b class="text-danger">all doctors</b>
                                <span class="countDoctorsDeleted"></span> ?
                            </p>
                        </div>
                        @if ($doctor->image)
                        <input type="hidden" name="filename" value="{{ $doctor->image->filename }}">
                        @endif
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

<div class="modal fade" id="delete-{{$doctor->id}}" role="dialog" aria-hidden="true" aria-labelledby="deleteDoctor"
    tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteDoctor">Delete Doctor</h1>
            </div>
            <form action="{{ route('doctors',['id' => $doctor->id]) }}" method="POST">
                @csrf
                @method('delete')
                <div class="modal-body">
                    <div class="modal-text">
                        <div class="mb-3">
                            <input type="hidden" name="id" value="{{ $doctor->id }}">
                            <p>You sure deleted this is doctor <b class="text-danger">{{ $doctor->name }}</b> ?</p>
                        </div>
                        <input type="hidden" name="single" value="1">
                        @if ($doctor->image)
                        <input type="hidden" name="filename" value="{{ $doctor->image->filename }}">
                        @endif
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

<div class="modal fade" id="updateStatus-{{ $doctor->id }}" role="dialog" aria-labelledby="updateStatusDoctor"
    tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="updateStatusDoctor">update status doctor</h1>
            </div>
            <form action="{{ route('doctors.updateStatus') }}" method="POST">
                @method('patch')
                @csrf
                <div class="modal-body">
                    <div class="model-text">
                        <div class="mb-3">
                            <input type="hidden" name="id" value="{{ $doctor->id }}">
                            <label for="status" class="form-label">status</label>
                            <select class="form-control" name="status" id="status">
                                <option value="" selected disabled>...</option>
                                <option value="1" {{ $doctor->status == 1 ? 'selected' : '' }}>enable</option>
                                <option value="0" {{ $doctor->status == 0 ? 'selected' : '' }}>disable</option>
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

<div class="modal fade" id="edit-{{ $doctor->id }}" aria-hidden="true" aria-labelledby="EditDoctor" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="EditDoctor">Edit Doctor</h1>
            </div>
            <form action="{{ route('doctors',['id' => $doctor->id]) }}" method="POST">
                @csrf
                @method('patch')
                <div class="modal-body">
                    <div class="modal-text">
                        <div class="mb-3">
                            <label for="name" class="form-label">edit name</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{ $doctor->name }}">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">edit email</label>
                            <input type="email" class="form-control email" name="email" id="email"
                                value="{{ $doctor->email }}">
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">edit phone</label>
                            <input type="text" class="form-control" name="phone" id="phone"
                                value="{{ $doctor->phone }}">
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">edit price</label>
                            <input type="text" class="form-control" name="price" id="price"
                                value="{{ $doctor->price }}">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">cancel</button>
                        <button type="submit" class="btn btn-primary">update</button>
                    </div>
            </form>
        </div>
    </div>
</div>