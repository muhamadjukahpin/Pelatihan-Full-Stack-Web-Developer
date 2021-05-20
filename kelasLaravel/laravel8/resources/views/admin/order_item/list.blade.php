@extends('admin.template')
@section('content')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
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
                @if (session('message'))
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                @endif
              </div>
            </div>
            {{-- End Message success --}}
            {{-- Message failed --}}
            <div class="row">
              <div class="col-md-6 message-failed">
                @if (session('message-failed'))
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('message-failed') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                @endif
              </div>
            </div>
            {{-- End Message failed --}}
            <div class="row">
              <div class="col-md-6">
                <form action="/api/orders/{{ $order->id }}/order_item"  method="POST" id="form-order-item">
                    @csrf
                    <div class="form-group">
                      <label for="product_id">Product</label>
                      <select class="custom-select @error('product_id') is-invalid @enderror" id="product_id" name="product_id" onchange="getStock()" required>
                        <option value="">Choose product ...</option>
                          @foreach ($products as $product)
                              <option value="{{ $product->id }}-{{ $product->stock }}" {{ (old('product_id') == $product->id) ? 'selected' : '' }}>{{ $product->name }}</option>
                          @endforeach
                      </select>
                      <div class="invalid-feedback invalid-product text-md">
                        @error('product_id')
                          {{ $message }}
                        @enderror
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="qty" class="d-block">Qty</label>
                        <div class="d-flex justify-content-between" style="margin-top: -8px; margin-bottom: -10px ; width:100px">
                          <p class="min">min : 1</p>
                          <p class="max">max : {{ (old('product_id')) ? explode('-',old('product_id'))[1] : '' }}</p>
                        </div>
                      <small class="empty-stock d-none">Empty stock</small>
                      <input type="number" min="1" class="form-control @error('qty') is-invalid @enderror" id="qty" name="qty" value="{{ old('qty') }}" aria-describedby="qty">
                      <div class="invalid-feedback invalid-qty text-md">
                        @error('qty')
                          {{ $message }}
                        @enderror
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
                    <h5>Name Customer : {{ $order->name }}</h5>
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
                      <td>{{ $row->name }}</td>
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
  </div>
  <!-- /.content-wrapper -->
@endsection

@push('script')
    <script>
      $(document).ready(function () {
        // get stock in product
        getStock = () => {
          const max = document.querySelector('.max');
          const stock = document.querySelector('#product_id').value.split('-')[1];
          const emptyStock = document.querySelector('.empty-stock');
          const btnAdd = document.querySelector('.btn-add');
          const qty = document.querySelector('#qty');
          if (stock == 0) {
            emptyStock.classList.remove('d-none');
            btnAdd.classList.add('d-none');
            qty.value = 0;
            qty.setAttribute('readonly','');
          }else{
            emptyStock.classList.add('d-none');
            btnAdd.classList.remove('d-none');
            qty.value = "";
            qty.removeAttribute('readonly');
          }

          if(stock == undefined){
            max.innerHTML = 'max : ';
          }else{
            max.innerHTML = `max : ${stock}`;
          }
        }

        // event click in document
        document.addEventListener('click',function (e) {
          const modalDelete = document.querySelector('.modal-delete');
          const btnCancelDelete = document.querySelector('.btn-cancel-delete');
          const btnCloseDelete = document.querySelector('.btn-close-delete');
          const formDelete = document.querySelector('.form-delete');
          const content = document.querySelector('.content-wrapper');
          if(e.target.classList.contains('delete') || e.target.classList.contains('icon-delete')){
            // add class d-blovk or show modal delete
            e.preventDefault();
            modalDelete.classList.add('d-block');
            // edit action in form 
            formDelete.action = e.target.dataset.url_delete;
          } else if(e.target.classList.contains('btn-cancel-delete')){
            // remove class d-block or hidden modal delete
            modalDelete.classList.remove('d-block');
          } else if(e.target.classList.contains('btn-close-delete')){
            // remove class d-block or hidden modal delete
            modalDelete.classList.remove('d-block');
          } else if(e.target.classList.contains('edit') || e.target.classList.contains('icon-edit')){
            // show page edit
            e.preventDefault();
            const urlEdit = e.target.dataset.url_edit;
            showPageContent(content,urlEdit);
          } else if(e.target.classList.contains('btn-back')){
            // show page list again or back from page edit
            e.preventDefault();
            const urlBack = e.target.dataset.url_back;
            showPageContent(content,urlBack); 
          } else if(e.target.classList.contains('btn-add')){
            // insert data
            e.preventDefault();   
            insertData();
          } else if(e.target.classList.contains('btn-delete')){
            // delete data
            e.preventDefault();
            deleteData();
          } else if(e.target.classList.contains('btn-edit')){
            // update data
            e.preventDefault();
            const urlBack = e.target.dataset.url_back;
            updateData(content,urlBack);
          }
        });

        const insertData = () => {
          const formOrderItem = document.querySelector('#form-order-item');
          const inputProductId = document.querySelector('#product_id');
          const inputQty = document.querySelector('#qty');
          const textInvalidProduct = document.querySelector('.invalid-product');
          const textInvalidQty = document.querySelector('.invalid-qty');
          const max = document.querySelector('.max');
          const url = formOrderItem.action;
          const productId = inputProductId.value.split('-')[0];
          const qty = inputQty.value;
          $.ajax({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: url,
            type: 'post',
            data: {
              product_id: productId,
              qty: qty,
            },
            success: result => {
              inputProductId.value = '';
              inputQty.value = '';
              max.innerHTML = 'max : ';
              if(result.message_full_stock){
                showMessageFailed(result.message_full_stock);
              }else{
                updateTable(result.data);
                showMessageSuccess(result.message);
              }
            },
            error: function (errors) {
              const errorQty = errors.responseJSON.qty;
              const errorProduct = errors.responseJSON.message;
              if(errorQty){
                inputQty.classList.add('is-invalid');
                textInvalidQty.innerHTML = errorQty[0];
                setTimeout(function(){
                  inputQty.classList.remove('is-invalid');
                  textInvalidQty.innerHTML = '';
                }, 3000);
              }else{
                inputProductId.classList.add('is-invalid');
                textInvalidProduct.innerHTML = errorProduct;
                setTimeout(function(){
                  inputProductId.classList.remove('is-invalid');
                  textInvalidProduct.innerHTML = '';
                }, 3000);
              }
            }
          });
        }

        const deleteData = () => {
          const formDelete = document.querySelector('.form-delete');
          const modalDelete = document.querySelector('.modal-delete');
          const url = formDelete.action;
          $.ajax({
            url: url,
            type: 'DELETE',
            success: result => {
              updateTable(result.data);
              showMessageSuccess(result.message);
             }
          });

          modalDelete.classList.remove('d-block');
        }

        const updateData = (content,urlBack) => {
          const formEditOrderItem = document.querySelector('#form-edit-order-item');
          const inputQty = document.querySelector('#qty');
          const textInvalidQty = document.querySelector('.invalid-qty');
          const url = formEditOrderItem.action;
          const qty = inputQty.value;
          $.ajax({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: url,
            type: 'patch',
            data: {
              qty: qty,
            },
            success: result => {
              if(result.message_not_modified){
                showMessageFailed(result.message_not_modified);
              }else{
                showPageContent(content,urlBack,result.message);
              }
            },
            error: function (errors) {
              const errorQty = errors.responseJSON.qty;
              const errorProduct = errors.responseJSON.message;
              if(errorQty){
                inputQty.classList.add('is-invalid');
                textInvalidQty.innerHTML = errorQty[0];
                setTimeout(function(){
                  inputQty.classList.remove('is-invalid');
                  textInvalidQty.innerHTML = '';
                }, 3000);
              }
            }
          });
        }

        const updateTable = data => {
          const tbody = document.querySelector('#tbody');
          let table = '';
          data.forEach((e,i) => {
            table += `
              <tr>
                <td>${++i}</td>
                <td>${e.product.name}</td>
                <td>${e.qty}</td>
                <td>
                  <a href="#" data-url_edit="/api/orders/${e.order_id}/order_item/${e.id}/edit" class="edit"><i class="fas fa-edit text-success mr-1 icon-edit" data-url_edit="/api/orders/${e.order_id}/order_item/${e.id}/edit"></i></a>
                  <a href="#" class="delete" data-url_delete="/api/orders/${e.order_id}/order_item/${e.id}"><i class="fas fa-trash text-danger icon-delete" data-url_delete="/api/orders/${e.order_id}/order_item/${e.id}"></i></a>
                </td>
              </tr>
            `;
          });

          tbody.innerHTML = table;
        }

        const showPageContent = (content,url,message = null) => {
          $.ajax({
            url: url,
            type: 'GET',
            success: result => {
              content.innerHTML = result;
            }
          });

          if(message != null){
            setTimeout(function () {
              showMessageSuccess(message);
            },1000);
          }
        }

        const showMessageSuccess = (message) => {
          const messageSuccess = document.querySelector('.message-success');
          messageSuccess.innerHTML = `
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              ${message}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          `;

          setTimeout(function(){
            messageSuccess.innerHTML = '';
          }, 3000);
        }

        const showMessageFailed = (message) => {
          const messageFailed = document.querySelector('.message-failed');
          messageFailed.innerHTML = `
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              ${message}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          `;

          setTimeout(function(){
            messageFailed.innerHTML = '';
          }, 3000);
        }
      });
    </script>
@endpush