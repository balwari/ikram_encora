@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <h3 style="text-align:center;">Products</h3>
</div>
<table class="table table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Price</th>
            <th>Category</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $key => $product)
        <tr>
            <th>{{ $products->firstItem() + $key }}</th>
            <td>{{ $product->name }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->category }}</td>
            <td>
                <div class="btn-group btn-group-sm" role="group" aria-label="Option">
                    <button type="button" class="btn btn-info" onClick="location.href='{{ route('updateproduct', ['id'=>$product->id]) }}'">
                        Update
                    </button>
                    <button type="button" class="btn btn-danger" onClick="location.href='{{ route('delete', ['id'=>$product->id]) }}'">
                        Delete
                    </button>
                </div>
            </td>
        </tr>
        @endforeach

    </tbody>
</table>
<div class="container">
@if(session()->has('message'))
                <div class="alert alert-success alert-dismissible fade show">
                {{ session()->get('message') }}
                </div>
                @endif
                @if(session()->has('err'))
                <div class="alert alert-danger">
                {{ session()->get('err') }}
                </div>
                @endif
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">

                <div class="panel-body">

                    <form class="form-horizontal" method="POST" action="{{route('create')}}">
                        <div class="row">

                            <div class="col-md-4">
                                <input type="text" class="form-control" name="name" minlength="2" placeholder="Product Name" required autofocus>
                            
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                            <div class="col-md-4">
                                <input type="number" class="form-control" name="price"  min="1" placeholder="Product Price" required>
                            
                                @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                            <div class="col-md-4">
                                <select name="category" id="category" class="form-control">
                                    <option value="Mobiles" selected>Mobiles</option>
                                    <option value="Laptops">Laptops</option>
                                    <option value="Desktops">Desktops</option>
                                    <option value="Earphones">Earphones</option>
                                </select>

                                @error('category')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mt-3" style="text-align:center;"><input type="submit" class="btn btn-success" value="Add New"></div>

                        {{ $products->links() }}
                        {{ csrf_field() }}

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection