@extends('backend.master')

@section('content')

<div class="container-fluid">
     <div class="row">
          <div class="col-md-1"></div>
          <div class="col-md-10">
               @if(session()->has('success'))
               <div class="alert alert-danger"> {{session()->get('success') }} </div>
               @endif
               <table class="table table-bordered table-striped">
                    <thead class="table table-dark text-center">
                         <tr>
                              <th>SL</th>
                              <th>Category Name</th>
                              <th>Brand Name</th>
                              
                              <th>Action</th></thead>
                         </tr>
                    @foreach($brands as $brand) 
                         <tr class="align-item-center text-center">
                              <td>{{ $loop->index+1}}</td>
                              <td> {{ $brand->category->name }} </td>
                              <td>
                                   {{ $brand->name }} 
                              </td>
                              <td>
                                   <a href=" {{url('/brand/edit/'.$brand->id)}} " class="btn btn-sm btn-info">Edit</a>
                                   <a href="{{ url('/brand/delete/'.$brand->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure')">Delete</a>
                              </td>
                         
                         </tr>

                    @endforeach
                    
               </table>
               {{ $brands->links() }}
          </div>
          
          <div class="col-md-1"></div>

     </div>
     
</div>


@endsection