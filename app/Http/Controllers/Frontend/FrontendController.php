<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Auth;
use Hash;
use Helper;
use App\Models\User;
use App\Models\Slider;
use App\Models\Company;
use App\Models\Product;
use App\Models\Partner;
use App\Models\Portfolio;
use App\Models\Sustainability;
use App\Models\Careerpage;
use App\Models\JobCircular;
use Yajra\DataTables\DataTables;
use App\Models\Blog;
use App\Models\Project;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\JobApplied;
use App\Models\LeadingAndGovernor;

use Intervention\Image\Laravel\Facades\Image;
use Illuminate\Support\Str;


class FrontendController extends Controller
{
    public function home()
    {
        $companies = Company::where('status', 1)->orderBy('serial', 'asc')->get();
        return view('frontend.pages.home', compact('companies'));
    }
    public function about()
    {
        $about = About::where('id', 1)->first();
        $partners = Partner::where('status', 1)
            ->orderBy('serial', 'asc')
            ->get()
            ->chunk(6);
        return view('frontend.pages.about', compact('about', 'partners'));
    }

    public function singleCompany($slug)
    {
        $company = Company::where('slug', $slug)->first();
        $portfolios = Portfolio::where('status', 1)->orderBy('serial', 'asc')->where('slier_for', $company->id)->get();
        $projects = Project::where('status', 1)->orderBy('serial', 'asc')->where('slier_for', $company->id)->get();
        $slider = Slider::where('slier_for', $company->id)->first();
        $products = Product::where('company_id', $company->id)->where('status', 1)->get();
        
        return view('frontend.pages.companySingle', compact('slider', 'company', 'portfolios', 'projects', 'products'));
    }


    public function singleProduct($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        
        // Decode stored JSON string into a PHP array
        $images = is_string($product->images) ? json_decode($product->images, true) : ($product->images ?? []);

        $company = Company::where('id', $product->company_id)->first();
        $slider = Slider::where('slier_for', $company->id ?? null)->first();
        $products = Product::where('company_id', $company->id ?? null)->where('status', 1)->get();

        // Pass $product and $images to the view
        return view('frontend.pages.productSingle', compact('product', 'images', 'company', 'products', 'slider'));
    }



    

    public function companies()
    {
        $companies = Company::where('status', 1)->orderBy('serial', 'asc')->get();
        foreach ($companies as $company) {
            $slider = Slider::where('slier_for', $company->id)->select('slier_for', 'id', 'company_logo', 'image')->first();
            $company->company_logo = $slider?->company_logo;
        }


        return view('frontend.pages.companies', compact('companies'));
    }




    public function news()
    {
        $news = Blog::where('status', 1)->orderBy('serial', 'asc')->get();
        foreach ($news as $new) {
            $user = User::where('id', $new->created_by)->first();
            $new->created_by = $user?->username;
        }

        return view('frontend.pages.blog', compact('news'));
    }

    public function singleNews($slug)
    {
        $news = Blog::where('status', 1)->orderBy('updated_at', 'desc')->limit(4)->get();

        $single = Blog::where('slug', $slug)->first();
        $user = User::where('id', $single->created_by)->first();
        $single->created_by = $user?->username;

        return view('frontend.pages.blogSingle', compact('news', 'single'));
    }
    public function contact()
    {
        return view('frontend.pages.contact');
    }

    public function contactsubmit(Request $request)
    {
        request()->validate(
            [
                'name'    => 'required',
                'email'   => 'required',
                'phone'   => 'required',
                'subject' => 'required',
                'message' => 'required',
            ],
            [
                'name.required'     => 'Name field is required.',
                'email.required'    => 'Email field is required.',
                'subject.required'  => 'Subject field is required.',
            ]
        );
        $data['name']    = $request->name;
        $data['subject']    = $request->subject;
        $data['email']   = $request->email;
        $data['phone']   =  $request->phone;
        $data['message'] = $request->message;
        $data['status'] = 1;
        $inserted = DB::table('contact')->insert($data);

        if ($inserted) {
            return back()->with('success', 'Message sent successfully.');
        } else {
            return back()->with('error', 'Something went wrong. Please try again.');
        }
    }
    public function sustainability()
    {
        $sustainability = Sustainability::where('id', 1)->first();
        return view('frontend.pages.sustainability', compact('sustainability'));
    }
    public function careers()
    {
        $career = Careerpage::where('id', 1)->first();
        $circulars = JobCircular::where('status', 1)->get();
        return view('frontend.pages.career', compact('circulars', 'career'));
    }

    public function careerSingle($slug)
    {
        $positions = JobCircular::where('status', 1)->select('id', 'job_slug', 'job_title')->get();
        $career = Careerpage::where('id', 1)->first();
        $singlecircular = JobCircular::where('job_slug', $slug)->first();
        return view('frontend.pages.careerSingle', compact('singlecircular', 'career', 'positions'));
    }

    protected function fileUpload($request, $file_name, $folder)
    {
        if (!$request->hasFile($file_name)) {
            return null;
        }

        $file = $request->file($file_name);
        $extension = strtolower($file->getClientOriginalExtension());
        $filename = uniqid() . '_' . time() . '.' . $extension;

        if (!file_exists(public_path($folder))) {
            mkdir(public_path($folder), 0777, true);
        }

        $full_path = public_path($folder . $filename);

        $image_extensions = ['jpg', 'jpeg', 'png', 'webp', 'gif'];
        $video_extensions = ['mp4', 'mov', 'avi', 'webm', 'mkv'];
        $document_extensions = ['pdf', 'doc', 'docx'];

        if (in_array($extension, $image_extensions)) {

            // Image upload
            Image::read($file)->save($full_path);
        } elseif (in_array($extension, $video_extensions)) {

            // Video upload
            $file->move(public_path($folder), $filename);
        } elseif (in_array($extension, $document_extensions)) {

            // Document upload
            $file->move(public_path($folder), $filename);
        } else {
            return null; // unsupported file type
        }

        return $folder . $filename;
    }
    public function careerSubmit(Request $request)
    {
        // Validate normally (auto redirects back with errors)
        $validated = $request->validate([
            'name'         => 'required',
            'email'        => 'required|email',
            'phone'        => 'required',
            'job_id'       => 'required|integer',
            'cover_later'  => 'required',
            'cv'           => 'required|mimes:pdf,doc,docx|max:102400',
        ]);

        // Upload CV
        if ($request->hasFile('cv')) {
            $validated['cv'] = $this->fileUpload($request, 'cv', '/uploads/careerapply/');
        }

        // Save
        JobApplied::create($validated);

        return redirect()->back()->with('success', 'Job applied successfully!');
    }
}
