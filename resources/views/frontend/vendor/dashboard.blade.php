@extends('frontend.master')


@section('content')

<div class="container " style="margin: 30px auto; box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
    <h1 class="text-center">Product List</h1>
    <a href="{{url('/vendor/product/create/form')}}" class="btn btn-sm btn-success pull-right" style="margin: -36px 0 0px 00">Add Product</a>
    <table class="table table-hover table-bordered table-striped">
        <thead>
            <tr>
                <th>SL</th>
                <th>Image</th>
                <th>Name</th>
                <th>Category Name</th>
                <th> Price </th>
                <th> Qty </th>
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
                <td> {{$product->category->name}} </td>
                <td>{{$product->price}}</td>
                <td>{{$product->qty}}</td>
                <td>
                    @if ($product->status==0)
                        <span class="btn btn-sm btn-danger">Pending</span>
                    @else   
                    <span class="btn btn-sm btn-success">Approved</span>
                    @endif
                </td>
                <td>
                    <a href="#" class="btn btn-warning btn-sm">Edit</a>
                    <a href="#" class="btn btn-danger btn-sm">Delete</a>
                </td>
              
            </tr>
            @endforeach
            
        </tbody>
    </table>
</div>
    
@endsection