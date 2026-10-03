<!-- Modal -->
<div class="modal fade" id="CreateModalOpen" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="CreateForm" action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">

                @csrf
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add New</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <div class="server_side_error"></div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" class="form-control" name="title" placeholder="Enter title">
                            </div>
                        </div>

                        <!-- <div class="col-md-6">
                            <div class="form-group">
                                <label>Sub Title</label>
                                <input type="text" class="form-control" name="sub_title"
                                    placeholder="Enter sub title">
                            </div>
                        </div> -->

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
                                <label>Select Company</label>
                                <select name="company_id" class="form-control">
                                    <option>--Select--</option>
                                    @if($companies)
                                    @foreach($companies as $company)
                                    <option value="{{ $company->id }}">{{ $company->title }}</option>
                                    @endforeach
                                    @endif
                                    
                                </select>
                            </div>
                        </div>








                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Brand</label>
                                <input type="text" class="form-control" name="brand" placeholder="Enter Brand">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Model</label>
                                <input type="text" class="form-control" name="model" placeholder="Enter Model">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Reg. Year</label>
                                <input type="date" class="form-control" name="reg_year" placeholder="Enter Reg. Year">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Mileage</label>
                                <input type="text" class="form-control" name="mileage" placeholder="Enter Mileage">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Engine (CC)</label>
                                <input type="text" class="form-control" name="engine" placeholder="Enter Engine (CC)">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Transmission</label>
                                <input type="text" class="form-control" name="transmission" placeholder="Enter Transmission">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Fuel Type</label>
                                <input type="text" class="form-control" name="fuel_type" placeholder="Enter Fuel Type">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Drive Type</label>
                                <input type="text" class="form-control" name="drive_type" placeholder="Enter Drive Type">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Wheel</label>
                                <input type="text" class="form-control" name="wheel" placeholder="Enter Wheel">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Exterior </label>
                                <input type="text" class="form-control" name="exterior" placeholder="Enter  Exterior">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Body Style </label>
                                <input type="text" class="form-control" name="body_style" placeholder="Enter Body Style">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Price</label>
                                <input type="text" class="form-control" name="price" placeholder="Enter Price">
                            </div>
                        </div>















                        
                        <div class="col-md-4">
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
