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
                              <th>Size Name</th>
                              <th>Status</th>
                              
                              <th>Action</th>
                         </tr>
                    </thead>
                    <tbody>
                         @foreach($sizes as $size) 
                         <tr class="align-item-center text-center">
                              <td>{{ $loop->index+1}}</td>
                              <td> {{ $size->name }} </td>
                              <td>
                                   @if ($size->status==1)
                                   <a href="#" class="btn btn-success btn-sm">Active</a>
                                   @else
                                   <a href="#" class="btn btn-warning btn-sm">Inactive</a>
                                   
                                   @endif 
                              </td>
                              <td>
                                   <a href=" {{url('/size/edit/'.$size->id)}} " class="btn btn-sm btn-info">Edit</a>
                                   <a href="{{ url('/size/delete/'.$size->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure')">Delete</a>
                              </td>
                         
                         </tr>

                     @endforeach
                    </tbody>
               </table>
               {{ $sizes->links() }}
          </div>
          
          <div class="col-md-1"></div>

     </div>
     
</div>


@endsection