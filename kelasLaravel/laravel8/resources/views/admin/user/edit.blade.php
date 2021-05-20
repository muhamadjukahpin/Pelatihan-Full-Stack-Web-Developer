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
                    <div class="col-md-6">
                      <form action="/admin/users/{{ $user->id }}" method="POST">
                          @csrf
                          @method('patch')
                          <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name',$user->name) }}" aria-describedby="name">
                            <div class="invalid-feedback text-md">
                              @error('name')
                                {{ $message }}
                              @enderror
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $user->email) }}" aria-describedby="email">
                            <div class="invalid-feedback text-md">
                              @error('email')
                                {{ $message }}
                              @enderror
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="password">New Password</label>
                            <small class="d-block p-0 m-0" style="font-size: 14px">Enter the password if you want to change the password</small>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" aria-describedby="password">
                            <div class="invalid-feedback text-md">
                              @error('password')
                                {{ $message }}
                              @enderror
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="confirm_password">Confirm Password</label>
                            <input type="password" class="form-control @error('confirm_password') is-invalid @enderror" id="confirm_password" name="confirm_password" aria-describedby="confirm_password">
                            <div class="invalid-feedback text-md">
                              @error('confirm_password')
                                {{ $message }}
                              @enderror
                            </div>
                          </div>
                          <a href="/admin/users" class="btn btn-secondary">Back</a>
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