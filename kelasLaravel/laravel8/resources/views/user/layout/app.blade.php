@extends('layout.template')
@push('style')
    <style>
        .sidebar{
            text-decoration-style: none;
            list-style: none;
            margin-top: 40px;
        }

        .sidebar-link{
            margin-bottom: 5px;
            width: 100%;
        }

        .sidebar-link a{
            color: rgb(131, 140, 148);
        }

        .sidebar-link a:hover{
            color: rgb(42, 42, 245);
        }

        .active, .active > a{
            color: rgb(42, 42, 245);
        }

        .address{
            text-align: left;
        }

        @media (min-width: 768px) {
            .address{
                text-align: right;
            }
        }
    </style>
@endpush
@section('content')
    <div class="row m-4">
        <div class="col-md-3">
            <div class="row ">
                <div class="col-2 p-0 d-flex align-content-center justify-content-center mr-2">
                    <img src="{{ asset('images/users/' . Auth::user()->image) }}" alt="profile" width="50px" height="50px" class="rounded-circle">
                </div>
                <div class="col p-0">
                    <p class="mt-3">{{ Auth::user()->name }}</p>
                </div>
            </div>
            <ul class="sidebar">
                <li class="sidebar-link {{ (request()->is('user/profile')) ? 'active' : '' }}">
                    <i class="flaticon-profile"></i>
                    <a href="">Edit Profile</a>
                </li>
                <li class="sidebar-link">
                    <i class=" flaticon-file"></i>
                    <a href="">My Order</a>
                </li>
            </ul>

        </div>
        <div class="col mt-3">
            @yield('content-user')
        </div>
    </div>
@endsection
@push('script')
    <script>
        $(document).ready(function () {     
            const provinceId = document.querySelector('#province_id').value;
            const selectCity = document.querySelector('#city_id');
            const url = window.location.origin + `/api/city/${provinceId}`;
            const cityId = selectCity.dataset.city_id;
            const showCity = (url,selectCity,cityId = 0) => {
                $.ajax({
                    headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: url,
                    type: 'get',
                    success: result => {
                        const cities = result.data;
                        let optionCity = ``;
                        cities.forEach((city) => {
                            optionCity += `
                                <option value="${city.id}" ${(city.id == cityId) ? "selected" : ""}>${city.name}</option>
                            `;
                        });
                        selectCity.innerHTML = optionCity;
                    }
                });
            }

            showCity(url,selectCity,cityId);
            
            getCity = () => {
                const idProvince = document.querySelector('#province_id').value;
                const selectCity = document.querySelector('#city_id');
                const url = window.location.origin + `/api/city/${idProvince}`;
    
                if(idProvince == ''){
                    selectCity.innerHTML = '';
                }else{
                    showCity(url,selectCity);
                }
            }

            // For image in CU (Create and Update)
            const img = document.querySelector('#image');
            if (img) {
                img.addEventListener('change', function () {
                    let imgPreview = document.querySelector('.img-preview');
                    const labelImg = document.querySelector('.custom-file-label');
                    labelImg.textContent = img.files[0].name;
                    const fileImg = new FileReader();
                    fileImg.readAsDataURL(img.files[0]);
                    fileImg.onload = function (e) {
                        imgPreview.src = e.target.result;
                    }
                });
            }
            
        });
    </script>
@endpush