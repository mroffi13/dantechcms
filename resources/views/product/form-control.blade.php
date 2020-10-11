<div class="row">
    <div class="col-md-6">
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" name="name" class="form-control" id="name" placeholder="Enter product name..." value="{{ $product['name'] ?? old('name') }}">
          @error('name')
            <small class="text-danger">{{ $message }}</small>
          @enderror
        </div>
        <div class="form-group">
          <label>Description</label>
          <textarea class="form-control" name="desc" rows="3" placeholder="Enter description ...">{{  $product['desc'] ?? old('desc') }}</textarea>
          @error('desc')
            <small class="text-danger">{{ $message }}</small>
          @enderror
        </div>
    </div>
    <!-- /.col -->
    <div class="col-md-6">
      <div class="form-group">
        <label for="price">Price</label>
        <input type="number" class="form-control" name="price" id="price" placeholder="Enter product price ..." value="{{ $product['price'] ?? old('price') }}">
        @error('price')
            <small class="text-danger">{{ $message }}</small>
        @enderror
      </div>
      <div class="form-group">
        <label for="stock">Stock</label>
        <input type="number" class="form-control" name="stock" id="stock" placeholder="Enter product price ..." value="{{ $product['stock'] ?? old('stock') }}">
        @error('stock')
            <small class="text-danger">{{ $message }}</small>
        @enderror
      </div>
      <button type="submit" class="btn btn-primary float-right">{{$button ?? 'Create'}}</button>
    </div>
    <!-- /.col -->
  </div>