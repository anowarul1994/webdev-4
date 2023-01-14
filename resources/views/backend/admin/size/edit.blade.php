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
                              <form action="{{ url('/size/update/'.$size->id) }}" method="post">
                                   @csrf
                                   <div class="form-group">
                                        <div class="form-group">
                                             <label for="">Size Name</label>
                                             <input type="text" name="name" value=" {{$size->name}} " class="form-control" placeholder="Enter subcategory name">
                                        </div>
                                        <label for="">Status</label>
                                        <select class="form-control" name="status">
                                             <option disabled>Select A Status</option>
                                             <option value=" {{1}}" @if($size->status==1) Selected @endif>  Active</option>
                                             <option value=" {{0}} " @if($size->status==0) Selected @endif>Inactive</option>
                                        </select>
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