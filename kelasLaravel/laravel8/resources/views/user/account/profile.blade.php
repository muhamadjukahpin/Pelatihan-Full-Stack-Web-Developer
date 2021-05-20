@extends('user.layout.app')
@section('content-user')
    <div class="card">
        <div class="card-header">
        My Profile
        </div>
        <div class="card-body">
            <form action="/user/profile/{{ Auth::user()->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="form-group row">
                    <label for="name" class="col-md-2 col-form-label">Full name</label>
                    <div class="col-md-10">
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old('name', Auth::user()->name) }}" >
                        <div class="invalid-feedback text-md">
                            @error('name')
                              {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-md-2 col-form-label">Email</label>
                    <div class="col-md-10">
                        <input type="email" class="form-control" id="email" value="{{ Auth::user()->email }}" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="no_HP" class="col-md-2 col-form-label">No HandPhone</label>
                    <div class="col-md-10">
                        <input type="number" name="no_HP" class="form-control @error('no_HP') is-invalid @enderror" id="no_HP" value="{{ old('no_HP', Auth::user()->no_HP) }}">
                        <div class="invalid-feedback text-md">
                            @error('no_HP')
                              {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2 col-form-label">Address</label>
                </div>
                <div class="form-group row" style="margin-top: -10px;">
                    <label for="address" class="col-md-2 col-form-label address">Full Address</label>
                    <div class="col-md-10">
                        <textarea type="text" name="address" class="form-control @error('address') is-invalid @enderror" id="address" rows="5">{{ old('address', Auth::user()->address) }}</textarea>
                        <div class="invalid-feedback text-md">
                            @error('address')
                              {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group row" style="margin-top: -10px;">
                    <label for="province_id" class="col-md-2 col-form-label address">Province</label>
                    <div class="col-md-10">
                        <select class="form-control @error('province_id') is-invalid @enderror" name="province_id" id="province_id" onchange="getCity()">
                            <option value="">Choose Province.........</option>
                            @foreach ($provinces as $province)
                                <option value="{{ $province->id }}" {{ ($province->id == old('province_id', Auth::user()->province_id)) ? 'selected' : '' }}>{{ $province->name }}</option>
                            @endforeach
                          </select>
                          <div class="invalid-feedback text-md">
                            @error('province_id')
                              {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group row" style="margin-top: -10px;">
                    <label for="city_id" class="col-md-2 col-form-label address">City</label>
                    <div class="col-md-10">
                        <select class="form-control @error('city_id') is-invalid @enderror" name="city_id" id="city_id" data-city_id="{{ old('city_id', Auth::user()->city_id) }}">
                        </select>
                        <div class="invalid-feedback text-md">
                            @error('city_id')
                              {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-0">
                    <label for="image" class="col-md-2 col-form-label ">Image</label>
                    <div class="col-md-10">
                        <img src="{{ asset('images/users/'. Auth::user()->image ) }}" width="200px" height="200px" class="img-thumbnail img-fluid img-preview">
                        <div class="row">
                            <div class="col">
                                <small>Size Image : Max 1 mb</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-2"></div>
                    <div class="col-md-10">
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
                <div class="form-group row">
                    <label for="password" class="col-md-2 col-form-label">Password</label>
                    <div class="col-md-10">
                        <small>Enter the password if you want to change the password</small>
                        <input type="password"  name="password" class="form-control @error('password') is-invalid @enderror" id="password">
                        <div class="invalid-feedback text-md">
                            @error('password')
                              {{ $message }}
                            @enderror
                          </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="confirm_password" class="col-md-2 col-form-label">Confirm Password</label>
                    <div class="col-md-10">
                        <input type="password" name="confirm_password" class="form-control @error('confirm_password') is-invalid @enderror" id="confirm_password">
                        <div class="invalid-feedback text-md">
                            @error('confirm_password')
                              {{ $message }}
                            @enderror
                          </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary">save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection