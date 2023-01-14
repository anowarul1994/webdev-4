<?php

namespace App\Http\Controllers\Admin;

use App\Models\Size;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SizeController extends Controller
{
    
    public function sizeCreate()
   {
        return view('backend.admin.size.create');
   }

   

   public function sizeStore(Request $request)
   {
       $this->validate($request,[
           'name' =>'required|string',
           'status' => 'required',
       ]);

       $size = new Size();
       $size->name = $request->name;
       $size->status = $request->status;
       $size->save();
       return redirect()->back()->with('success', 'Size has been created');
   }


   public function sizeUpdate(Request $request, $id)
   {
        $this->validate($request, [
            'name' =>'required|string',
           'status' => 'required',
        ]);

        $size = Size::find($id);
        $size->name = $request->name;
        $size->status = $request->status;
        $size->save();
        return redirect()->back()->with('success', 'Size has been Updated');


   }


   public function sizeMange()
   {
        $sizes = Size::paginate(5);
        return view('backend.admin.size.list', compact('sizes'));
   }



   public function sizeDelete($id)
   {
        $size = Size::find($id);
        $size->delete();
        return redirect()->back()->with('success', 'Size has been deleted');
   }




   public function sizeEdit($id)
   {
        $size = Size::find($id);     
        return view('backend.admin.size.edit', compact('size',));
   }

}
