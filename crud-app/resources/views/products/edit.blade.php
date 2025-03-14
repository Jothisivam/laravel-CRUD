@extends('layouts.app')
@section('main')
<div class="container mt-2">
    <div class="row my-3">
        <div class="border-bottom">
            <h5><i class="bi bi-journal-richtext"></i>Exicting Product Updation</h5>
        </div>
        <nav aria-label="breadcrumb" class="mt-2">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/index">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Products</li>
            </ol>
        </nav>
        <div class="col-lg-8">
            <form action="/products/update/{{$products->id}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="name">Name :</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Enter email" value="{{old('name', $products->name)}}">
                            @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="mrp">M.R.P :</label>
                            <input type="text" class="form-control @error('mrp') is-invalid @enderror" name="mrp" id="mrp" placeholder="Enter M.R.P" value="{{old('mrp', $products->mrp)}}">
                            @error('mrp')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="sellingPrice">Selling Price :</label>
                            <input type="text" class="form-control @error('price') is-invalid @enderror" name="price" id="price" placeholder="Enter Price" value="{{old('price', $products->price)}}">
                            @error('price')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Description :</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" placeholder="Enter description">{{old('description', $products->description)}}</textarea>
                            @error('description')
                            <div class="invalid-feedback">                                                      {{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="custom-file">
                        <label for="exampleInputEmail1">Product Image :</label>
                        <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-dark btn-md" id="btnsubmit">Update Product</button>
                    <button type="reset" class="btn btn-danger btn-md" id="btnreset">Clear All</button>
                </div>
            </form>
        </div>
    </div>


    </html>
    @endsection