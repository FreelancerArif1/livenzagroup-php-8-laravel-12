<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Hash;
use Helper;
use App\Models\User;
use App\Models\Servicecategory;
use Yajra\DataTables\DataTables;
use App\Models\LeadingAndGovernor;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Laravel\Facades\Image;
use Illuminate\Support\Str;

class ServicecategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $servicecategories = Servicecategory::where('status', 1)->orderBy('serial', 'asc')->get();
        return view('backend.pages.servicecategory.index', compact('servicecategories'));
    }
    public function list(Request $request)
    {
        $data = Servicecategory::query();
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
            ->addColumn('action', function ($row) {
                $btn = '';
                if (Helper::hasRight('user.edit')) {
                    $btn = $btn . '<a title="Edit this item." data-url="/admin/servicecategory/' . $row->id . '/edit" class="edit_modal_show btn btn-sm btn-primary "><i class="fa-solid fa-pencil"></i></a>';
                }

                if (Helper::hasRight('user.delete')) {
                    $btn = $btn . '<a title="Delete this item." class="ml-2 deleteBtn btn btn-sm btn-danger ms-1" data-url="/admin/servicecategory/' . $row->id . '"><i class="fa fa-trash" aria-hidden="true"></i></a>';
                }
                return $btn;
            })
            ->rawColumns(['image', 'status', 'action'])->make(true);
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
    public function store(Request $request)
    {
        $validator = $this->Validation($request);
        if ($validator->fails()) {
            return response()->json([
                'type' => 'error',
                'errors' => $validator->errors(),
            ], 422);
        }
        $data = $request->except(['video', 'image', '_token']);
        if ($request->hasFile('image')) {
            $data['image'] = $this->fileUpload($request, 'image', '/uploads/servicecategory/');
        }
        if ($request->hasFile('video')) {
            $data['video'] = $this->fileUpload($request, 'video', '/uploads/servicecategory/');
        }
        $data['slug'] = Str::slug($request->title);
        $servicecategory = Servicecategory::create($data);
        return response()->json([
            'type' => 'success',
            'return' => $servicecategory,
            'status' => 1,
            'message' => 'Servicecategory added Successfully !',
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // return view('backend.servicecategory.edit');
        echo 'ddd';
        exit;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $servicecategory = Servicecategory::find($id);
        $servicecategories = Servicecategory::where('status', 1)->orderBy('serial', 'asc')->get();
        return view('backend.pages.servicecategory.edit', ['servicecategory' => $servicecategory, 'servicecategories' => $servicecategories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = $this->Validation($request);

        if ($validator->fails()) {
            return response()->json([
                'type' => 'error',
                'errors' => $validator->errors(),
            ], 422);
        }

        // Find the servicecategory
        $servicecategory = Servicecategory::findOrFail($id);

        // Prepare data
        $data = $request->except(['video', 'image']);

        if ($request->hasFile('image')) {
            if ($servicecategory->image && File::exists(public_path($servicecategory->image))) {
                File::delete(public_path($servicecategory->image));
            }
            $data['image'] = $this->fileUpload($request, 'image', '/uploads/servicecategory/');
        }

        if ($request->hasFile('video')) {
            $data['video'] = $this->fileUpload($request, 'video', '/uploads/servicecategory/');
        }
        $data['slug'] = Str::slug($request->title);
        // Update the servicecategory
        $servicecategory->update($data);

        return response()->json([
            'type' => 'success',
            'return' => $servicecategory,
            'status' => 1,
            'message' => 'Servicecategory updated successfully!',
        ], 200);
    }


    public function destroy(string $id)
    {
        $servicecategory = Servicecategory::findOrFail($id);
        if ($servicecategory) {
            if ($servicecategory->image && File::exists(public_path($servicecategory->image))) {
                File::delete(public_path($servicecategory->image));
            }
            if ($servicecategory->video && File::exists(public_path($servicecategory->video))) {
                File::delete(public_path($servicecategory->video));
            }
            $servicecategory->delete();

            return response()->json([
                'type' => 'success',
                'status' => 1,
                'message' => 'Servicecategory deleted successfully!',
            ], 200);
        } else {
            return response()->json([
                'type' => 'error',
                'status' => 0,
                'message' => 'Servicecategory not found',
            ], 200);
        }
    }
    protected function Validation($request)
    {
        return Validator::make($request->except(['_token', '_method']), [
            'title'          => 'required|string|max:255',
            'description'    => 'nullable|string',
            'button_link'    => 'nullable|url',
            'video' => 'nullable|mimes:mp4,mov,avi,webm,mkv|max:200000',
            'image' => 'nullable|mimes:jpg,jpeg,png,webp|max:2048',
            'youtube_video'  => 'nullable|url',
            'serial'         => 'required|integer',
        ]);
        return $validator;
    }
    protected function fileUpload($request, $file_name, $folder)
    {
        if (!$request->hasFile($file_name)) {
            return null;
        }

        $file = $request->file($file_name);
        $extension = strtolower($file->getClientOriginalExtension());

        // UNIQUE filename (super safe)
        $filename = uniqid() . '_' . time() . '.' . $extension;

        // Make folder if not exists
        if (!file_exists(public_path($folder))) {
            mkdir(public_path($folder), 0777, true);
        }

        $full_path = public_path($folder . $filename);

        // Check if image
        $image_extensions = ['jpg', 'jpeg', 'png', 'webp', 'gif'];
        // Check if video
        $video_extensions = ['mp4', 'mov', 'avi', 'webm', 'mkv'];

        if (in_array($extension, $image_extensions)) {
            // image processing
            Image::read($file)
                // ->resize(800, 800)
                ->save($full_path);
        } elseif (in_array($extension, $video_extensions)) {
            // store video normally
            $file->move(public_path($folder), $filename);
        } else {
            return null; // unsupported file
        }

        return $folder . $filename;  // return path
    }
}
