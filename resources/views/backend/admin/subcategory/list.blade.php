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
                              <th>Name</th>
                              
                              <th>Action</th></thead>
                         </tr>
                    @foreach($subcategories as $subcategory) 
                         <tr class="align-item-center text-center">
                              <td>{{ $loop->index+1}}</td>
                              <td> {{ $subcategory->category->name }} </td>
                              <td>
                                   {{ $subcategory->name }} 
                              </td>
                              <td>
                                   <a href=" {{url('/subcategory/edit/'.$subcategory->id)}} " class="btn btn-sm btn-info">Edit</a>
                                   <a href="{{ url('/subcategory/delete/'.$subcategory->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure')">Delete</a>
                              </td>
                         
                         </tr>

                    @endforeach
                    
               </table>
               {{ $subcategories->links() }}
          </div>
          
          <div class="col-md-1"></div>

     </div>
     
</div>


@endsection