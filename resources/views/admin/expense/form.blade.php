<div class="form-group">
    <label for="product">Product Name</label>
    <input type="text" name="name" value="{{$data->name?$data->name:old('name')}}" class="form-control" id="product">
  </div>
  <div class="form-group">
    <label for="price">Price</label>
    <input type="number" name="price" value="{{$data->price?$data->price:old('price')}}" class="form-control" id="price">
  </div>
  <div class="form-group">
    <label for="price">Curchase Date</label>
    <input type="date" name="transection_date" value="{{$data->transection_date?$data->transection_date:old('transection_date')}}" class="form-control" id="price">
  </div>