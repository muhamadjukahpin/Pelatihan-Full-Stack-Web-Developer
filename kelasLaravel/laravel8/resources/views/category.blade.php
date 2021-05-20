@extends('layout.template')

@section('content')
<!-- Page info -->
<div class="page-top-info">
    <div class="container">
        <h4>CAtegory PAge</h4>
        <div class="site-pagination">
            <a href="/">Home</a> /
            <a href="">Shop</a> /
        </div>
    </div>
</div>
<!-- Page info end -->


<!-- Category section -->
<section class="category-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 order-2 order-lg-1">
                <div class="filter-widget">
                    <h2 class="fw-title">Categories</h2>
                    <ul class="category-menu">
                        @foreach ($categories as $category)
                            <li class=""><a href="/category/{{$category->id}}" class="category">{{ $category->name }}</a>
                                <ul class="sub-menu">
                                @foreach ($category->sub_categories as $sub_category)
                                    <li><a href="/category/{{$category->id}}/sub_category/{{$sub_category->id}}" data-category="{{$category->name}}" class="sub_category">{{ $sub_category->name }}</a></li>
                                @endforeach
                                </ul>
                            </li>
                        @endforeach
                    </ul>
                </div>
                @php
                    // dd(isset($_SERVER['QUERY_STRING']));
                @endphp
                <div class="filter-widget mb-0">
                    <h2 class="fw-title">refine by</h2>
                    <div class="price-range-wrap">
                        <h4>Price</h4>
                        <button><a href="/category/sort-price/DESC" style="color: rgb(252, 95, 121)" class="sort-price sort-price-desc">Highest</a></button>
                        <button><a href="/category/sort-price/ASC" style="color: rgb(252, 95, 121)" class="sort-price sort-price-asc">Lowest</a></button>
                        {{-- <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content" data-min="10" data-max="270">
                            <div class="ui-slider-range ui-corner-all ui-widget-header" style="left: 0%; width: 100%;"></div>
                            <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 0%;">
                            </span>
                            <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 100%;">
                            </span>
                        </div>
                        <div class="range-slider">
                            <div class="price-input">
                                <input type="text" id="minamount">
                                <input type="text" id="maxamount">
                            </div>
                        </div> --}} 
                    </div>
                </div>
                {{-- <div class="filter-widget mb-0">
                    <h2 class="fw-title">color by</h2>
                    <div class="fw-color-choose">
                        <div class="cs-item">
                            <input type="radio" name="cs" id="gray-color">
                            <label class="cs-gray" for="gray-color">
                                <span>(3)</span>
                            </label>
                        </div>
                        <div class="cs-item">
                            <input type="radio" name="cs" id="orange-color">
                            <label class="cs-orange" for="orange-color">
                                <span>(25)</span>
                            </label>
                        </div>
                        <div class="cs-item">
                            <input type="radio" name="cs" id="yollow-color">
                            <label class="cs-yollow" for="yollow-color">
                                <span>(112)</span>
                            </label>
                        </div>
                        <div class="cs-item">
                            <input type="radio" name="cs" id="green-color">
                            <label class="cs-green" for="green-color">
                                <span>(75)</span>
                            </label>
                        </div>
                        <div class="cs-item">
                            <input type="radio" name="cs" id="purple-color">
                            <label class="cs-purple" for="purple-color">
                                <span>(9)</span>
                            </label>
                        </div>
                        <div class="cs-item">
                            <input type="radio" name="cs" id="blue-color" checked="">
                            <label class="cs-blue" for="blue-color">
                                <span>(29)</span>
                            </label>
                        </div>
                    </div>
                </div> --}}
                {{-- <div class="filter-widget mb-0">
                    <h2 class="fw-title">Size</h2>
                    <div class="fw-size-choose">
                        <div class="sc-item">
                            <input type="radio" name="sc" id="xs-size">
                            <label for="xs-size">XS</label>
                        </div>
                        <div class="sc-item">
                            <input type="radio" name="sc" id="s-size">
                            <label for="s-size">S</label>
                        </div>
                        <div class="sc-item">
                            <input type="radio" name="sc" id="m-size"  checked="">
                            <label for="m-size">M</label>
                        </div>
                        <div class="sc-item">
                            <input type="radio" name="sc" id="l-size">
                            <label for="l-size">L</label>
                        </div>
                        <div class="sc-item">
                            <input type="radio" name="sc" id="xl-size">
                            <label for="xl-size">XL</label>
                        </div>
                        <div class="sc-item">
                            <input type="radio" name="sc" id="xxl-size">
                            <label for="xxl-size">XXL</label>
                        </div>
                    </div>
                </div> --}}
                {{-- <div class="filter-widget">
                    <h2 class="fw-title">Brand</h2>
                    <ul class="category-menu">
                        <li><a href="#">Abercrombie & Fitch <span>(2)</span></a></li>
                        <li><a href="#">Asos<span>(56)</span></a></li>
                        <li><a href="#">Bershka<span>(36)</span></a></li>
                        <li><a href="#">Missguided<span>(27)</span></a></li>
                        <li><a href="#">Zara<span>(19)</span></a></li>
                    </ul>
                </div> --}}
            </div>

            <div class="col-lg-9 order-1 order-lg-2 mb-5 mb-lg-0">
                <div class="mb-3"> 
                    <h5 class="title-category d-inline-block mr-2" data-category-id=""></h5><h5 class="title-sub-category d-inline-block" data-sub-category-id=""></h5>
                </div>
                <div class="row content-product justify-content-center">
                    @foreach ($products as $product)
                        <div class="col-lg-4 col-6">
                            <div class="product-item">
                                <div class="pi-pic">
                                    {{-- <div class="tag-sale">ON SALE</div> --}}
                                    <a href="/product/{{ $product->slug }}">
                                        <img src="{{ asset('images/products/' . $product->image) }}" alt="">
                                    </a>
                                    <div class="pi-links">
                                        <a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
                                        <a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
                                    </div>
                                </div>
                                <div class="pi-text">
                                    <h6>Rp.{{ number_format($product->price,0,',','.') }}</h6>
                                    <p>{{ $product->name }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="text-center w-100 pt-3">
                    <button class="site-btn sb-line sb-dark load-more">LOAD MORE</button>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Category section end -->

@endsection
@push('script')
    <script>
        $(document).ready(function () {
            const loadMore = document.querySelector('.load-more');
            let count = -10;
            loadMore.addEventListener('click',function (e) {
                e.preventDefault();
                const contentProduct = document.querySelector('.content-product');
                const domain = window.location.origin;
                const url = domain + '/api/products/skip/' + count + '/take/9';
                $.ajax({
                    headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: url,
                    type: 'get',
                    success: result => {
                        const products = result.data;
                        let mainProduct = ``;
                        if(products.length != 0){
                            for (const key in products) {
                                if (Object.hasOwnProperty.call(products, key)) {
                                    const element = products[key];
                                        mainProduct += `
                                            <div class="col-lg-4 col-6">
                                                <div class="product-item"  width="264px" height="409px">
                                                    <div class="pi-pic">
                                                        <a href="/product/${element.slug}">
                                                            <img src="${domain + '/images/products/' + element.image}" alt="${element.name}">
                                                        </a>
                                                        <div class="pi-links">
                                                            <a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
                                                            <a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="pi-text">
                                                        <h6>Rp.${element.price.toLocaleString("de-DE")}</h6>
                                                        <p>${element.name}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        `;
                                }
                            }
                            contentProduct.innerHTML += mainProduct;
                            count += 8;
                        }else{
                            loadMore.style.display = 'none';
                        }
                    }
                });
            })

            const categories = Array.from(document.querySelectorAll('.category'));
            const subCategories = Array.from(document.querySelectorAll('.sub_category'));
            
            categories.forEach((category) => {
                category.addEventListener('click',function (e) {
                    e.preventDefault();
                    const contentProduct = document.querySelector('.content-product');
                    const loadMore = document.querySelector('.load-more');
                    const url = e.target.href;
                    const categoryId = url.split('/')[4];
                    const category = e.target.innerHTML;
                    const titleCategory = document.querySelector('.title-category');
                    const titleSubCategory = document.querySelector('.title-sub-category');
                    $.ajax({
                        headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: url,
                        type: 'get',
                        success: result => {
                            const products = result.data;
                            if(products.length != 0){
                                updateContentProduct(products,contentProduct,loadMore);
                            }else{
                                contentProduct.innerHTML = `
                                    <div class="col-lg-4 col-6">
                                        <p>Product is empty</p>
                                    </div>
                                `;
                                loadMore.classList.add('d-none');
                            }
                            titleCategory.innerHTML = category;
                            titleCategory.dataset.categoryId = categoryId;
                            titleSubCategory.innerHTML = '';
                            titleSubCategory.dataset.subCategoryId = '';
                        }
                    });
                })
            })

            subCategories.forEach((subCategory) => {
                subCategory.addEventListener('click',function (e) {
                    e.preventDefault();
                    const contentProduct = document.querySelector('.content-product');
                    const loadMore = document.querySelector('.load-more');
                    const url = e.target.href;
                    const arr = url.split('/');
                    const categoryId = arr[4];
                    const subCategoryId = arr[6];
                    const category = e.target.dataset.category;
                    const subCategory = e.target.innerHTML;
                    const titleCategory = document.querySelector('.title-category');
                    const titleSubCategory = document.querySelector('.title-sub-category');
                    const domain = window.location.origin;
                    $.ajax({
                        headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: url,
                        type: 'get',
                        success: result => {
                            const products = result.data; 
                            if(products.length != 0){
                                updateContentProduct(products,contentProduct,loadMore);
                            } else{
                                contentProduct.innerHTML = `
                                <div class="col-lg-4 col-6">
                                    <p>Product is empty</p>
                                    </div>
                                    `;
                                loadMore.classList.add('d-none');
                            }
                            titleCategory.innerHTML = category;
                            titleCategory.dataset.categoryId = categoryId;
                            titleSubCategory.innerHTML = ` => ${subCategory}`;
                            titleSubCategory.dataset.subCategoryId = subCategoryId;
                        }
                    });
                })
            })


            const sortPrices = Array.from(document.querySelectorAll('.sort-price'));
            sortPrices.forEach(sortPrice => {
                sortPrice.addEventListener('click',function (e) {
                    e.preventDefault();
                    const contentProduct = document.querySelector('.content-product');
                    const loadMore = document.querySelector('.load-more');
                    const categoryId = document.querySelector('.title-category').dataset.categoryId;
                    const subCategoryId = document.querySelector('.title-sub-category').dataset.subCategoryId;
                    let url = e.target.href;
                    if(categoryId != '' && subCategoryId != ''){
                        url = `${url}/category/${categoryId}/sub_category/${subCategoryId}`;
                        ajaxGet(url,contentProduct,loadMore);
                    }else if(categoryId != ''){
                        url = `${url}/category/${categoryId}`;
                        ajaxGet(url,contentProduct,loadMore);
                    }else{
                        ajaxGet(url,contentProduct,loadMore);
                    }

                })
            })

            const ajaxGet = (url,contentProduct,loadMore) => {
                $.ajax({
                    headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: url,
                    type: 'get',
                    success: result => {
                        const products = result.data;
                        if(products.length != 0){
                            updateContentProduct(products,contentProduct,loadMore);
                        } else{
                            contentProduct.innerHTML = `
                                <div class="col-lg-4 col-6">
                                    <p>Product is empty</p>
                                </div>
                            `;
                            loadMore.classList.add('d-none');
                        }
                    }
                });
            }

            const updateContentProduct = (products,contentProduct,loadMore) => {
                const domain = window.location.origin;
                let mainProduct = ``;
                products.forEach((product) => {
                    mainProduct += `
                    <div class="col-lg-4 col-6">
                        <div class="product-item">
                            <div class="pi-pic">
                                <a href="/product/${product.slug}">
                                    <img src="${domain}/images/products/${product.image}" alt="${product.name}">
                                </a>
                                <div class="pi-links">
                                    <a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
                                    <a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
                                </div>
                            </div>
                            <div class="pi-text">
                                <h6>Rp.${product.price.toLocaleString("de-DE")}</h6>
                                <p>${product.name}</p>
                            </div>
                        </div>
                    </div>
                    `;
                })              
                contentProduct.innerHTML = mainProduct;
                loadMore.classList.add('d-none');
            }


        });
    </script>
@endpush