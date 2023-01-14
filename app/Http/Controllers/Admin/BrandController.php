<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Brand;

use Illuminate\Http\Request;


class BrandController extends Controller
{
    public function brandCreate()
    {
        $categories =  Category::get();
        return view('backend.admin.brand.create', compact('categories'));
    }



    public function brandMange()
    {
        $brands = Brand::with('category')->paginate(5);
        return view('backend.admin.brand.list', compact('brands'));
    }




    public function brandStore(Request $request)
    {
        $this->validate($request,[
            'category_id' =>'required|integer',
            'name' => 'required|string',
        ]);

        $brand = new Brand();
        $brand->category_id = $request->category_id;
        $brand->name = $request->name;
        $brand->slug = str_replace(' ','_',strtolower($request->name));
        $brand->save();
        return redirect()->back()->with('success', 'Brand has been created');
    }





    public function brandUpdate(Request $request, $id)
    {
        $this->validate($request,[
            
            'name' => 'required|string',
        ]);

        $brand = Brand::find($id);
        $brand->category_id = $request->category_id;
        $brand->name = $request->name;
        $brand->slug = str_replace(' ','_',strtolower($request->name));
        $brand->save();
        return redirect()->back()->with('success', 'Brand has been Updated');
    }



    public function brandDelete($id)
    {
        $brandDelete = Brand:: find($id);
        $brandDelete->delete();
        return redirect()->back()->with('success', 'Brand has been deleted');
    }




    public function brandEdit($id)
    {
        $categories= Category::get();
        $brand= Brand::find($id);
        return view('backend.admin.brand.edit', compact('brand', 'categories'));


    }
}
