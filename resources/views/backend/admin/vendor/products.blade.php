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
                              <th>Image</th>
                              <th>Product Name</th>
                              <th>Vendor Name</th>
                              <th>Price</th>
                              <th>Qty</th>
                              <th>Status</th>
                              <th>Action</th>
                         </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                        <tr>
                            <td> {{$loop->index+1}} </td>
                            <td> 
                                <img src=" {{ asset('/product/'.$product->image)}} " height="50" width="50" class="m-0" alt="product logo">
                            </td>
                            <td> {{$product->name}} </td>
                            <td> {{$product->vendor->name}} </td>
                            <td>{{$product->price}}</td>
                            <td>{{$product->qty}}</td>
                            <td>
                                @if ($product->status==0)
                                    <span class="badge badge-danger">Pending</span>
                                @else   
                                <span class="badge badge-success">Approved</span>
                                @endif
                            </td>
                            <td>
                                @if ($product->status==1)
                                <a href=" {{ url('/vendor/aprroved/'.$product->id) }} " class="btn btn-danger btn-sm">Pendding</a>
                                @else   
                                <a href="{{ url('/vendor/pending/'.$product->id) }}" class="btn btn-success btn-sm">Approved</a>
                                @endif
                                <a href="#" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                          
                        </tr>
                        @endforeach
                    </tbody>
               </table>
               {{ $products->links() }}
          </div>
          


     </div>
     
</div>


@endsection