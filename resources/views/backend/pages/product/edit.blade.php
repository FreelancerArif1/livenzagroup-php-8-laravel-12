<form id="EditForm" method="POST" enctype="multipart/form-data" action="{{ route('product.update', $product->id) }}">
    @csrf
    @method('PUT')
    <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
    </div>





    <div class="modal-body">
        <div class="row">

            <div class="col-md-12">
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" class="form-control" name="title" value="{{ $product->title }}"
                        placeholder="Enter title">
                </div>
            </div>

            <!-- <div class="col-md-6">
                <div class="form-group">
                    <label>Sub Title</label>
                    <input type="text" class="form-control" name="sub_title" value="{{ $product->sub_title }}"
                        placeholder="Enter sub title">
                </div>
            </div> -->

            <div class="col-md-12">
                <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control tinymceText" name="description" placeholder="Enter description" rows="3">{!! $product->description !!}</textarea>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>Image (H:800px W:800px)</label>
                    <input type="file" class="form-control" name="image">
                    @if ($product->image)
                        <img src="{{ asset($product->image) }}" width="120" height="120" class="mt-2">
                    @endif
                </div>
            </div>
        




            <div class="col-md-6">
                <div class="form-group">
                    <label>Video</label>
                    <input type="file" class="form-control" name="video">
                    @if ($product->video)
                        <video src="{{ asset($product->video) }}" width="100%" height="120" controls
                            class="mt-2"></video>
                    @endif
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>YouTube Video Link</label>
                    <input type="text" class="form-control" name="youtube_video"
                        value="{{ $product->youtube_video }}" placeholder="Enter YouTube video link">
                </div>
            </div>

            
            <div class="col-md-6">
                <div class="form-group">
                    <label>Select Company</label>
                    <select name="company_id" class="form-control">
                        <option value="1">--Select--</option>
                        @if($companies)
                            @foreach($companies as $company)
                                <option value="{{ $company->id }}"  {{ $product->company_id == $company->id ? 'selected' : '' }}>{{ $company->title }}</option>
                            @endforeach
                        @endif
                        
                    </select>
                </div>
            </div>


            <div class="col-md-4">
                <div class="form-group">
                    <label>Brand</label>
                    <input type="text" class="form-control" name="brand" value="{{ old('brand', $product->brand ?? '') }}" placeholder="Enter Brand">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Model</label>
                    <input type="text" class="form-control" name="model" value="{{ old('model', $product->model ?? '') }}" placeholder="Enter Model">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Reg. Year</label>
                    <input type="date" class="form-control" name="reg_year" value="{{ old('reg_year', $product->reg_year ?? '') }}" placeholder="Enter Reg. Year">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Mileage</label>
                    <input type="text" class="form-control" name="mileage" value="{{ old('mileage', $product->mileage ?? '') }}" placeholder="Enter Mileage">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Engine (CC)</label>
                    <input type="text" class="form-control" name="engine" value="{{ old('engine', $product->engine ?? '') }}" placeholder="Enter Engine (CC)">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Transmission</label>
                    <input type="text" class="form-control" name="transmission" value="{{ old('transmission', $product->transmission ?? '') }}" placeholder="Enter Transmission">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Fuel Type</label>
                    <input type="text" class="form-control" name="fuel_type" value="{{ old('fuel_type', $product->fuel_type ?? '') }}" placeholder="Enter Fuel Type">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Drive Type</label>
                    <input type="text" class="form-control" name="drive_type" value="{{ old('drive_type', $product->drive_type ?? '') }}" placeholder="Enter Drive Type">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Wheel</label>
                    <input type="text" class="form-control" name="wheel" value="{{ old('wheel', $product->wheel ?? '') }}" placeholder="Enter Wheel">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Exterior</label>
                    <input type="text" class="form-control" name="exterior" value="{{ old('exterior', $product->exterior ?? '') }}" placeholder="Enter Exterior">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Body Style</label>
                    <input type="text" class="form-control" name="body_style" value="{{ old('body_style', $product->body_style ?? '') }}" placeholder="Enter Body Style">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Price</label>
                    <input type="text" class="form-control" name="price" value="{{ old('price', $product->price ?? '') }}" placeholder="Enter Price">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>Serial</label>
                    <input type="text" class="form-control" name="serial" value="{{ $product->serial }}"
                        placeholder="Enter serial">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control">
                        <option value="1" {{ $product->status == 1 ? 'selected' : '' }}>Active</option>
                        <option value="2" {{ $product->status == 2 ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>
            </div>

        </div>
    </div>







    <div class="modal-footer">
        <button type="submit" id="EditFormSubmitBtn" class="btn btn-sm btn-primary">Update</button>
    </div>
</form>
