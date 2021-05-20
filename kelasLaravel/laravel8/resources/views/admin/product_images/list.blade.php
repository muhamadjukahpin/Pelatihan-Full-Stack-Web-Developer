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
        {{-- Form insert product_images --}}
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
                <form action="/api/products/{{ $product->id }}/product_images"  method="POST" id="form-product-item" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="image" class="col-sm-2 col-form-label">Image</label>
                        <div class="row">
                            <div class="col mb-2">
                                <img src="" class="img-thumbnail img-fluid img-preview">
                            </div>
                            <div class="col-md-8">
                              <p style="margin-bottom: 0">Recommendation: image dimensions 1000x1358</p>
                              <div class="custom-file">
                                    <input type="file" class="custom-file-input @error('image') is-invalid @enderror" name="image" id="image">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                    <div class="invalid-feedback text-md invalid-image">
                                      @error('image')
                                        {{ $message }}
                                      @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="/admin/products/{{ $product->id }}" class="btn btn-secondary">Back</a>
                    <button type="submit" class="btn btn-primary btn-add">Add</button>
                </form>
              </div>
            </div>
          </div>
        </div>
        {{-- End Form insert product_images --}}

        {{-- Table product_images --}}
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-8 d-flex justify-content-start">
                    <h5>Name Product : {{ $product->name }}</h5>
                  </div>
                </div>
                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Image for detail product</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody id="tbody">
                    @foreach ($product_images as $i => $row)
                    <tr>
                      <td>{{ ++$i }}</td>
                      <td>
                        <img src="{{ asset('images/products/detail_products/'. $row->image)  }}" width="200px" height="200px" class="img-thumbnail">  
                      </td>
                      <td>
                        <a href="#" class="delete" data-url_delete="/api/products/{{ $product->id }}/product_images/{{ $row->id }}"><i class="fas fa-trash text-danger icon-delete" data-url_delete="/api/products/{{ $product->id }}/product_images/{{ $row->id }}"></i></a>
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
        {{-- End Table product_images--}}
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
        // event click in document
        document.addEventListener('click',function (e) {
          const modalDelete = document.querySelector('.modal-delete');
          const btnCancelDelete = document.querySelector('.btn-cancel-delete');
          const btnCloseDelete = document.querySelector('.btn-close-delete');
          const formDelete = document.querySelector('.form-delete');
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
          } else if(e.target.classList.contains('btn-add')){
            // insert data
            e.preventDefault();
            insertData();
          } else if(e.target.classList.contains('btn-delete')){
            // delete data
            e.preventDefault();
            deleteData();
          }
        });

        const insertData = () => {
          const formProductItem = document.querySelector('#form-product-item');
          const textInvalidImage = document.querySelector('.invalid-image');
          const inputImage = document.querySelector('#image');
          const labelImage = document.querySelector('.custom-file-label');
          const imagePreview = document.querySelector('.img-preview');
          const files = inputImage.files;
          const formData = new FormData();
          formData.append("image", files[0]);
          const url = formProductItem.action;
          $.ajax({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: url,
            type: 'post',
            contentType: false,
            processData: false,
            data: formData,
            success: result => {
              imagePreview.setAttribute('src','');
              labelImage.innerHTML = '';
              inputImage.value = '';
              updateTable(result.data);
              showMessageSuccess(result.message);
            },
            error: function (errors) {
              const errorImage = errors.responseJSON.image;
              inputImage.classList.add('is-invalid');
              textInvalidImage.innerHTML = errorImage[0];
              setTimeout(function(){
                inputImage.classList.remove('is-invalid');
                textInvalidImage.innerHTML = '';
              }, 3000);
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

        const updateTable = data => {
          const tbody = document.querySelector('#tbody');
          const domain = window.location.origin;
          let table = '';
          data.forEach((e,i) => {
            table += `
              <tr>
                <td>${++i}</td>
                <td>
                  <img src="${domain}/images/products/detail_products/${e.image}" width="200px" height="200px" class="img-thumbnail">  
                </td>
                <td>
                  <a href="#" class="delete" data-url_delete="/api/products/${e.product_id}/product_images/${e.id}"><i class="fas fa-trash text-danger icon-delete" data-url_delete="/api/products/${e.product_id}/product_images/${e.id}"></i></a>
                </td>
              </tr>
            `;
          });

          tbody.innerHTML = table;
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