@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>Update</h3>
                </div>

                <div class="panel-body">
                    <form class="form-horizontal" method="get" action="{{ route('update', ['id'=>$product->id]) }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Name</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" placeholder="Product Name" value="{{ $product->name }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="price" class="col-md-4 control-label">Price</label>
                            <div class="col-md-6">
                                <input type="number" class="form-control" name="price" placeholder="Product Price" value="{{ $product->price }}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="category" class="col-md-4 control-label">Category</label>
                            <div class="col-md-6">
                                <select name="category" id="category">
                                    @if ($product->category == 'Mobiles')
                                    <option value="Mobiles" selected>Mobiles</option>
                                    @else
                                    <option value="Mobiles">Mobiles</option>
                                    @endif
                                    @if ($product->category == 'Laptops')
                                    <option value="Laptops" selected>Laptops</option>
                                    @else
                                    <option value="Laptops">Laptops</option>
                                    @endif
                                    @if ($product->category == 'Desktops')
                                    <option value="Desktops" selected>Desktops</option>
                                    @else
                                    <option value="Desktops">Desktops</option>
                                    @endif
                                    @if ($product->category == 'Earphones')
                                    <option value="Earphones" selected>Earphones</option>
                                    @else
                                    <option value="Earphones">Earphones</option>
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection