@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @include('admin.aside')
            <div class="col-md-8">
                <form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row form-group mb-3">

                        <label for="name">Nombre del producto</label>
                        <input type="text" name="name" class="form-control" placeholder="Nombre" required
                            value="{{ $product->name }}">
                        @error('name')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="row form-group mb-3">

                        <label for="price">Precio</label>
                        <input type="text" name="price" class="form-control" placeholder="Precio" required
                            autocomplete="off" min="0" value="{{ $product->price }}">
                        @error('price')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="row form-group  mb-3">

                        <label for="stock">Stock</label>
                        <input type="number" name="stock" class="form-control" placeholder="Stock" required
                            autocomplete="off" min="0"
                            onkeypress="return (event.charCode >= 48 && event.charCode <= 57)"
                            value="{{ $product->stock }}">
                        @error('stock')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-sm-6">
                        <button type="submit" class="btn btn-primary ml-3">Guardar</button>
                    </div>
            </div>
            </form>
        </div>
    </div>
    </div>
@endsection
