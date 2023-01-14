@extends('backend.master')

@section('content')

<div class="container-fluid">
     <div class="col-md-12">
          <div class="row">
               <div class="col-md-3"></div>
               <div class="col-md-6">
                    @if(session()->has('success'))
                         <div class="alert alert-success">{{ session()->get('success') }}</div>
                    @endif
                    <div class="card">
                         <div class="card-body">
                              <form action="{{ url('/subcategory/update/'.$subcategory->id) }}" method="post">
                                   @csrf
                                   <div class="form-group">
                                        <label for="">Category</label>
                                        <select class="form-control" name="category_id">
                                             <option disabled>Select A Category</option>
                                         @foreach ($categories as $category)
                                             <option  value="{{ $category->id }}" @if($category->id==$subcategory->category_id) selected @endif >{{ $category->name }}</option>
                                         @endforeach
                                             
                                      
                                        </select>
                                   </div>
                                   <div class="form-group">
                                        <label for="">SubCategory</label>
                                        <input type="text" name="name" value=" {{$subcategory->name}} " class="form-control" placeholder="Enter subcategory name">
                                   </div>
                                   <button type="submit" class="btn btn-block btn-success">Upadate</button>

                              </form>
                         </div>
                    </div>
               </div>
               <div class="col-md-3"></div>
          </div>
     </div>
</div>


@endsection