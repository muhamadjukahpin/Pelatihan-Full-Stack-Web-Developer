@extends('admin.template')
@push('style')
  <style>
    .size {
      width: 50px;
      height: 50px;
      border-radius: 50px;
      background-color: red;
      padding-top: 11px;
    }  
  </style>   
@endpush
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
        <div class="row">
          <div class="col-12">
            <div class="card">
                <div class="card-header row d-flex justify-content-between">
                    <div class="col">
                        <h5 class=" font-weight-bold">{{ $product->name }}</h5>
                        <span>Rp.{{ number_format($product->price,0,',','.') }}</span>
                    </div>
                    <div class="col d-flex justify-content-end">
                        <div>
                            <span class="d-block"><strong>Category </strong>: {{ $product->category->name }}</span>
                            <span><strong>Code </strong>: {{ $product->code }}</span>
                        </div>
                        <div>
                          <a href="/admin/products/{{ $product->id }}/product_images/" class="btn btn-primary ml-3">Add Image</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 mb-3 d-flex flex-column justify-content-center">
                            <img src="{{ asset('/images/products/' . $product->image) }}" class="img-thumbnail d-block">
                            <div class="d-flex justify-content-center align-item-center mt-3">
                                <a href="/admin/products"><i class="fas fa-arrow-left" style="font-size: 20px"></i></a>
                                <a href="/admin/products/{{ $product->id }}/edit"><i class="fas fa-edit text-success ml-4" style="font-size: 20px"></i></a>
                                <a href="#" class="delete" data-url_delete="/admin/products/{{ $product->id }}"><i class="fas fa-trash text-danger ml-4" style="font-size: 20px"></i></a> 
                            </div>
                            <div class="content-size d-flex justify-content-center align-item-center mt-3">
                              @foreach ($product_sizes as $product_size)
                                  <div class="size d-flex justify-content-center align-item-center"><a href="/api/products/{{$product->id}}/product_sizes/{{$product_size->id}}" class="text-white delete-size" data-url="/api/products/{{$product->id}}/product_sizes/{{$product_size->id}}">{{ $product_size->size->size }}</a></div>
                              @endforeach
                            </div>
                            <div class="d-flex justify-content-center align-item-center mt-3">
                              <a href="/admin/products/{{ $product->id }}/product_sizes" class="btn btn-sm btn-primary show-add-size">Show Add Size</a>
                            </div>
                            <div class="d-flex justify-content-center align-item-center mt-3">
                              <form action="/api/products/{{ $product->id }}/product_sizes" method="POST" class="form-add-size d-none">
                                <div class="form-group">
                                  <label for="size">Size</label>
                                  <select class="form-control @error('size') is-invalid @enderror" id="size" name="size" onchange="insertData()">
                                    <option value="">Choosee size...</option>
                                    @foreach ($sizes as $size)
                                      <option value="{{ $size->id }}">{{ $size->size }}</option>
                                    @endforeach
                                  </select>
                                  <div class="invalid-feedback text-md invalid-size">
                                    @error('size')
                                      {{ $message }}
                                    @enderror
                                  </div>
                                </div>
                              </form>
                            </div>
                        </div>
                        <div class="col">
                            <h5 class="font-weight-bold">Description</h5>
                            <p class="card-text text-justify">{{ $product->description }}</p>
                        </div>
                    </div>
                </div>
                </div>
          </div>
          <!-- /.col -->
        </div>
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
      // event click in document
      document.addEventListener('click',function (e) { 
          if(e.target.classList.contains('show-add-size')){
            e.preventDefault();
            const formAddSize = document.querySelector('.form-add-size');
            formAddSize.classList.toggle('d-none');
          } else if(e.target.classList.contains('delete-size')){
            // delete data
            e.preventDefault();
            const url = e.target.dataset.url;
            deleteData(url);
          }
        });

        insertData = () => {
          const formAddSize = document.querySelector('.form-add-size');
          const selectSize = document.querySelector('#size');
          const size = selectSize.value;
          const textInvalidSize = document.querySelector('.invalid-size');
          const url = formAddSize.action;
          if(size != ''){
            $.ajax({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              url: url,
              type: 'post',
              data: {
                size
              },
              success: result => {
                updateSize(result.data);
              },
              error: function (errors) {
                const errorSize = errors.responseJSON.message;
                selectSize.classList.add('is-invalid');
                textInvalidSize.innerHTML = errorSize;
                setTimeout(function(){
                  selectSize.classList.remove('is-invalid');
                  textInvalidSize .innerHTML = '';
                }, 3000);
              }
            });
          }
        }

        const deleteData = (url) => {
          $.ajax({
            url: url,
            type: 'DELETE',
            success: result => {
              updateSize(result.data);
             }
          });
        }

        const updateSize = data => {
          const contentSize = document.querySelector('.content-size');
          let content = '';
          data.forEach((e,i) => {
            content += `
            <div class="size d-flex justify-content-center align-item-center">
              <a href="#" class="text-white delete-size" data-url="/api/products/${e.product.id}/product_sizes/${e.id}">${e.size.size}</a>
            </div>
            `;
          });

          contentSize.innerHTML = content;
        }
    </script>
@endpush