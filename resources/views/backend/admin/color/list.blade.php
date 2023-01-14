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
                              <th>Color Name</th>
                              <th>Status</th>
                              
                              <th>Action</th>
                         </tr>
                    </thead>
                    <tbody>
                         @foreach($colors as $color) 
                         <tr class="align-item-center text-center">
                              <td>{{ $loop->index+1}}</td>
                              <td> {{ $color->name }} </td>
                              <td>
                                   @if ($color->status==1)
                                   <a href="#" class="btn btn-success btn-sm">Active</a>
                                   @else
                                   <a href="#" class="btn btn-warning btn-sm">Inactive</a>
                                   
                                   @endif 
                              </td>
                              <td>
                                   <a href=" {{url('/color/edit/'.$color->id)}} " class="btn btn-sm btn-info">Edit</a>
                                   <a href="{{ url('/color/delete/'.$color->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure')">Delete</a>
                              </td>
                         
                         </tr>

                     @endforeach
                    </tbody>
               </table>
               {{ $colors->links() }}
          </div>
          
          <div class="col-md-1"></div>

     </div>
     
</div>


@endsection