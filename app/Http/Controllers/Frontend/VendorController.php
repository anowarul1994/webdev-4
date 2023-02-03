<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Color;
use App\Models\Vendor;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Support\Facades\Session;


class VendorController extends Controller
{

    //frontend start
    public function vendorRegistration()
    {
        return view('frontend.vendor.auth.registration');
    }

    public function vendorLoginform()
    {
        return view('frontend.vendor.auth.login');
    }

    public function vendorStore(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|email|unique:vendors',
            'phone' => 'required',
            'address' => 'required',
            'logo' => 'required',
            'password' => 'required',

        ]);

        
        if($request->file('logo')){
            $name= time().'.'.$request->logo->extension();
            $request->logo->move(public_path('/avater/'), $name);
        }

        $vendor = New Vendor();
        $vendor->name = $request->name;
        $vendor->email = $request->email;
        $vendor->phone = $request->phone;
        $vendor->address = $request->address;
        $vendor->password = bcrypt($request->password) ;
        $vendor->logo = $name ;
        $vendor->save();

        return redirect()->back()->with('success', 'Vendor user Registration has been done.');
    }

    public function vendorlogin(Request $request)
    {

        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required',

        ]);


        $vendor = Vendor::where('email', $request->email)->first();
     
        if(!$vendor){
            return redirect()->back()->with('error', 'Email not match.');
        }else{
            if($vendor->is_approved == 0){
                return redirect()->back()->with('error','You are not a Approved Vendor.');
            }else{
                if(password_verify($request->password, $vendor->password)){
                Session::put('vendorId', $vendor->id);
                Session::put('vendorName', $vendor->name);
                return redirect('/vendor/dashboard');
                }else{
                return redirect()->back()->with('error', 'Password not match.');
                }
            }
        }

        
    }

    public function vendorDashboard()
    {
         $products = Product::with('category', 'color', 'size')->where('vendor_id', session()->get('vendorId'))->get();
         return view('frontend.vendor.dashboard', compact('products'));
    }


    public function vendorProductCreate()
    {
        return view('frontend.vendor.create');
    }


    public function vendorProductCreateform()
    {
        $categories = Category::get();
        $colors = Color::get();
        $sizes = Size::get();
        return view('frontend.vendor.create', compact('categories','colors','sizes'));
    }

    public function vendorProductstore(Request $request)
    {

        $this->validate($request,[
            'category_id' => 'required',
            'color_id' => 'required',
            'size_id' => 'required',
            'name' => 'required',
            'price' => 'required',
            'qty' => 'required',
            'image' => 'required',
            'multi_image' => 'required',

        ]);

        if($request->file('image')){
            $name = time(). '.' .$request->image->extension();
            $request->image->move(public_path( '/product/'),$name);
        }

        $product = new Product();
        $product->category_id = $request->category_id;
        $product->vendor_id = session()->get("vendorId");
        $product->color_id = $request->color_id;
        $product->size_id = $request->size_id;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->qty = $request->qty;
        $product->type = $request->type;
        $product->image = $name ;


        if($request->hasFile('multi_image')){
            foreach($request->file('multi_image') as $images){
                $imagesName = rand(999, 9999). '.' .$images->extension();
                $images->move(public_path('/gallary/'),$imagesName);
                $data[] = $imagesName;
            }
        }

        $product->multi_image = json_encode($data);
        $product->save();

        return redirect()->back()->with('success', 'Product Add Successfully.');

    }

    public function vendorLogOut()
    {
        session()->flush();
        return redirect('/')->with('success', 'You are logout.');
    }


//backend code start
    

    

}
