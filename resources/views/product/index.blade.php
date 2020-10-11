@extends('layouts.app', ['title' => 'Form'])


@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>List Products</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">List Products</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                @if (session('message'))
                    <div class="alert alert-{{ session('class') }} alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon {{ session('icon') }}"></i>{{ ucwords(session('class')) }}!</h5>
                        {{ session('message') }}
                    </div>
                @endif
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">List Products</h3> 
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                  <table class="table table-hover text-nowrap">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1 ?>
                    @foreach ($products as $product)    
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $product['name'] }}</td>
                            <td>{{ number_format($product['price']) }}</td>
                            <td>{{ number_format($product['stock']) }}</td>
                            <td>
                                <a href="{{ route('products.show', $product['id']) }}" class="btn btn-info btn-sm">Detail</a>
                                <a href="{{route('products.edit', $product['id'])}}" class="btn btn-success btn-sm">Edit</a>
                                <form id="form-delete" action="{{ route('products.destroy', $product['id']) }}" method="POST" onsubmit="goDelete(event, 'product'); return true" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
          </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection