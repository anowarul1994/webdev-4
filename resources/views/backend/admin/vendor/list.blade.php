@extends('backend.master')

@section('content')

<div class="container-fluid">
     <div class="row">
          
          <div class="col-md-12">
               @if(session()->has('success'))
               <div class="alert alert-danger"> {{session()->get('success') }} </div>
               @endif
               <table class="table table-bordered table-striped">
                    <thead class="table table-dark text-center">
                         <tr>
                              <th>SL</th>
                              <th>Name</th>
                              <th>Email</th>
                              <th>Phone</th>
                              <th>Status</th>
                              <th>Action</th>
                         </tr>
                    </thead>
                    <tbody>
                         @foreach($vendors as $vendor) 
                         <tr class="align-item-center text-center">
                              <td>{{ $loop->index+1}}</td>
                              <td> {{ $vendor->name }} </td>
                              <td> {{ $vendor->email }} </td>
                              <td> {{ $vendor->phone }} </td>
                              <td>
                                   @if ($vendor->is_approved==0)
                                        <span href="#" class="badge badge-danger">Pendding</span>
                                   @else
                                        <span href="#" class="badge badge-success">Approved</span>
                                   
                                   @endif 
                              </td>
                              <td>
                                   <a href=" {{url('/vendor/show/'.$vendor->id)}} " class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></a>
                                   <a href=" {{url('/vendor/edit/'.$vendor->id)}} " class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a>
                                   <a href="{{ url('/vendor/delete/'.$vendor->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure')"><i class="fas fa-trash"></i></a>
                              </td>
                         
                         </tr>

                     @endforeach
                    </tbody>
               </table>
               {{ $vendors->links() }}
          </div>
          


     </div>
     
</div>


@endsection