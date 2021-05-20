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
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              {{-- Message --}}
              <div class="row">
                  <div class="col-md-6 message-failed">
                  </div>
              </div>
              {{-- End Message --}}
              {{-- Form Insert --}}
              <div class="row">
                  <div class="col-md-6">
                    <form action="/api/orders/{{ $order_id }}/order_item/{{ $row->id }}" method="POST" id="form-edit-order-item">
                        @method('patch')
                        <div class="form-group">
                          <label for="product_id">Product</label>
                          <input type="text" class="form-control" value="{{ $row->product->name }}" readonly>
                        </div>
                        <div class="form-group">
                          <label for="qty">Qty</label>
                          <div class="d-flex justify-content-between" style="margin-top: -8px; margin-bottom: -10px ; width:100px">
                            <p class="min">min : 1</p>
                            <p class="max">max : {{ $row->product->stock }}</p>
                          </div>
                          <input type="number" min="1" class="form-control" id="qty" name="qty" value="{{ old('qty',$row->qty) }}" aria-describedby="qty">
                          <div class="invalid-feedback invalid-qty text-md">
                          </div>
                        </div>
                        <a href="#" data-url_back="/api/orders/{{ $order_id }}/order_item/list" class="btn btn-secondary btn-back">Back</a>
                        <button type="submit" data-url_back="/api/orders/{{ $order_id }}/order_item/list" class="btn btn-primary btn-edit">Edit</button>
                    </form>
                  </div>
                </div>
              {{-- End Form Insert --}}
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->