
<form id="EditForm" method="POST" enctype="multipart/form-data" action="{{ route('product.update', $product->id) }}">
    @csrf
    @method('PUT')

    <div class="row g-3">

        <!-- Title -->
        <div class="col-md-12">
            <div class="form-group">
                <label class="form-label font-weight-bold">Title</label>
                <input type="text" class="form-control" name="title" value="{{ old('title', $product->title) }}" placeholder="Enter title">
            </div>
        </div>

        <!-- Description -->
        <div class="col-md-12">
            <div class="form-group">
                <label class="form-label font-weight-bold">Description</label>
                <textarea class="form-control tinymceText" name="description" placeholder="Enter description" rows="4">{!! old('description', $product->description) !!}</textarea>
            </div>
        </div>

        <!-- Single Image Upload & Dynamic Preview -->
        <div class="col-md-6">
            <div class="form-group">
                <label class="form-label font-weight-bold">Single Image (H:800px W:800px)</label>
                <input type="file" class="form-control" id="singleImageInput" name="image" accept="image/*">
            </div>
            <div id="singleImagePreviewContainer" class="mt-2">
                @if (!empty($product->image))
                    <div class="preview-item" id="existingSingleImage">
                        <img src="{{ asset($product->image) }}" alt="Single Image">
                        <button type="button" class="remove-btn" onclick="removeExistingSingleImage()">&times;</button>
                        <input type="hidden" name="old_image" value="{{ $product->image }}">
                    </div>
                @endif
            </div>
        </div>

        <!-- Multiple Gallery Images Upload & Dynamic Preview -->
        <div class="col-md-6">
            <div class="form-group">
                <label class="form-label font-weight-bold">Multiple Images (H:800px W:800px)</label>
                <input type="file" class="form-control" id="multipleImageInput" name="images[]" multiple accept="image/*">
            </div>
            <div id="multipleImagePreviewContainer" class="d-flex flex-wrap gap-2 mt-2">
                @php
                    $existingImages = is_string($product->images) ? json_decode($product->images, true) : ($product->images ?? []);
                @endphp
                @if (!empty($existingImages) && is_array($existingImages))
                    @foreach ($existingImages as $img)
                        <div class="preview-item existing-gallery-item">
                            <img src="{{ asset($img) }}" alt="Gallery Image">
                            <button type="button" class="remove-btn" onclick="removeExistingGalleryImage(this)">&times;</button>
                            <input type="hidden" name="old_images[]" value="{{ $img }}">
                        </div>
                    @endforeach
                @endif
            </div>
        </div>

        <!-- Single Video Upload -->
        <div class="col-md-6">
            <div class="form-group">
                <label class="form-label font-weight-bold">Video File</label>
                <input type="file" class="form-control" name="video" accept="video/*">
                @if (!empty($product->video))
                    <div class="mt-2">
                        <video src="{{ asset($product->video) }}" width="100%" height="120" controls class="rounded border"></video>
                    </div>
                @endif
            </div>
        </div>

        <!-- YouTube Video Link -->
        <div class="col-md-6">
            <div class="form-group">
                <label class="form-label font-weight-bold">YouTube Video Link</label>
                <input type="text" class="form-control" name="youtube_video" value="{{ old('youtube_video', $product->youtube_video) }}" placeholder="Enter YouTube video link">
            </div>
        </div>

        <!-- Select Company -->
        <div class="col-md-6">
            <div class="form-group">
                <label class="form-label font-weight-bold">Select Company</label>
                <select name="company_id" class="form-control form-select">
                    <option value="1">--Select--</option>
                    @if (isset($companies) && count($companies) > 0)
                        @foreach ($companies as $company)
                            <option value="{{ $company->id }}" {{ $product->company_id ==$company->id ? 'selected' : '' }}>
                                {{ $company->title }}
                            </option>
                        @endforeach
                    @endif
                </select>
            </div>
        </div>

        <!-- Product Specs -->
        <div class="col-md-4">
            <div class="form-group">
                <label class="form-label font-weight-bold">Brand</label>
                <input type="text" class="form-control" name="brand" value="{{ old('brand', $product->brand ?? '') }}" placeholder="Enter Brand">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="form-label font-weight-bold">Model</label>
                <input type="text" class="form-control" name="model" value="{{ old('model', $product->model ?? '') }}" placeholder="Enter Model">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="form-label font-weight-bold">Reg. Year</label>
                <input type="date" class="form-control" name="reg_year" value="{{ old('reg_year', $product->reg_year ?? '') }}" placeholder="Enter Reg. Year">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="form-label font-weight-bold">Mileage</label>
                <input type="text" class="form-control" name="mileage" value="{{ old('mileage', $product->mileage ?? '') }}" placeholder="Enter Mileage">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="form-label font-weight-bold">Engine (CC)</label>
                <input type="text" class="form-control" name="engine" value="{{ old('engine', $product->engine ?? '') }}" placeholder="Enter Engine (CC)">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="form-label font-weight-bold">Transmission</label>
                <input type="text" class="form-control" name="transmission" value="{{ old('transmission', $product->transmission ?? '') }}" placeholder="Enter Transmission">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="form-label font-weight-bold">Fuel Type</label>
                <input type="text" class="form-control" name="fuel_type" value="{{ old('fuel_type', $product->fuel_type ?? '') }}" placeholder="Enter Fuel Type">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="form-label font-weight-bold">Drive Type</label>
                <input type="text" class="form-control" name="drive_type" value="{{ old('drive_type', $product->drive_type ?? '') }}" placeholder="Enter Drive Type">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="form-label font-weight-bold">Wheel</label>
                <input type="text" class="form-control" name="wheel" value="{{ old('wheel', $product->wheel ?? '') }}" placeholder="Enter Wheel">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="form-label font-weight-bold">Exterior</label>
                <input type="text" class="form-control" name="exterior" value="{{ old('exterior', $product->exterior ?? '') }}" placeholder="Enter Exterior">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="form-label font-weight-bold">Body Style</label>
                <input type="text" class="form-control" name="body_style" value="{{ old('body_style', $product->body_style ?? '') }}" placeholder="Enter Body Style">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="form-label font-weight-bold">Price</label>
                <input type="text" class="form-control" name="price" value="{{ old('price', $product->price ?? '') }}" placeholder="Enter Price">
            </div>
        </div>

        <!-- Serial & Status -->
        <div class="col-md-6">
            <div class="form-group">
                <label class="form-label font-weight-bold">Serial</label>
                <input type="text" class="form-control" name="serial" value="{{ old('serial', $product->serial) }}" placeholder="Enter serial">
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label class="form-label font-weight-bold">Status</label>
                <select name="status" class="form-control form-select">
                    <option value="1" {{ $product->status == 1 ? 'selected' : '' }}>Active</option>
                    <option value="2" {{ $product->status == 2 ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>
        </div>

    </div>

    <!-- Submit Section -->
    <div class="mt-4 text-end">
        <a href="{{ route('product.index') }}" class="btn btn-secondary me-2">Cancel</a>
        <button type="submit" id="EditFormSubmitBtn" class="btn btn-primary px-4">Update Product</button>
    </div>
</form>


<!-- Styling for Image Previews -->
<style>
    .modal-content{
            padding: 15px;
    }
    .preview-item {
        position: relative;
        display: inline-block;
        margin: 5px;
    }
    .preview-item img {
        width: 100px;
        height: 100px;
        object-fit: cover;
        border-radius: 6px;
        border: 1px solid #dee2e6;
        box-shadow: 0 2px 4px rgba(0,0,0,0.05);
    }
    .preview-item .remove-btn {
        position: absolute;
        top: -8px;
        right: -8px;
        background: #dc3545;
        color: white;
        border: none;
        border-radius: 50%;
        width: 22px;
        height: 22px;
        font-size: 14px;
        line-height: 20px;
        cursor: pointer;
        text-align: center;
        padding: 0;
        box-shadow: 0 2px 4px rgba(0,0,0,0.2);
    }
    .preview-item .remove-btn:hover {
        background: #bb2d3b;
    }
</style>

<!-- JavaScript for Live Image Upload & Delete Handling -->
<script>
function removeExistingSingleImage() {
    const el = document.getElementById('existingSingleImage');
    if(el) el.remove();
}

function removeExistingGalleryImage(button) {
    button.closest('.preview-item').remove();
}

document.addEventListener('DOMContentLoaded', function() {
    // Single Image Instant Preview
    const singleInput = document.getElementById('singleImageInput');
    if (singleInput) {
        singleInput.addEventListener('change', function(e) {
            const container = document.getElementById('singleImagePreviewContainer');
            const file = e.target.files[0];
            if (!file) return;

            const reader = new FileReader();
            reader.onload = function(event) {
                container.innerHTML = `
                    <div class="preview-item">
                        <img src="${event.target.result}" alt="Single Preview">
                        <button type="button" class="remove-btn">&times;</button>
                    </div>
                `;
                container.querySelector('.remove-btn').addEventListener('click', function() {
                    container.innerHTML = '';
                    singleInput.value = '';
                });
            };
            reader.readAsDataURL(file);
        });
    }

    // Multiple Images Instant Preview & Removal handling
    let newGalleryFiles = new DataTransfer();
    const multipleInput = document.getElementById('multipleImageInput');

    if (multipleInput) {
        multipleInput.addEventListener('change', function(e) {
            const container = document.getElementById('multipleImagePreviewContainer');
            const files = Array.from(e.target.files);

            files.forEach((file) => {
                newGalleryFiles.items.add(file);

                const reader = new FileReader();
                reader.onload = function(event) {
                    const previewItem = document.createElement('div');
                    previewItem.classList.add('preview-item');

                    previewItem.innerHTML = `
                        <img src="${event.target.result}" alt="Gallery Preview">
                        <button type="button" class="remove-btn">&times;</button>
                    `;

                    previewItem.querySelector('.remove-btn').addEventListener('click', function() {
                        previewItem.remove();
                        const updatedDt = new DataTransfer();
                        Array.from(newGalleryFiles.files).forEach((f) => {
                            if (f !== file) updatedDt.items.add(f);
                        });
                        newGalleryFiles = updatedDt;
                        multipleInput.files = newGalleryFiles.files;
                    });

                    container.appendChild(previewItem);
                };
                reader.readAsDataURL(file);
            });

            multipleInput.files = newGalleryFiles.files;
        });
    }
});
</script>
