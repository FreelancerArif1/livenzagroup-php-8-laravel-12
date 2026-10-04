<!-- Modal -->
<div class="modal fade" id="CreateModalOpen" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="CreateForm" action="{{ route('servicecategory.store') }}" method="POST" enctype="multipart/form-data">

                @csrf
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add New</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="server_side_error"></div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" class="form-control" name="title" placeholder="Enter title">
                            </div>
                        </div>

                        <!-- <div class="col-md-6">
                            <div class="form-group">
                                <label>Image (H:100px W:100px) </label>
                                <input type="file" class="form-control" name="image">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label> Link</label>
                                <input type="text" class="form-control" name="link" placeholder="Enter Link">
                            </div>
                        </div> -->

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Serial</label>
                                <input type="text" class="form-control" name="serial" placeholder="Enter serial">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="CreateModalSubmitBtn" class="btn btn-sm btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- edit modal  --}}



<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">



        </div>
    </div>
</div>
