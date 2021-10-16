<div class="modal fade" id="add-user-modal">
    <div class="modal-dialog">
        <form action="{{route('user.store')}}" method="post">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">New Administrator</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mx-5">
                    <div class="form-group row">
                        <label for="" >Name</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="form-group row">
                        <label for="" >Email</label>
                        <input type="text" name="email" class="form-control">
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-info btn-flat">Create</button>
                </div>
            </div>
        </form>
    </div>
</div>
