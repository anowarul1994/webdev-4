<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class FrontendController extends Controller
{
    public function index()
    {
      $new_products = Product::with('category', 'color', 'size', 'vendor')->where('type', 'new')->where('status', 1)->get();
      $hot_products = Product::with('category', 'color', 'size', 'vendor')->where('type', 'hot')->where('status', 1)->get();
      $discount_products = Product::with('category', 'color', 'size', 'vendor')->where('type', 'discount')->where('status', 1)->get();
      return view('frontend.home.index', compact('new_products', 'hot_products', 'discount_products'));
    }


    //user controller 
    public function userRegister()
    {
      return view('frontend.user.registration');
    }


    public function userLoginForm()
    {
      return view('frontend.user.login');
    }

    public function userLogin(Request $request)
    {
      
      $this->validate($request,[
        'email' => 'required|email',
        'password' => 'required',

    ]);


    $user = User::where('email', $request->email)->first();
 
    if(!$user){
        return redirect()->back()->with('error', 'Email not match.');
    }else{
        if(password_verify($request->password, $user->password)){
        Session::put('userId', $user->id);
        Session::put('userName', $user->name);
        return 'Working pending';
        }else{
        return redirect()->back()->with('error', 'Password not match.');
        }
        }
    }



    public function userStore(Request $request)
    {

      $this->validate($request,[
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'phone' => 'required',
        'address' => 'required',
        'password' => 'required',
      ]);

      $user = new User();
      $user->name = $request->name;
      $user->email = $request->email;
      $user->phone = $request->phone;
      $user->address = $request->address;
      $user->password = bcrypt($request->password);
      $user->save();
      return redirect()->back()->with('success', 'User Add Successfully.');
    }

}
