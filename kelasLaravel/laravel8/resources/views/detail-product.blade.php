@extends('layout.template')

@push('style')
    <style>
        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,

        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }
    </style>
@endpush

@section('content')
<!-- Page info -->
<div class="page-top-info">
    <div class="container">
        <h4>Detail Product PAge</h4>
        <div class="site-pagination">
            <a href="/">Home</a> /
            <a href="">Shop</a>
        </div>
    </div>
</div>
<!-- Page info end -->


<!-- product section -->
<section class="product-section">
    <div class="container">
        <div class="back-link">
            <a href="/category"> &lt;&lt; Back to Category</a>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="product-pic-zoom">
                    <img class="product-big-img" src="{{ asset('images/products/' . $product->image) }}" alt="{{ $product->name }}">
                </div>
                <div class="product-thumbs" tabindex="1" style="overflow: hidden; outline: none;">
                    <div class="product-thumbs-track">
                        <div class="pt active" data-imgbigurl="{{ asset('images/products/' . $product->image) }}"><img src="{{ asset('images/products/' . $product->image) }}" alt=""></div>
                        @foreach ($product_images as $product_image)
                            <div class="pt" data-imgbigurl="{{ asset('images/products/detail_products/'. $product_image->image) }}"><img src="{{ asset('images/products/detail_products/'. $product_image->image) }}"></div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-6 product-details">
                <h2 class="p-title">{{ $product->name }}</h2>
                <h3 class="p-price">Rp.{{ number_format($product->price,0,',','.') }}</h3>
                <h4 class="p-stock stock" data-stock="{{ $product->stock }}">{{ $product->stock }} : <span>In Stock</span></h4>
                @php
                    if (count($reviews) != 0) {
                        $sum = count($reviews);
                        $count = 0;
                        foreach ($reviews as  $review) {
                            $count += $review->start;
                        }
                        $star = ceil($count / $sum);
                    }else{
                        $star = 0;
                    }
                @endphp
                <div class="p-rating">
                    @for ($i = 1; $i <= 5; $i++)
                        @if ($i > $star)
                            <i class="fa fa-star-o fa-fade"></i>
                        @else
                            <i class="fa fa-star-o"></i>
                        @endif
                    @endfor
                </div>
                <div class="p-review">
                    <a href="">{{ count($reviews)  }} reviews</a>|<a href="">Add your review</a>
                </div>
                {{-- {{dd($sizes)}} --}}
                <div class="fw-size-choose">
                    <p>Size</p>
                    @foreach ($size_items as $size_item)
                        <div class="sc-item">
                            <input type="radio" class="size" name="size" id="{{ $size_item->size->size }}" value="{{ $size_item->size->size }}">
                            <label for="{{ $size_item->size->size }}">{{ $size_item->size->size }}</label>
                        </div>
                    @endforeach
                </div>
                <div class="quantity">
                    <p>Quantity</p>
                    <div class="pro-qty"><input type="number" value="1"></div>
                </div>
                <a href="#" class="site-btn">SHOP NOW</a>
                <div id="accordion" class="accordion-area">
                    <div class="panel">
                        <div class="panel-header" id="headingOne">
                            <button class="panel-link active" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapse1">information</button>
                        </div>
                        <div id="collapse1" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="panel-body">
                                <p>{{$product->description}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="panel">
                        <div class="panel-header" id="headingTwo">
                            <button class="panel-link" data-toggle="collapse" data-target="#collapse2" aria-expanded="false" aria-controls="collapse2">care details </button>
                        </div>
                        <div id="collapse2" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                            <div class="panel-body">
                                <img src="{{ asset('divisima') }}/img/cards.png" alt="">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin pharetra tempor so dales. Phasellus sagittis auctor gravida. Integer bibendum sodales arcu id te mpus. Ut consectetur lacus leo, non scelerisque nulla euismod nec.</p>
                            </div>
                        </div>
                    </div>
                    <div class="panel">
                        <div class="panel-header" id="headingThree">
                            <button class="panel-link" data-toggle="collapse" data-target="#collapse3" aria-expanded="false" aria-controls="collapse3">shipping & Returns</button>
                        </div>
                        <div id="collapse3" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                            <div class="panel-body">
                                <h4>7 Days Returns</h4>
                                <p>Cash on Delivery Available<br>Home Delivery <span>3 - 4 days</span></p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin pharetra tempor so dales. Phasellus sagittis auctor gravida. Integer bibendum sodales arcu id te mpus. Ut consectetur lacus leo, non scelerisque nulla euismod nec.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="social-sharing">
                    <a href=""><i class="fa fa-google-plus"></i></a>
                    <a href=""><i class="fa fa-pinterest"></i></a>
                    <a href=""><i class="fa fa-facebook"></i></a>
                    <a href=""><i class="fa fa-twitter"></i></a>
                    <a href=""><i class="fa fa-youtube"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- product section end -->


<!-- RELATED PRODUCTS section -->
<section class="related-product-section">
    <div class="container">
        <div class="section-title">
            <h2>RELATED PRODUCTS</h2>
        </div>
        <div class="product-slider owl-carousel">
            @foreach ($related_products as $related_product)
                @if ($related_product->name != $product->name)
                    <div class="product-item">
                        <div class="pi-pic">
                            <img src="{{ asset('images/products/' . $related_product->image) }}" alt="{{ $related_product->name }}">
                            <div class="pi-links">
                                <a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
                                <a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
                            </div>
                        </div>
                        <div class="pi-text">
                            <h6>Rp.{{ number_format($related_product->price,0,',','.') }}</h6>
                            <p>{{ $related_product->name }}</p>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</section>
<!-- RELATED PRODUCTS section end -->

@endsection

@push('script')
    <script>
        /*-------------------
		Quantity change
        --------------------- */
        const proQty = $('.pro-qty');
        const stock = document.querySelector('.stock').dataset.stock;
        proQty.prepend('<span class="dec qtybtn">-</span>');
        proQty.append('<span class="inc qtybtn">+</span>');
        proQty.on('click', '.qtybtn', function () {
            const $button = $(this);
            const oldValue = $button.parent().find('input').val();
            let newVal;
            if ($button.hasClass('inc')) {
                if (oldValue < stock) {
                    newVal = parseFloat(oldValue) + 1;
                } else {
                    newVal = stock;
                }
            } else {
                // Don't allow decrementing below zero
                if (oldValue > 0) {
                    newVal = parseFloat(oldValue) - 1;
                } else {
                    newVal = 0;
                }
            }
            $button.parent().find('input').val(newVal);
        });
    </script>
@endpush