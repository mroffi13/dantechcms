@extends('layouts.app', ['title' => 'Form'])


@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Product</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active"><a href="{{ route('products') }}">Products</a></li>
              <li class="breadcrumb-item active">Product</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
              <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-text-width"></i>
                        Detail Product
                    </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <dl>
                        <dt>Product Name</dt>
                        <dd>{{ $product['name'] }}</dd>
                        <dt>Description</dt>
                        <dd>{{ $product['desc'] }}</dd>
                        <dt>Price</dt>
                        <dd>{{ number_format($product['price']) }}</dd>
                        <dt>Stock</dt>
                        <dd>{{ number_format($product['stock']) }}</dd>
                    </dl>
                </div>
                <!-- /.card-body -->
                <a href="{{ route('products') }}" class="btn btn-info btn-sm m-2">Back</a>
              </div>
              <!-- /.card -->
            </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection