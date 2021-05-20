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
                {{-- Message --}}
                <div class="row">
                    <div class="col-md-6">
                        @if (session('message'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('message') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                    </div>
                </div>
                {{-- End Message --}}
                {{-- Form Insert --}}
                <div class="row">
                    <div class="col-md-8">
                      <form action="/admin/products/{{ $product->id }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="form-group">
                          <label for="category_id">Category</label>
                          <select class="custom-select @error('category_id') is-invalid @enderror" id="category_id" name="category_id">
                              @foreach ($categories as $category)
                                  <option value="{{ $category->id }}" {{ (old('category_id',$product->category_id) == $category->id) ? 'selected' : '' }}>{{ $category->name }}</option>
                              @endforeach
                            </select>
                            <div class="invalid-feedback text-md">
                              @error('category_id')
                                {{ $message }}
                              @enderror
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="code">Code</label>
                            <input type="text" class="form-control" id="code" value="{{ $product->code }}" aria-describedby="code" readonly>
                            <div class="invalid-feedback text-md">
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name',$product->name) }}" aria-describedby="name">
                            <div class="invalid-feedback text-md">
                              @error('name')
                                {{ $message }}
                              @enderror
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="stock">Stock</label>
                            <input type="number" class="form-control @error('stock') is-invalid @enderror" id="stock" name="stock" value="{{ old('stock',$product->stock) }}" aria-describedby="stock">
                            <div class="invalid-feedback text-md">
                              @error('stock')
                                {{ $message }}
                              @enderror
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="varian">Varian</label>
                            <input type="text" class="form-control @error('varian') is-invalid @enderror" id="varian" name="varian" value="{{ old('varian',$product->varian) }}" aria-describedby="varian">
                            <div class="invalid-feedback text-md">
                              @error('varian')
                                {{ $message }}
                              @enderror
                            </div>
                          </div>
                          <div class="form-group">
                              <label for="image" class="col-sm-2 col-form-label">Image</label>
                              <div class="row">
                                  <div class="col">
                                      <img src="{{ asset('images/products/' . $product->image) }}" class="img-thumbnail img-fluid img-preview">
                                  </div>
                                  <div class="col-md-8">
                                      <div class="custom-file">
                                          <input type="file" class="custom-file-input @error('image') is-invalid @enderror" name="image" id="image">
                                          <label class="custom-file-label" for="customFile">{{ $product->image }}</label>
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
                            <label for="description">Description</label>
                            <textarea rows="10" class="form-control @error('description') is-invalid @enderror" id="description" name="description"  aria-describedby="description">{{ old('description',$product->description) }}</textarea>
                            <div class="invalid-feedback text-md">
                              @error('description')
                                {{ $message }}
                              @enderror
                            </div>
                          </div>
                          <a href="/admin/products/{{ $product->id }}" class="btn btn-secondary">Back</a>
                          <button type="submit" class="btn btn-primary">Update</button>
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