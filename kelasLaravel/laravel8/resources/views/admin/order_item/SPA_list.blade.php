<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>{{ $titleBread }}</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">{{ str_replace(' ','',$titleBread) }}</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      {{-- Form insert order_item --}}
      <div class="card">
        <div class="card-body">
          {{-- Message success --}}
          <div class="row">
            <div class="col-md-6 message-success">
            </div>
          </div>
          {{-- End Message success --}}
          {{-- Message failed --}}
          <div class="row">
            <div class="col-md-6 message-failed">
            </div>
          </div>
          {{-- End Message failed --}}
          <div class="row">
            <div class="col-md-6">
              <form action="/api/orders/{{ $order->id }}/order_item" method="POST" id="form-order-item">
                  <div class="form-group">
                    <label for="product_id">Product</label>
                    <select class="custom-select product-id" id="product_id" name="product_id" onchange="getStock()" required>
                      <option value="">Choose product ...</option>
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}-{{ $product->stock }}" {{ (old('product_id') == $product->id) ? 'selected' : '' }}>{{ $product->name }}</option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback invalid-product text-md">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="qty" class="d-block">Qty</label>
                      <div class="d-flex justify-content-between" style="margin-top: -8px; margin-bottom: -10px ; width:100px">
                        <p class="min">min : 1</p>
                        <p class="max">max : {{ (old('product_id')) ? explode('-',old('product_id'))[1] : '' }}</p>
                      </div>
                    <small class="empty-stock d-none">Empty stock</small>
                    <input type="number" min="1" class="form-control" id="qty" name="qty" value="{{ old('qty') }}" aria-describedby="qty">
                    <div class="invalid-feedback invalid-qty text-md">
                    </div>
                  </div>
                  <a href="/admin/orders/" class="btn btn-secondary">Back</a>
                  <button type="submit" class="btn btn-primary btn-add">Add</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      {{-- End Form insert order_item --}}

      {{-- Table Order_item --}}
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-md-8 d-flex justify-content-start">
                  <h5>Name Customer : {{ $order->user->name }}</h5>
                </div>
                <div class="col d-flex justify-content-md-end">
                  <p>{{ $order->date_order }}</p>
                </div>
              </div>
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Product</th>
                  <th>Qty</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody id="tbody">
                  @foreach ($order_item as $i => $row)
                  <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $row->product->name }}</td>
                    <td>{{ $row->qty }}</td>
                    <td>
                      <a href="#" data-url_edit="/api/orders/{{ $order->id }}/order_item/{{ $row->id }}/edit" class="edit"><i class="fas fa-edit text-success mr-1 icon-edit" data-url_edit="/api/orders/{{ $order->id }}/order_item/{{ $row->id }}/edit"></i></a>
                      <a href="#" class="delete" data-url_delete="/api/orders/{{ $order->id }}/order_item/{{ $row->id }}"><i class="fas fa-trash text-danger icon-delete" data-url_delete="/api/orders/{{ $order->id }}/order_item/{{ $row->id }}"></i></a>
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
        <!-- /.col -->
      </div>
      {{-- End Table Order_item --}}
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->