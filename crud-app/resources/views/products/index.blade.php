@extends('layouts.app')
@section('main')
<div class="d-flex justify-content-between">
                <h5><i class="bi bi-journal-richtext"></i> Product details</h5>
                <a href="products/create" class="btn btn-primary"><i class="bi bi-patch-plus"></i> New Products</a>
            </div>
            <div class="col-lg-12 table-responsive mt-4">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>S.No</th>
                            <th>Image</th>
                            <th>Product Name</th>
                            <th>M.R.P</th>
                            <th>Selling Price</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td><img src="products/{{$product->image}}" style="width: 50px; height: 50px; object-fit: 50px;" alt="about"></td>
                            <td><a href="products/show/{{$product->id}}">{{$product->name}}</a></td>
                            <td>{{$product->mrp}}</td>
                            <td>{{$product->price}}</td>
                            <td class="d-flex justify-content-center"><a href="products/edit/{{$product->id}}" class="btn btn-dark btn-sm mx-1"><i class="bi bi-pencil-square"></i></a><a href=""  data-bs-toggle="modal" data-bs-target="#verticalycentered" class="btn btn-danger btn-sm mx-1"><i class="bi bi-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="modal fade" id="verticalycentered" tabindex="-1" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Product Deletion</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-danger">Are you sure want to delete this ?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <a href="products/delete/{{$product->id}}" class="btn btn-danger">Delete</a>
                    </div>
                  </div>
                </div>
              </div>
@endsection