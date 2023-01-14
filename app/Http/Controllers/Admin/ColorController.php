<?php

namespace App\Http\Controllers\Admin;

use App\Models\Color;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ColorController extends Controller
{
   public function colorCreate()
   {
        return view('backend.admin.color.create');
   }


   public function colorStore(Request $request)
   {
       $this->validate($request,[
           'name' =>'required|string',
           'status' => 'required',
       ]);

       $color = new Color();
       $color->name = $request->name;
       $color->status = $request->status;
       $color->save();
       return redirect()->back()->with('success', 'Color has been created');
   }


   public function colorUpdate(Request $request, $id)
   {
        $this->validate($request, [
            'name' =>'required|string',
           'status' => 'required',
        ]);

        $color = Color::find($id);
        $color->name = $request->name;
        $color->status = $request->status;
        $color->save();
        return redirect()->back()->with('success', 'Color has been Updated');


   }


   public function colorMange()
   {
        $colors = Color::paginate(5);
        return view('backend.admin.color.list', compact('colors'));
   }



   public function colorDelete($id)
   {
        $color = Color::find($id);
        $color->delete();
        return redirect()->back()->with('success', 'Color has been deleted');
   }




   public function colorEdit($id)
   {
        $color = Color::find($id);     
        return view('backend.admin.color.edit', compact('color'));
   }


}
