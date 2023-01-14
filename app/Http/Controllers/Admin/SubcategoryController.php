<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;


class SubcategoryController extends Controller
{
    public function subcategoryCreate()
    {
        $categories =  Category::get();
        return view('backend.admin.subcategory.create', compact('categories'));
    }



    public function subcategoryMange()
    {
        $subcategories = Subcategory::with('category')->paginate(5);
        return view('backend.admin.subcategory.list', compact('subcategories'));
    }




    public function subcategoryStore(Request $request)
    {
        $this->validate($request,[
            'category_id' =>'required|integer',
            'name' => 'required|string',
        ]);

        $subcategory = new Subcategory();
        $subcategory->category_id = $request->category_id;
        $subcategory->name = $request->name;
        $subcategory->slug = str_replace(' ','_',strtolower($request->name));
        $subcategory->save();
        return redirect()->back()->with('success', 'Subcategory has been created');
    }





    public function subcategoryUpdate(Request $request, $id)
    {
        $this->validate($request,[
            
            'name' => 'required|string',
        ]);

        $subcategory = Subcategory::find($id);

        $subcategory->name = $request->name;
        $subcategory->slug = str_replace(' ','_',strtolower($request->name));
        $subcategory->save();
        return redirect()->back()->with('success', 'Subcategory has been Updated');
    }



    public function subcategoryDelete($id)
    {
       $subcategoryDelete = Subcategory:: find($id);
        $subcategoryDelete->delete();
        return redirect()->back()->with('success', 'Subcategory has been deleted');
    }




    public function subcategoryEdit($id)
    {
        $categories= Category::get();
        $subcategory= Subcategory::find($id);
        return view('backend.admin.subcategory.edit', compact('subcategory', 'categories'));


    }
}
