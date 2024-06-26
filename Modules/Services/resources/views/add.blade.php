<div class="modal fade" id="addService" aria-hidden="true" aria-labelledby="addService" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="addService">add service</h1>
            </div>
            <form action="{{ route('services') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">name</label>
                        <input type="text" class="form-control" name="name" id="name">
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">price</label>
                        <input type="text" class="form-control" name="price" id="price">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">description</label>
                        <input type="text" class="form-control" name="description" id="description">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>