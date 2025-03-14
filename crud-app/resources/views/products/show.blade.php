@extends('layouts.app')
@section('main')

<h5><i class="bi bi-pencil-square"></i> Product Details</h5>
<nav class="my-3">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item active">View Product</li>
    </ol>
</nav>

<div class="card p-3">
    <div class="row g-3 align-items-center">
        <!-- Image on the Left -->
        <div class="col-md-4">
            <img src="/products/{{$products->image}}" alt="Product" class="img-fluid rounded shadow" />
        </div>

        <!-- Content on the Right -->
        <div class="col-md-8">
            <h5 class="fw-bold">{{$products->name}}</h5>
            <p class="text-secondary">{{$products->description}}</p>

            <p class="fw-semibold">
                M.R.P <small class="text-danger text-decoration-line-through">{{$products->mrp}}</small>
            </p>
            <p class="fw-semibold">
                Selling Price <small class="text-success">Rs. {{$products->price}}</small>
            </p>
        </div>
    </div>
</div>

@endsection
