<form id="EditForm" method="POST" enctype="multipart/form-data" action="{{ route('company.update', $company->id) }}">
    @csrf
    @method('PUT')
    <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
    </div>





    <div class="modal-body">
        <div class="row">

            <div class="col-md-6">
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" class="form-control" name="title" value="{{ $company->title }}"
                        placeholder="Enter title">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>Sub Title</label>
                    <input type="text" class="form-control" name="sub_title" value="{{ $company->sub_title }}"
                        placeholder="Enter sub title">
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control tinymceText" name="description" placeholder="Enter description" rows="3">{!! $company->description !!}</textarea>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>Image (H:800px W:800px)</label>
                    <input type="file" class="form-control" name="image">
                    @if ($company->image)
                        <img src="{{ asset($company->image) }}" width="120" height="120" class="mt-2">
                    @endif
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>Video</label>
                    <input type="file" class="form-control" name="video">
                    @if ($company->video)
                        <video src="{{ asset($company->video) }}" width="100%" height="120" controls
                            class="mt-2"></video>
                    @endif
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>YouTube Video Link</label>
                    <input type="text" class="form-control" name="youtube_video"
                        value="{{ $company->youtube_video }}" placeholder="Enter YouTube video link">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Company Name</label>
                    <input type="text" class="form-control" name="company_name" value="{{ $company->company_name }}"
                        placeholder="Enter company name">
                </div>
            </div>
            <div class="col-md-6 company_logo">
                <div class="form-group">
                    <label>Company Logo (H:800px W:800px)</label>
                    <input type="file" class="form-control" name="company_logo">
                    @if ($company->company_logo)
                        <img src="{{ asset($company->company_logo) }}" width="120" height="120" class="mt-2">
                    @endif
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Website Link</label>
                    <input type="text" class="form-control" name="button_link" value="{{ $company->button_link }}"
                        placeholder="Enter Website Link">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>Map Link</label>
                    <input type="text" class="form-control" name="map" value="{{ $company->map }}"
                        placeholder="Enter map link">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>Serial</label>
                    <input type="text" class="form-control" name="serial" value="{{ $company->serial }}"
                        placeholder="Enter serial">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control">
                        <option value="1" {{ $company->status == 1 ? 'selected' : '' }}>Active</option>
                        <option value="2" {{ $company->status == 2 ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>
            </div>

        </div>
    </div>







    <div class="modal-footer">
        <button type="submit" id="EditFormSubmitBtn" class="btn btn-sm btn-primary">Update</button>
    </div>
</form>
