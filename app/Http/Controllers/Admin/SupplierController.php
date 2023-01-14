<?php

namespace App\Http\Controllers\Admin;

use App\Models\Vendor;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class SupplierController extends Controller
{
    public function vendorManage()
    {
        $vendors= Vendor::orderBy('created_at', 'desc')->paginate(5);
        return view('backend.admin.vendor.list', compact('vendors'));
    }


    public function vendorEdit($id)
    {
        $vendor = Vendor:: find($id);
        return view('backend.admin.vendor.edit', compact('vendor'));
    }    

    public function vendorShow($id)
    {
        $vendor= Vendor::find($id);
        return view('backend.admin.vendor.show', compact('vendor'));
    }

    public function vendorDelete($id)
    {
        $deleteVendor= Vendor::find($id);

        if($deleteVendor){
            $path = public_path("/avater/".$deleteVendor->logo);
            if(File::exists($path)){
                File::delete($path);
                
            }
        }

        $deleteVendor->delete();
        return redirect()->back()->with('error', 'Vendor has been deleted');
    }

    
    public function vendorUpdate(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'phone' => 'required',
            'address' => 'required',

          

        ]);;

        $vendor = Vendor::find($id);

        if(isset($request->logo)){
            if($vendor->logo && file_exists('/avater/'.$vendor->logo)){
                unlink('avater/'.$vendor->logo);
            }
            $updatelogo = time().'.'. $request->logo->extension();
            $request->logo->move(public_path('/avater/'), $updatelogo);
            $vendor->logo = $updatelogo;
        }

        $vendor->name = $request->name;
        $vendor->phone = $request->phone;
        $vendor->address = $request->address;
        $vendor->is_approved = $request->is_approved;
        $vendor->save();
        return redirect('/vendor/manage')->with('success','Vendor has been updated');
    }    



    public function vendorProducts()
    {
       $products = Product::with('category', 'color', 'size', 'vendor')->paginate(10);
        return view('backend.admin.vendor.products', compact('products'));
    }

    public function vendorApproved($id)
    {
        $product = Product::find($id);
        $product->status=0;
        $product->save();
        return redirect()->back()->with('success', 'Product has been approved');
    }

    public function vendorPending($id)
    {
        $product = Product::find($id);
        $product->status=1;
        $product->save();
        return redirect()->back()->with('success', 'Product has been approved');
    }
}
