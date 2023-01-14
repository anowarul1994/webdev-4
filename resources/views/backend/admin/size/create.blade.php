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
                              <form action="{{ url('/size/store') }}" method="post">
                                   @csrf
                                   <div class="form-group">
                                        <label for="name">Size Name</label>
                                        <input type="text" name="name" class="form-control" placeholder="Enter Size name">
                                   </div>
                                   <div class="form-group">
                                        <label for="">Status</label>
                                        <select class="form-control" name="status">
                                             <option disabled selected>Select A Status</option>
                                             <option value="1">Active</option>
                                             <option value="0">Inactive</option>

                                        </select>
                                   </div>
                                   <button type="submit" class="btn btn-block btn-success">Create</button>

                              </form>
                         </div>
                    </div>
               </div>
               <div class="col-md-3"></div>
          </div>
     </div>
</div>


@endsection