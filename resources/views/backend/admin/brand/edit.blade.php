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
                              <form action="{{ url('/brand/update/'.$brand->id) }}" method="post">
                                   @csrf
                                   <div class="form-group">
                                        <label for="">Category</label>
                                        <select class="form-control" name="category_id">
                                             <option disabled>Select A Category</option>
                                         @foreach ($categories as $category)
                                             <option  value="{{ $category->id }}" @if($category->id==$brand->category->id) selected @endif >{{ $category->name }}</option>
                                         @endforeach
                                             
                                      
                                        </select>
                                   </div>
                                   <div class="form-group">
                                        <label for="">Brand</label>
                                        <input type="text" name="name" value=" {{$brand->name}} " class="form-control" placeholder="Enter subcategory name">
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