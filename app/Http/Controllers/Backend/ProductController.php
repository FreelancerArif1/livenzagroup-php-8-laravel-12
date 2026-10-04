<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Hash;
use Helper;
use App\Models\User;
use App\Models\Company;
use App\Models\Product;
use Yajra\DataTables\DataTables;
use App\Models\LeadingAndGovernor;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Laravel\Facades\Image;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::where('status', 1)->get();
  
        return view('backend.pages.product.index', compact('companies'));
    }
    public function list(Request $request)
    {
        $data = Product::query();
        $data->orderBy('serial', 'asc');
        return Datatables::of($data)
            ->editColumn('image', function ($row) {
                return '<img width="70" height="auto" src="' . $row->image . '">';
            })
            ->editColumn('status', function ($row) {
                if ($row->status == 1) {
                    return 'Active';
                } else {
                    return 'Inactive';
                }
            })
            ->editColumn('company', function ($row) {
                if ($row->company_id) {
                    $company = Company::where('id', $row->company_id)->first();
                    return $company? $company->title : '';
                } else {
                    return '';
                }
            })

            
            ->addColumn('action', function ($row) {
                $btn = '';
                if (Helper::hasRight('user.edit')) {
                    $btn = $btn . '<a title="Edit this item." data-url="/admin/product/' . $row->id . '/edit" class="edit_modal_show btn btn-sm btn-primary "><i class="fa-solid fa-pencil"></i></a>';
                }

                if (Helper::hasRight('user.delete')) {
                    $btn = $btn . '<a title="Delete this item." class="ml-2 deleteBtn btn btn-sm btn-danger ms-1" data-url="/admin/product/' . $row->id . '"><i class="fa fa-trash" aria-hidden="true"></i></a>';
                }
                return $btn;
            })
            ->rawColumns(['image', 'status', 'action', 'company'])->make(true);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */


    // public function store(Request $request)
    // {
    //     $validator = $this->Validation($request);
    //     if ($validator->fails()) {
    //         return response()->json([
    //             'type' => 'error',
    //             'errors' => $validator->errors(),
    //         ], 422);
    //     }
    //     $data = $request->except(['video', 'image', 'company_logo']);
    //     if ($request->hasFile('image')) {
    //         $data['image'] = $this->fileUpload($request, 'image', '/uploads/product/');
    //     }
    //     if ($request->hasFile('company_logo')) {
    //         $data['company_logo'] = $this->fileUpload($request, 'company_logo', '/uploads/product/');
    //     }
    //     if ($request->hasFile('video')) {
    //         $data['video'] = $this->fileUpload($request, 'video', '/uploads/product/');
    //     }
    //     $data['slug'] = Str::slug($request->title);
    //     $product = Product::create($data);
    //     return response()->json([
    //         'type' => 'success',
    //         'return' => $product,
    //         'status' => 1,
    //         'message' => 'Product added Successfully !',
    //     ], 200);
    // }

    public function store(Request $request)
    {
        $validator = $this->Validation($request);
        if ($validator->fails()) {
            return response()->json([
                'type'   => 'error',
                'errors' => $validator->errors(),
            ], 422);
        }

        // 1. Exclude file inputs from raw array
        $data = $request->except(['video', 'image', 'images', 'company_logo']);

        // 2. Single image upload (FIX: Pass $request->file('image'))
        if ($request->hasFile('image')) {
            $data['image'] = $this->fileUpload($request->file('image'), '/uploads/product/');
        }

        // 3. Other single files
        if ($request->hasFile('company_logo')) {
            $data['company_logo'] = $this->fileUpload($request->file('company_logo'), '/uploads/product/');
        }
        if ($request->hasFile('video')) {
            $data['video'] = $this->fileUpload($request->file('video'), '/uploads/product/');
        }

        // 4. Multiple images upload
        $imagePaths = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $imagePaths[] = $this->fileUpload($file, '/uploads/product/');
            }
        }
        $data['images'] = json_encode($imagePaths);

        $data['slug'] = Str::slug($request->title);
        $product = Product::create($data);

        return response()->json([
            'type'    => 'success',
            'return'  => $product,
            'status'  => 1,
            'message' => 'Product added Successfully !',
        ], 200);
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // return view('backend.product.edit');
        echo 'ddd';
        exit;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::find($id);
        $companies = Company::where('status', 1)->get();
        return view('backend.pages.product.edit', ['product' => $product, 'companies' => $companies]);
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, string $id)
    // {
    //     $validator = $this->Validation($request);

    //     if ($validator->fails()) {
    //         return response()->json([
    //             'type' => 'error',
    //             'errors' => $validator->errors(),
    //         ], 422);
    //     }

    //     // Find the product
    //     $product = Product::findOrFail($id);

    //     // Prepare data
    //     $data = $request->except(['video', 'image', 'company_logo']);

    //     if ($request->hasFile('image')) {
    //         if ($product->image && File::exists(public_path($product->image))) {
    //             File::delete(public_path($product->image));
    //         }
    //         $data['image'] = $this->fileUpload($request, 'image', '/uploads/product/');
    //     }
    //     if ($request->hasFile('company_logo')) {
    //         if ($product->company_logo && File::exists(public_path($product->company_logo))) {
    //             File::delete(public_path($product->company_logo));
    //         }
    //         $data['company_logo'] = $this->fileUpload($request, 'company_logo', '/uploads/product/');
    //     }

    //     if ($request->hasFile('video')) {
    //         $data['video'] = $this->fileUpload($request, 'video', '/uploads/product/');
    //     }
    //     $data['slug'] = Str::slug($request->title);
    //     // Update the product
    //     $product->update($data);

    //     return response()->json([
    //         'type' => 'success',
    //         'return' => $product,
    //         'status' => 1,
    //         'message' => 'Product updated successfully!',
    //     ], 200);
    // }

public function update(Request $request, string $id)
{
    $validator = $this->Validation($request);

    if ($validator->fails()) {
        return response()->json([
            'type'   => 'error',
            'errors' => $validator->errors(),
        ], 422);
    }

    $product = Product::findOrFail($id);
    $data = $request->except(['video', 'image', 'images', 'old_image', 'old_images', 'company_logo']);

    // --- 1. SINGLE IMAGE UPDATE ---
    if ($request->hasFile('image')) {
        // Delete previous file if replacing with a new one
        if ($product->image && File::exists(public_path($product->image))) {
            File::delete(public_path($product->image));
        }
        $data['image'] = $this->fileUpload($request->file('image'), '/uploads/product/');
    } else {
        // If user removed the existing single image without uploading a new one
        if (!$request->has('old_image')) {
            if ($product->image && File::exists(public_path($product->image))) {
                File::delete(public_path($product->image));
            }
            $data['image'] = null;
        }
    }

    // --- 2. MULTIPLE GALLERY IMAGES UPDATE ---
    $keptOldImages = $request->input('old_images', []);
    $currentDBImages = is_string($product->images) ? json_decode($product->images, true) : ($product->images ?? []);

    // Unlink old files that were removed by user in edit view
    if (is_array($currentDBImages)) {
        foreach ($currentDBImages as $oldImgPath) {
            if (!in_array($oldImgPath, $keptOldImages)) {
                if (File::exists(public_path($oldImgPath))) {
                    File::delete(public_path($oldImgPath));
                }
            }
        }
    }

    // Process new uploaded gallery images
    $newUploadedImages = [];
    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $file) {
            $uploadedPath = $this->fileUpload($file, '/uploads/product/');
            if ($uploadedPath) {
                $newUploadedImages[] = $uploadedPath;
            }
        }
    }

    // Merge retained existing images with new uploads
    $finalGallery = array_merge($keptOldImages, $newUploadedImages);
    $data['images'] = json_encode(array_values($finalGallery));

    // --- 3. OTHER FILES ---
    if ($request->hasFile('company_logo')) {
        if ($product->company_logo && File::exists(public_path($product->company_logo))) {
            File::delete(public_path($product->company_logo));
        }
        $data['company_logo'] = $this->fileUpload($request->file('company_logo'), '/uploads/product/');
    }

    if ($request->hasFile('video')) {
        if ($product->video && File::exists(public_path($product->video))) {
            File::delete(public_path($product->video));
        }
        $data['video'] = $this->fileUpload($request->file('video'), '/uploads/product/');
    }

    $data['slug'] = Str::slug($request->title);
    $product->update($data);

    return response()->json([
        'type'    => 'success',
        'return'  => $product,
        'status'  => 1,
        'message' => 'Product updated successfully!',
    ], 200);
}

    protected function Validation($request)
    {
        return Validator::make($request->except(['_token', '_method']), [
            'title'          => 'required|string|max:255',
            'description'    => 'nullable|string',
            'button_link'    => 'nullable|url',
            'video' => 'nullable|mimes:mp4,mov,avi,webm,mkv|max:200000',
            'image'        => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048', // Single image rule
            'images'       => 'nullable|array',
            'images.*'     => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'youtube_video'  => 'nullable|url',
            'price'      => 'required',
            'company_id'      => 'required',
            'serial'         => 'required|integer',
        ]);
        return $validator;
    }
    // protected function fileUpload($request, $file_name, $folder)
    // {
    //     if (!$request->hasFile($file_name)) {
    //         return null;
    //     }

    //     $file = $request->file($file_name);
    //     $extension = strtolower($file->getClientOriginalExtension());

    //     // UNIQUE filename (super safe)
    //     $filename = uniqid() . '_' . time() . '.' . $extension;

    //     // Make folder if not exists
    //     if (!file_exists(public_path($folder))) {
    //         mkdir(public_path($folder), 0777, true);
    //     }

    //     $full_path = public_path($folder . $filename);

    //     // Check if image
    //     $image_extensions = ['jpg', 'jpeg', 'png', 'webp', 'gif'];
    //     // Check if video
    //     $video_extensions = ['mp4', 'mov', 'avi', 'webm', 'mkv'];

    //     if (in_array($extension, $image_extensions)) {
    //         // image processing
    //         Image::read($file)
    //             // ->resize(800, 800)
    //             ->save($full_path);
    //     } elseif (in_array($extension, $video_extensions)) {
    //         // store video normally
    //         $file->move(public_path($folder), $filename);
    //     } else {
    //         return null; // unsupported file
    //     }

    //     return $folder . $filename;  // return path
    // }

    protected function fileUpload($file, $folder)
    {
        if (!$file || !$file->isValid()) {
            return null;
        }

        $extension = strtolower($file->getClientOriginalExtension());

        // Unique filename
        $filename = uniqid() . '_' . time() . '.' . $extension;

        // Ensure directory exists
        if (!file_exists(public_path($folder))) {
            mkdir(public_path($folder), 0777, true);
        }

        $full_path = public_path($folder . $filename);

        $image_extensions = ['jpg', 'jpeg', 'png', 'webp', 'gif'];
        $video_extensions = ['mp4', 'mov', 'avi', 'webm', 'mkv'];

        if (in_array($extension, $image_extensions)) {
            // Image processing (Intervention Image v3 syntax)
            Image::read($file)
                // ->resize(800, 800)
                ->save($full_path);
        } elseif (in_array($extension, $video_extensions)) {
            $file->move(public_path($folder), $filename);
        } else {
            return null;
        }

        return $folder . $filename;
    }


    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        if ($product) {
            if ($product->image && File::exists(public_path($product->image))) {
                File::delete(public_path($product->image));
            }
            if ($product->video && File::exists(public_path($product->video))) {
                File::delete(public_path($product->video));
            }
            $product->delete();

            return response()->json([
                'type' => 'success',
                'status' => 1,
                'message' => 'Product deleted successfully!',
            ], 200);
        } else {
            return response()->json([
                'type' => 'error',
                'status' => 0,
                'message' => 'Product not found',
            ], 200);
        }
    }
}
