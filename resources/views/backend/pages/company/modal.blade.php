<!-- Modal -->
<div class="modal fade" id="CreateModalOpen" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="CreateForm" action="{{ route('company.store') }}" method="POST" enctype="multipart/form-data">

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

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Sub Title</label>
                                <input type="text" class="form-control" name="sub_title"
                                    placeholder="Enter sub title">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control tinymceText" name="description" placeholder="Enter description" rows="3"></textarea>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Image (H:800px W:800px) </label>
                                <input type="file" class="form-control" name="image">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Video</label>
                                <input type="file" class="form-control" name="video">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>YouTube Video Link</label>
                                <input type="text" class="form-control" name="youtube_video"
                                    placeholder="Enter youTube video link">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Company Name</label>
                                <input type="text" class="form-control" name="company_name"
                                    placeholder="Enter company name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Company Logo (H:800px W:800px) </label>
                                <input type="file" class="form-control" name="company_logo">
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Website Link</label>
                                <input type="text" class="form-control" name="button_link"
                                    placeholder="Enter Website Link">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Map Link</label>
                                <input type="text" class="form-control" name="map" placeholder="Enter map link">
                            </div>
                        </div>
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
