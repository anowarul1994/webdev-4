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
                              <th>Name</th>
                              <th>Image</th>
                              <th>Action</th>
                         </tr>
                    </thead>
                    <tbody>
                         @foreach($categories as $category) 
                         <tr class="align-item-center text-center">
                              <td>{{ $loop->index+1}}</td>
                              <td> {{ $category->name }} </td>
                              <td>
                                   <img src="{{ asset('/category/'.$category->image) }}" height="60" width="60" alt="">
                              </td>
                              <td>
                                   <a href=" {{url('/category/edit/'.$category->id)}} " class="btn btn-sm btn-info">Edit</a>
                                   <a href="{{ url('/category/delete/'.$category->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure')">Delete</a>
                              </td>
                         
                         </tr>
                         @endforeach
                    </tbody>

               </table>
               {{-- {{ $categories->links() }} --}}
          </div>
          <div class="col-md-1"></div>

     </div>
     
</div>


@endsection