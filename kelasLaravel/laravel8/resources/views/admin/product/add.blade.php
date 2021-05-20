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
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                {{-- Error Validation --}}
                {{-- <div class="row">
                  <div class="col-md-6">
                    @if ($errors->any())
                      <div class="alert alert-danger">
                        <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                        </ul>
                      </div>
                    @endif
                  </div>
                </div> --}}
                {{-- End Error Validation --}}
                {{-- Form Insert --}}
                <div class="row">
                    <div class="col-md-8">
                      <form action="/admin/products" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                          <label for="category_id">Category</label>
                          <select class="custom-select @error('category_id') is-invalid @enderror" id="category_id" name="category_id" onchange="getSubCategory()">
                              <option value="">Choose category ...</option>
                              @foreach ($categories as $category)
                                  <option value="{{ $category->id }}" {{ (old('category_id') == $category->id) ? 'selected' : '' }}>{{ $category->name }}</option>
                              @endforeach
                            </select>
                            <div class="invalid-feedback text-md">
                              @error('category_id')
                                {{ $message }}
                              @enderror
                            </div>
                          </div>
                        <div class="form-group">
                          <label for="sub_category_id">Sub Category</label>
                          <select class="custom-select @error('sub_category_id') is-invalid @enderror" id="sub_category_id" name="sub_category_id" data-id="{{ old('sub_category_id') }}"> 
                            </select>
                            <div class="invalid-feedback text-md">
                              @error('sub_category_id')
                                {{ $message }}
                              @enderror
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="code">Code</label>
                            <input type="text" class="form-control  @error('code') is-invalid @enderror" id="code" name="code" value="{{ old('code') }}" aria-describedby="code">
                            <div class="invalid-feedback text-md">
                              @error('code')
                                {{ $message }}
                              @enderror
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" aria-describedby="name">
                            <div class="invalid-feedback text-md">
                              @error('name')
                                {{ $message }}
                              @enderror
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="stock">Stock</label>
                            <input type="number" class="form-control @error('stock') is-invalid @enderror" id="stock" name="stock" value="{{ old('stock') }}" aria-describedby="stock">
                            <div class="invalid-feedback text-md">
                              @error('stock')
                                {{ $message }}
                              @enderror
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="varian">Varian</label>
                            <input type="text" class="form-control @error('varian') is-invalid @enderror" id="varian" name="varian" value="{{ old('varian') }}" aria-describedby="varian">
                            <div class="invalid-feedback text-md">
                              @error('varian')
                                {{ $message }}
                              @enderror
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price') }}" aria-describedby="price">
                            <div class="invalid-feedback text-md">
                              @error('price')
                                {{ $message }}
                              @enderror
                            </div>
                          </div>
                          <div class="form-group">
                              <label for="image" class="col-sm-2 col-form-label">Image</label>
                              <div class="row">
                                  <div class="col mb-2">
                                      <img src="" class="img-thumbnail img-fluid img-preview">
                                  </div>
                                  <div class="col-md-8">
                                      <p style="margin-bottom: 0">Recommendation: image dimensions 500x775</p>
                                      <div class="custom-file">
                                          <input type="file" class="custom-file-input @error('image') is-invalid @enderror" name="image" id="image">
                                          <label class="custom-file-label" for="customFile">Choose file</label>
                                          <div class="invalid-feedback text-md">
                                            @error('image')
                                              {{ $message }}
                                            @enderror
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="form-group">
                            <label for="sizes">Size</label>
                            <select multiple class="form-control @error('sizes') is-invalid @enderror" id="sizes" name="sizes[]">
                              @foreach ($sizes as $size)
                                <option value="{{ $size->id }}">{{ $size->size }}</option>
                              @endforeach
                            </select>
                            <div class="invalid-feedback text-md">
                              @error('sizes')
                                {{ $message }}
                              @enderror
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="description">Description</label>
                            <textarea rows="10" class="form-control @error('description') is-invalid @enderror" id="description" name="description"  aria-describedby="description">{{ old('description') }}</textarea>
                            <div class="invalid-feedback text-md">
                              @error('description')
                                {{ $message }}
                              @enderror
                            </div>
                          </div>
                          <a href="/admin/products" class="btn btn-secondary">Back</a>
                          <button type="submit" class="btn btn-primary">Insert</button>
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
  </div>
  <!-- /.content-wrapper -->
@endsection

@push('script')
    <script>
      $(document).ready(function () {
        getSubCategory = () => {
          const category_id = document.querySelector('#category_id').value;
          const sub_category = document.querySelector('#sub_category_id');
          const url = window.location.origin + `/api/sub_category/${category_id}`;
          if(category_id == ''){
              sub_category.innerHTML = '';
          }else{
              showSubCategory(url,sub_category);
          }
        }

        const showSubCategory = (url,sub_category,sub_category_id = 0) => {
          $.ajax({
              headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              url: url,
              type: 'get',
              success: result => {
                  const sub_categories = result.data;
                  let optionSubCategory = ``;
                  sub_categories.forEach((row) => {
                      optionSubCategory += `
                          <option value="${row.id}" ${(row.id == sub_category_id) ? "selected" : ""}>${row.name}</option>
                      `;
                  });
                  sub_category.innerHTML = optionSubCategory;
              }
          });
        }

        const category_id = document.querySelector('#category_id').value;
        if(category_id){
          const sub_category = document.querySelector('#sub_category_id');
          const sub_category_id = document.querySelector('#sub_category_id').dataset.id;
          const url = window.location.origin + `/api/sub_category/${category_id}`;
          showSubCategory(url,sub_category,sub_category_id);
        }
      });
    </script>
@endpush