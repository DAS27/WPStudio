@extends('layouts.app')
@section('tittle', 'Product-details')

@section('content')
    <div class="breadcrumb-area pt-95 pb-95 bg-img" style="background-image:url(assets/img/banner/banner-2.jpg);">
        <div class="container">
            <div class="breadcrumb-content text-center">
                <h2>Product Details</h2>
                <ul>
                    <li><a href="index.html">home</a></li>
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
                        <img src="assets/img/product-details/l1.jpg"/>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product-details-content">
                        <h2>Dog Calcium Food</h2>

                        <div class="product-price">
                            <span class="new">$20.00 </span>
                            <span class="old">$50.00</span>
                        </div>
                        <div class="in-stock">
                            <span><i class="ion-android-checkbox-outline"></i> In Stock</span>
                        </div>
                        <div class="sku">
                            <span>SKU#: MS04</span>
                        </div>
                        <p>Founded in 1989, Jack & Jones is a Danish brand that offers cool, relaxed designs that express a strong visual style through their diffusion lines, Jack & Jones intelligence and Jack & Jones vintage.</p>

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
