@extends('frontend.master')


@section('content')

<div class="container " >
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6" style="border-radius:10px; padding:30px; margin: 30px auto; box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
            <h1 class="text-center">Product Create</h1>
        <a href="{{url('/vendor/dashboard')}}" class="btn btn-sm btn-success pull-right" style="margin: -36px 0 0px 00">Product List</a>
        <form action=" {{url('vendor/product/store')}} " method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="">Category</label>
                <select class="form-control" name="category_id" id=""> 
                    <option disabled selected >Select A Category</option>
                    @foreach ($categories as $category)
                        <option value=" {{$category->id}} "> {{$category->name}} </option>
                    @endforeach
                    
                </select>
            </div>
            <div class="form-group">
                <label for="">Color</label>
                <select class="form-control" name="color_id" id=""> 
                    <option disabled selected>Select A Color</option>
                    @foreach ($colors as $color)
                    <option value=" {{$color->id}} "> {{$color->name}} </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">Size</label>
                <select class="form-control" name="size_id" id=""> 
                    <option disabled selected >Select A Size</option>
                    @foreach ($sizes as $size)
                    <option value=" {{$size->id}} "> {{$size->name}} </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Enter your name">
            </div>
            <div class="form-group">
                <label for="">Price</label>
                <input type="text" name="price" value="{{ old('price') }}" class="form-control" placeholder="Enter your price">
            </div>
            <div class="form-group">
                <label for="">Qty</label>
                <input type="text" min="1" name="qty" value="{{ old('qty') }}" class="form-control" placeholder="Enter your qty">
            </div>
            <div class="form-group">
                <label for="">Image</label>
                <input type="file" name="image" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Gallery Image</label>
                <input type="file" name="multi_image[]" multiple class="form-control">
            </div>
            <button type="submit" class="btn btn-success btn-sm">Submit</button>
        </form>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>
    
    
@endsection