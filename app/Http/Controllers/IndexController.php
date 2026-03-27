<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use App\Rules\Recaptcha;
use App\Models\PartnersCategory;
use App\Models\ServiceCategory;
use App\Models\GalleryCategory;
use App\Models\JobApplication;
use App\Models\Opportunities;
use App\Models\Aboutpage;
use App\Models\Industry;
use App\Models\Category;
use App\Models\Services;
use App\Models\Whykpca;
use App\Models\Gallery;
use App\Models\Contact;
use App\Models\Enquiry;
use App\Models\Banner;
use App\Models\Spread;
use App\Models\Vision;
use App\Models\Blogs;
use App\Models\Stats;
use App\Models\About;
use App\Models\Story;
use App\Models\Core;
use Mail;
use Log;
use DB;

class IndexController extends Controller
{
    public function index(){
        // $banners = Banner::where('status',1)->get();
        // $blogs = Blogs::orderBy('id','DESC')->where('status',1)->get()->take(4);
        // $stats = Stats::get();
        // $whykpca = Whykpca::get();
        // $about = About::first();
        // $services = ServiceCategory::with('services')->where('status',1)->get();
        // $reports = Industry::orderBy('report_date','DESC')->take(4)->get();
        // $summerProducts = Services::where('season', 'LIKE', '%summer%')->get();
        // $rabiProducts = Services::where('season', 'LIKE', '%rabi%')->get();
        // $kharifProducts = Services::where('season', 'LIKE', '%kharif%')->get();
        $meta_title = 'Auto Dynamic Technologies & Solutions';   
        return view('index',compact('meta_title'));
    }

    public function contact(Request $request){
        if ($request->isMethod('post')) {

            $validatedData = $request->validate([
                'name'    => 'required|regex:/^[a-zA-Z ]+$/',
                'email'   => 'required|email',
                'phone'   => 'required|digits:10',
                'service' => 'required|string|max:255',
                'comment' => 'required|string',
                'g-recaptcha-response' => 'required',
            ], [
                'name.required'  => 'Name is required.',
                'name.regex'     => 'Name must contain only letters and spaces.',
                'email.required' => 'Email is required.',
                'email.email'    => 'Please enter a valid email address.',
                'phone.required' => 'Phone number is required.',
                'phone.digits'   => 'Phone number must be exactly 10 digits.',
                'service.required' => 'Please select a service.',
                'comment.required' => 'Message is required.',
                'g-recaptcha-response.required' => 'Captcha verification is required.',
            ]);

            $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
                'secret'   => '6Lc-G5orAAAAABINJ6u9YJTt3_Ctklg8hztTGKj_', 
                'response' => $request->input('g-recaptcha-response'),
                'remoteip' => $request->ip(),
            ]);

            $recaptchaData = $response->json();

            if (!isset($recaptchaData['success']) || $recaptchaData['success'] != true) {
                return redirect()->back()
                    ->withErrors(['captcha' => 'reCAPTCHA verification failed. Please try again.'])
                    ->withInput();
            }

            DB::table('enquiry')->insert([
                'name'    => $validatedData['name'],
                'email'   => $validatedData['email'],
                'phone'   => $validatedData['phone'],
                'service' => $validatedData['service'],
                'comment' => $validatedData['comment'],
            ]);

            $to = "goascubasafaris@gmail.com";
            $subject1 = "New enquiry/feedback from website";
            $message = "Hello, you have received a new enquiry/feedback on the website from " . $validatedData['name'] . ".<br><br>";
            $message .= "<table border='1' cellpadding='5' cellspacing='0'>
                <tr><td><strong>Name</strong></td><td>{$validatedData['name']}</td></tr>
                <tr><td><strong>Email Id</strong></td><td>{$validatedData['email']}</td></tr>
                <tr><td><strong>Phone Number</strong></td><td>{$validatedData['phone']}</td></tr>
                <tr><td><strong>Adventure Activity</strong></td><td>{$validatedData['service']}</td></tr>
                <tr><td><strong>Message</strong></td><td>{$validatedData['comment']}</td></tr>
            </table>";

            $headers  = "From: Deep Dive Goa <noreply@deepdivegoa.com>\r\n";
            $headers .= "Reply-To: noreply@deepdivegoa.com\r\n";
            $headers .= "CC: goascubasafaris@gmail.com\r\n";
            $headers .= "BCC: sankalp@ycstech.in\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-type: text/html; charset=UTF-8\r\n";

            mail($to, $subject1, $message, $headers);

            return redirect()->back()->with('success', 'Form submitted successfully.');
        }

        $meta_title = 'Contact Deep Dive Goa | Book Scuba Diving & Tour Packages';   
        $meta_keywords = 'contact Deep Dive Goa, book scuba diving Goa, book Goa tour, book Dudhsagar trip, party cruise booking Goa, Deep Dive Goa contact';
        return view('contact', compact('meta_title','meta_keywords'));
    }

    public function distributor(Request $request) {
        if ($request->isMethod('post')) {
            $data = $request->all();
            Log::info($data);

            $gstFile = null;
            if ($request->hasFile('gst')) {
                $file = $request->file('gst');
                $gstFile = time() . '-' . $file->getClientOriginalName();
                $destinationPath = public_path('assets/distributor/');
                $file->move($destinationPath, $gstFile);
            }

            $panFile = null;
            if ($request->hasFile('pan')) {
                $file = $request->file('pan');
                $panFile = time() . '-' . $file->getClientOriginalName();
                $destinationPath = public_path('assets/distributor/');
                $file->move($destinationPath, $panFile);
            }

            DB::table('distributor')->insert([
                'name' => $data['name'],
                'farm' => $data['farm'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'address' => $data['address'],
                'pincode' => $data['pincode'],
                'business_type' => $data['business_type'],
                'GST' => $gstFile,
                'PAN Card' => $panFile,
            ]);

            // Admin Email ID (Change this to the admin's email)
            $adminEmail = "sankalp@ycstech.in";  

            // Email Subject
            $subject = "New Distributor Enquiry from {$data['name']}";

            // Email Content
            $emailData = [
                'name' => $data['name'],
                'farm' => $data['farm'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'address' => $data['address'],
                'pincode' => $data['pincode'],
                'business_type' => $data['business_type'],
                'gstFile' => $gstFile ? asset('assets/distributor/' . $gstFile) : null,
                'panFile' => $panFile ? asset('assets/distributor/' . $panFile) : null,
            ];

            // Send Email Using Laravel Mail
            Mail::send('emails.distributor_enquiry', $emailData, function ($message) use ($adminEmail, $subject) {
                $message->to($adminEmail)->subject($subject);
            });

            // WhatsApp Message Content
            $whatsappMessage = "📌 *New Distributor Enquiry*\n\n";
            $whatsappMessage .= "👤 *Name:* {$data['name']}\n";
            $whatsappMessage .= "🏢 *Firm:* {$data['farm']}\n";
            $whatsappMessage .= "📧 *Email:* {$data['email']}\n";
            $whatsappMessage .= "📞 *Phone:* {$data['phone']}\n";
            $whatsappMessage .= "📍 *Address:* {$data['address']}\n";
            $whatsappMessage .= "📮 *Pincode:* {$data['pincode']}\n";
            $whatsappMessage .= "🏭 *Business Type:* {$data['business_type']}\n";

            if ($gstFile) {
                $whatsappMessage .= "📝 *GST File:* " . asset('assets/distributor/' . $gstFile) . "\n";
            }
            if ($panFile) {
                $whatsappMessage .= "📝 *PAN File:* " . asset('assets/distributor/' . $panFile) . "\n";
            }

            // Send WhatsApp Message
            $this->sendWhatsAppMessage("+919404371723", $whatsappMessage);

            return redirect()->back()->with('success_message', 'Form submitted successfully.');
        }

        $meta_title = 'Distributor | ' . config('app.name');
        return view('distributor', compact('meta_title'));
    }

    private function sendWhatsAppMessage($phoneNumber, $message) {
        $apiKey = "your-api-key-here"; 
        $encodedMessage = urlencode($message);

        $url = "https://api.callmebot.com/whatsapp.php?phone=$phoneNumber&text=$encodedMessage&apikey=$apiKey";

        $response = file_get_contents($url);

        Log::info("WhatsApp Message Sent: " . $response);
    }

    public function about(Request $request){
        $meta_title = 'About Us | '. config('app.name');
        return view('about',compact('meta_title'));
    }

    public function capdetails(Request $request){
        $meta_title = 'Capabilities Details | '. config('app.name');
        return view('capabilities_details',compact('meta_title'));
    }

    public function privacypolicy(Request $request){
        $meta_title = 'Privacy Policy | '. config('app.name');
        return view('privacy_policy',compact('meta_title'));
    }

    public function productsPage(Request $request){
        // $partners = PartnersCategory::with(['partners' => function ($query) {
        //     $query->where('status', 1);
        // }])->where('status',1)->get();
        $meta_title = 'Products | '. config('app.name');
        return view('products',compact('meta_title'));
    }

    public function showSubcategories($id){
        $mainCategory = Category::findOrFail($id);
        $subCategories = Category::where('parent_id', $id)->get();
        return view('subcategory-listing', compact('mainCategory', 'subCategories'));
    }

    public function subcategoryListing($subcategory_id){
        $subcategory = \App\Models\Category::find($subcategory_id);

        // Check if the subcategory exists
        if ($subcategory) {
            // Fetch products for the subcategory
            $products = \App\Models\Services::where('category_id', $subcategory_id)->get();
        } else {
            // Fetch products for the main category if no subcategory exists
            $products = \App\Models\Services::where('category_id', $mainCategory_id)->get();
        }
        
        $subCategoriesLevel1 = Category::where('parent_id', $subcategory_id)->where('level', 1)->get();

        $meta_title = 'Product Listing | ' . config('app.name');

        return view('product_listing', compact('subcategory', 'products','meta_title','subCategoriesLevel1'));
    }

    public function productDetails($id, $title=null){
        $Product = Services::select('services.*','category.id as category_id','category.title')
            ->join('category','services.category_id','category.id')
            ->where('services.id',$id)
            ->first();
        //dd($detail);
        return view('product_detail')->with(compact('Product'));
    }

    public function gallery(Request $request, $id=null){
        // $category = GalleryCategory::where('status',1)->orderBy('active','DESC')->get();
        // $photos = Gallery::select('gallery.*','gallery_category.name','gallery_category.id as category_id')
        //         ->leftJoin('gallery_category','gallery_category.id','gallery.cat_id')
        //         ->orderBy('gallery.id','DESC');
        // if($request->id){
        //     $photos = $photos->where('gallery.cat_id',$request->id);
        //     $activeTab = GalleryCategory::where('id',$request->id)->first(); 
        //     $activeId = $activeTab->id;
        // }else{
        //     $activeTab = GalleryCategory::where('active',1)->first(); 
        //     $photos = $photos->where('gallery.cat_id',$activeTab->id);
        //     $activeId = $activeTab->id;
        // }
        // $photos = $photos->paginate(8);
        $meta_title = 'Deep Dive Goa Gallery | Scuba Diving & Goa Adventure Moments';   
        $meta_keywords = 'Goa scuba photos, diving gallery Goa, Goa adventure pictures, water sports images Goa, Deep Dive Goa gallery';
        return view('gallery',compact('meta_title','meta_keywords'));
    }

    public function blogsListing(Request $request){
        // $blogs = Blogs::where('status',1)->orderBy('date','DESC')->paginate(9);
        $meta_title = 'Blogs | '. config('app.name');
        return view('blog_listing',compact('meta_title'));
    }

    public function blogDetail(Request $request, $id=null){
        $blog = Blogs::find($id);
        $meta_title = 'Blogs';
        return view('blog_detail',compact('meta_title','blog'));
    }

    public function career(Request $request){
        $opportunities = Opportunities::select('id','designation_name','job_description','location')->where('status',1)->orderBy('id','DESC')->paginate(8);
        $meta_title = 'Career at '. config('app.name');
        return view('career',compact('meta_title','opportunities'));
    }

    public function submitJobApp(Request $request)
    {
        if($request->isMethod('post')){
            
            $data = $request->all();
            Log::info($data);

            $resumeFile = null;
            if ($request->hasFile('resume')) {
                $file = $request->file('resume');
                $resumeFile = time() . '-' . $file->getClientOriginalName();
                $destinationPath = public_path('assets/applications/');
                $file->move($destinationPath, $resumeFile);
            }

            DB::table('job_applications')->insert([
                'name' => $data['name'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'comment' => $data['comment'],
                'resume' => $resumeFile,
            ]);

            $to = "sankalp@ycstech.in";
            $subject = "New Job Application from Website";
            $message = "Hello, you have received a new job application on the website from " . $data['name'] . ".\r\n";
            $message .= "<table border='1'>
                <tr><td><strong>Name</strong></td><td>{$data['name']}</td></tr>
                <tr><td><strong>Email Id</strong></td><td>{$data['email']}</td></tr>
                <tr><td><strong>Phone Number</strong></td><td>{$data['phone']}</td></tr>
                <tr><td><strong>Message</strong></td><td>{$data['comment']}</td></tr>
            </table>";

            if ($resumeFile) {
                $message .= "<p>Resume: <a href='" . asset('assets/applications/' . $resumeFile) . "'>Download Resume</a></p>";
            }

            $headers = "From: sankalp@ycstech.in\r\n";
            $headers .= "Reply-To: sankalp@ycstech.in\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";

            mail($to, $subject, $message, $headers);

            return redirect()->back()->with('success_message', 'Form submitted successfully.');
        }

        $meta_title = 'Submit Job Application | ' . config('app.name');
        return view('submit-job-app', compact('meta_title'));
    }

    public function jobDetails(Request $request, $id){
        $job = Opportunities::find($id);
        $meta_title = $job->designation_name .' | Careers';
        return view('job_detail',compact('meta_title','job'));
    }

    public function serviceDetailPage(Request $request, $id){
        $service = Service::select('services.*','service_categories.name')
            ->leftJoin('service_categories','service_categories.id','services.service_cat_id')
            ->where('services.id',$id)
            ->first();

        $meta_title = $service->title.' | '. config('app.name');
        return view('services.service_detail',compact('meta_title','service'));
    }
    
}