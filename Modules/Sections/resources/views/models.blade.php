<div class="modal fade" id="delete-{{$section->id}}" role="dialog" aria-hidden="true" aria-labelledby="deleteSection"
    tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteSection">Delete Section</h1>
            </div>
            <form action="{{ route('sections',['id' => $section->id]) }}" method="POST">
                @csrf
                @method('delete')
                <div class="modal-body">
                    <div class="mb-3">
                        <input type="hidden" name="id" value="{{ $section->id }}">
                        <h4>You sure delete this is section <b class="text-danger">{{ $section->name }}</b></h4>
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

<div class="modal fade" id="edit-{{$section->id}}" aria-hidden="true" aria-labelledby="EditSection" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="EditSection">Edit Section</h1>
            </div>
            <form action="{{ route('sections',['id' => $section->id]) }}" method="POST">
                @csrf
                @method('patch')
                <div class="modal-body">
                    <div class="mb-3">
                        <input type="hidden" name="id" value="{{ $section->id }}">
                        <label for="name" class="form-label">Edit Name</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ $section->name }}">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
            </form>
        </div>
    </div>
</div>