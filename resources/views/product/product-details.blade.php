@extends('layouts.app')
@section('tittle', 'Product-details')

@section('custom-js')
    <script src="/assets/js/plus-minux-box.js"></script>
    <script>
        $(document).ready(function () {
            $('.addtocart-btn').click(function (event) {
                event.preventDefault()
                addToCart()
            })
        })

        const addToCart = () => {
            let id = $('.details_name').data('id');
            let qty = $('.cart-plus-minus-box').val();
            let routeName = "{{ route('cart.store') }}";
            $.ajax({
                url: routeName,
                method: 'post',
                data: {
                    id, qty
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: () => {
                    window.location.href="{{ route('cart.index') }}"
                },
                error: (data) => {
                    console.log(data)
                }
            });
        }
    </script>
@endsection

@section('content')
    <div class="breadcrumb-area pt-95 pb-95 bg-img" style="background-image:url(/assets/img/banner/banner-2.jpg);">
        <div class="container">
            <div class="breadcrumb-content text-center">
                <h2>Product Details</h2>
                <ul>
                    <li><a href="{{ route('home') }}">home</a></li>
                    <li class="active">Product Details</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="shop-area pt-95 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product-details-img">
                        <img src="/{{ $product->images[0]['img_large'] }}"/>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product-details-content">
                        <div class="details_name" data-id="{{$product->id}}">
                            <h2>{{ $product->title }}</h2>
                        </div>

                        <div class="product-price">
                            <span class="new">${{ number_format($product->price, 2) }}</span>
                            @isset($product->price_old)
                            <span class="old">${{ number_format($product->price_old, 2) }}</span>
                            @endisset
                        </div>
                        <div class="in-stock">
                            <span><i class="ion-android-checkbox-outline"></i> In Stock</span>
                        </div>
                        <div class="sku">
                            <span>SKU#: {{ $product->sku }}</span>
                        </div>
                        <p>{{ $product->description }}</p>

                        <div class="quality-wrapper mt-30 product-quantity">
                            <label>Qty:</label>
                            <div class="cart-plus-minus">
                                <input class="cart-plus-minus-box" type="text" name="qtybutton" value="2">
                            </div>
                        </div>
                        <div class="product-list-action">
                            <div class="product-list-action-left">
                                <a class="addtocart-btn" href="#" title="Add to cart">
                                    <i class="ion-bag"></i>
                                    Add to cart
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
