@extends('layout.template')

@push('style')
    <style>

        /* @media (min-width: 576px) { */
            .gallery-image{
                width: 264px;
                height: 409px;
            }    
        /* } */
    </style>    
@endpush

@section('content')
    <!-- Hero section -->
    <section class="hero-section">
        <div class="hero-slider owl-carousel">
            <div class="hs-item set-bg" data-setbg="{{asset('divisima')}}/img/bg.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-lg-7 text-white">
                            <span>New Arrivals</span>
                            <h2>denim jackets</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum sus-pendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. </p>
                            <a href="#" class="site-btn sb-line">DISCOVER</a>
                            <a href="#" class="site-btn sb-white">ADD TO CART</a>
                        </div>
                    </div>
                    <div class="offer-card text-white">
                        <span>from</span>
                        <h2>$29</h2>
                        <p>SHOP NOW</p>
                    </div>
                </div>
            </div>
            <div class="hs-item set-bg" data-setbg="{{asset('divisima')}}/img/bg-2.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-lg-7 text-white">
                            <span>New Arrivals</span>
                            <h2>denim jackets</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum sus-pendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. </p>
                            <a href="#" class="site-btn sb-line">DISCOVER</a>
                            <a href="#" class="site-btn sb-white">ADD TO CART</a>
                        </div>
                    </div>
                    <div class="offer-card text-white">
                        <span>from</span>
                        <h2>$29</h2>
                        <p>SHOP NOW</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="slide-num-holder" id="snh-1"></div>
        </div>
    </section>
    <!-- Hero section end -->



    <!-- Features section -->
    <section class="features-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 p-0 feature">
                    <div class="feature-inner">
                        <div class="feature-icon">
                            <img src="{{asset('divisima')}}/img/icons/1.png" alt="#">
                        </div>
                        <h2>Fast Secure Payments</h2>
                    </div>
                </div>
                <div class="col-md-4 p-0 feature">
                    <div class="feature-inner">
                        <div class="feature-icon">
                            <img src="{{asset('divisima')}}/img/icons/2.png" alt="#">
                        </div>
                        <h2>Premium Products</h2>
                    </div>
                </div>
                <div class="col-md-4 p-0 feature">
                    <div class="feature-inner">
                        <div class="feature-icon">
                            <img src="{{asset('divisima')}}/img/icons/3.png" alt="#">
                        </div>
                        <h2>Free & fast Delivery</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Features section end -->


    <!-- letest product section -->
    <section class="top-letest-product-section">
        <div class="container">
            <div class="section-title">
                <h2>LATEST PRODUCTS</h2>
            </div>
            <div class="product-slider owl-carousel">
                @foreach ($latest_products as $lp)
                    <div class="product-item">
                        <div class="pi-pic">
                            <a href="/product/{{ $lp->slug }}">
                                <img src="{{asset('images/products/'. $lp->image)}}" alt="{{ $lp->name }}" width="264px" height="409px">
                            </a>
                            <div class="pi-links">
                                <a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
                                <a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
                            </div>
                        </div>
                        <div class="pi-text">
                            <h6>Rp.{{ number_format($lp->price,0,',','.') }}</h6>
                            <p>{{ $lp->name }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- letest product section end -->



    <!-- Product filter section -->
    <section class="product-filter-section">
        <div class="container">
            <div class="section-title">
                <h2>BROWSE TOP SELLING PRODUCTS</h2>
            </div>
            <ul class="product-filter-menu">
                <li><a href="#">TOPS</a></li>
                <li><a href="#">JUMPSUITS</a></li>
                <li><a href="#">LINGERIE</a></li>
                <li><a href="#">JEANS</a></li>
                <li><a href="#">DRESSES</a></li>
                <li><a href="#">COATS</a></li>
                <li><a href="#">JUMPERS</a></li>
                <li><a href="#">LEGGINGS</a></li>
            </ul>
            <div class="row d-flex justify-content-center content-product">
                @foreach ($products as $product)
                    <div class="col-lg-3 col-6">
                        <div class="product-item">
                            <div class="pi-pic">
                                <a href="/product/{{ $product->slug }}">
                                    <img src="{{asset('images/products/'. $product->image)}}" class="gallery-image" alt="{{ $product->name }}">
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
            <div class="text-center pt-5">
                <button class="site-btn sb-line sb-dark load-more">LOAD MORE</button>
            </div>
        </div>
    </section>
    <!-- Product filter section end -->


    <!-- Banner section -->
    <section class="banner-section">
        <div class="container">
            <div class="banner set-bg" data-setbg="{{asset('divisima')}}/img/banner-bg.jpg">
                <div class="tag-new">NEW</div>
                <span>New Arrivals</span>
                <h2>STRIPED SHIRTS</h2>
                <a href="#" class="site-btn">SHOP NOW</a>
            </div>
        </div>
    </section>
    <!-- Banner section end  -->

@endsection

@push('script')
    <script>
        $(document).ready(function () {
            const loadMore = document.querySelector('.load-more');
            let count = 0;
            loadMore.addEventListener('click',function (e) {
                e.preventDefault();
                const contentProduct = document.querySelector('.content-product');
                const domain = window.location.origin;
                const url = domain + '/api/products/skip/' + count + '/take/8';
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
                                            <div class="col-lg-3 col-6">
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
        });
    </script>
@endpush