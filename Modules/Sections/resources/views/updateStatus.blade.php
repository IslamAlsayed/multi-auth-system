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
                        <button type="submit" class="btn btn-danger">save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>