@extends('backend.master')

@section('content')

<div class="container-fluid">
     <div class="row">
          <div class="col-md-1"></div>
          <div class="col-md-10">
               <div class="card">
                    <div class="card-header bg-primary text-center"><h2 class="text-white">Vendor User List</h2></div>
                    <div class="card-body">
                         @if(session()->has('success'))
               <div class="alert alert-danger"> {{session()->get('success') }} </div>
               @endif
               <table class="table table-bordered table-striped">

                   <tr>
                         <th>ID</th>
                         <td>{{$vendor->id}}</td>
                   </tr>
                   <tr>
                         <th>Name</th>
                         <td>{{$vendor->name}}</td>
                   </tr>
                   <tr>
                         <th>Email</th>
                         <td>{{$vendor->email}}</td>
                   </tr>
                   <tr>
                         <th>phone</th>
                         <td>{{$vendor->phone}}</td>
                   </tr>
                   <tr>
                         <th>Address</th>
                         <td>{{$vendor->address}}</td>
                   </tr>
                   <tr>
                         <th>Logo</th>
                         <td><img src="{{asset('/avater/'.$vendor->logo)}}" height="100" width="100" alt=""></td>
                   </tr>
                   <tr>
                         <th>Status</th>
                         <td> 
                              @if ($vendor->is_approved==0)
                                    <span href="#" class="badge badge-danger">Pendding</span>
                              @else
                                    <span href="#" class="badge badge-success">Approved</span>
                         
                               @endif 
                         </td>
                    </tr>
                    
               </table>    
               <a href="{{url('/vendor/manage')}}" class="btn btn-primary btn-sm text-white">Back</a>  
          </div>
          <div class="col-md-1"></div>
     </div>
</div>


@endsection