@extends('frontend.master')


@section('content')
<div class="content">
    <div class="cart-items">
        <form action="{{ url('/customer/details/for-order')}}" method="post">
            @csrf
            <div class="container" style="padding:15px; border-radius:5px; box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;">
                <div class="row">
                    <div class="col-md-8">
        {{-- Customer Bag information --}}
                        <h2>My Shopping Bag</h2>
                        <div class="cart-header">
                            <table class="table table-bordered">
                                <tr>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Qty</th>
                                    <th>Total Price</th>
                                    <th>Action</th>
                                </tr>

                                @php 
                                    $sum = 0;
                                    $qty = 0;

                                @endphp
                                @foreach ($cartToProducts as $cartProduct)
                                <tr>
                                    <td>{{$loop->index+1}}</td>
                                    <td>{{$cartProduct->product? $cartProduct->product->name:'No product found'}}</td>
                                    <input type="hidden" name="product_id" value="{{$cartProduct->product_id}}">
                                    <input type="hidden" name="vendor_id" value="{{$cartProduct->vendor_id}}">
                                    <td> {{ $cartProduct->price}} </td>
                                    <td>
                                        <form action="{{url('/cart/product/update/'.$cartProduct->id)}}" method="post">
                                            @csrf
                                            <input type="number" name="qty" style="width: 20%" value="{{$totalQty = $cartProduct->qty}}"/>
                                            <button class="btn btn-sm btn-success" name="btn" type="submit">update</button>
                                        </form>
                                    </td>
                                    <td>{{ $totalPrice = $cartProduct->price * $cartProduct->qty}} </td>
                                    <td><a href="{{ url('cart/product/delete/'.$cartProduct->id)}}" class="btn btn-sm btn-danger">Delete</a></td>
                                </tr>
                                    @php 
                                    $sum+= $totalPrice;
                                    $qty+= $totalQty;
                                    @endphp
                                @endforeach

                                <tr>
                                    <td colspan="4" class="fw-bold fs-3">Sub Total</td>
                                    <td colspan="2" class="fw-bold fs-3">{{$sum}}</td>
                                </tr>
                            </table>
                        </div>
                    </div>


                    <div class="col-md-1">

                    </div>

    {{-- Customer billing information --}}
                    <div class="col-md-3" >
                        <h2>My Billing Information</h2>

                        <div>
                            <input type="hidden" name="total_price" value="{{$sum}}">
                            <input type="hidden" name="total_qty" value="{{$qty}}">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" value="{{auth()->check()?auth()->user()->name : old('name')}}" placeholder="Enter Your Customer name">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" name="email" class="form-control" value="{{auth()->check()?auth()->user()->email : old('email')}}" placeholder="Enter Your Customer email">
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" name="phone" class="form-control" value="{{auth()->check()?auth()->user()->phone: old('phone')}}" placeholder="Enter Your Customer phone">
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <textarea name="address" id="address" cols="32" rows="1"  placeholder="Enter your Customer Address">{{auth()->check()?auth()->user()->address : old('address')}}</textarea>
                            </div>
                            <button type="submit" name="btn2" class="btn btn-block btn-primary">Order</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection