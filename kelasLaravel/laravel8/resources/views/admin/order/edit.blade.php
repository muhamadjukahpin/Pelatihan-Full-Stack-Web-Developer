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
                    <div class="col-md-6">
                      <form action="/admin/orders/{{ $order->id }}" method="POST">
                          @csrf
                          @method('patch')
                          <div class="form-group">
                            <label for="user_id">Customer</label>
                            <select class="custom-select @error('user_id') is-invalid @enderror" id="user_id" name="user_id">
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}" {{ (old('user_id',$order->user_id) == $user->id) ? 'selected' : '' }}>{{ $user->name }}</option>
                                @endforeach
                              </select>
                              <div class="invalid-feedback text-md">
                                @error('user_id')
                                  {{ $message }}
                                @enderror
                              </div>
                            </div>
                          <a href="/admin/orders" class="btn btn-secondary">Back</a>
                          <button type="submit" class="btn btn-primary">Edit</button>
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