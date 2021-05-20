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
        <div class="row mb-2">
          <div class="col">
            <a href="/admin/users/create" class="btn btn-sm btn-primary">INSERT</a>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                {{-- Message --}}
                <div class="row">
                  <div class="col-md-6">
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
                {{-- End Message --}}
                {{-- Message failed --}}
                <div class="row">
                  <div class="col-md-6">
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
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @php
                      if(empty($_GET['page']))
                        $i = 1;
                      else 
                        $i = ($_GET['page'] * $users->perPage()) - ($users->perPage() - 1); 
                    @endphp
                    @foreach ($users as $user)
                    <tr>
                      <td>{{ $i++ }}</td>
                      <td>{{ $user->name }}</td>
                      <td>{{ $user->email }}</td>
                      <td>
                        <a href="/admin/users/{{ $user->id }}/edit"><i class="fas fa-edit text-success mr-1"></i></a>
                        <a href="#" class="delete" data-url_delete="/admin/users/{{ $user->id }}"><i class="fas fa-trash text-danger"></i></a>
                      </td>
                    </tr>                        
                    @endforeach
                  </tbody>
                </table>
                <div class="row mt-1">
                  <div class="col d-flex justify-content-center">
                    {{ $users->links() }}
                  </div>
                </div>
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