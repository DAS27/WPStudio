@extends('layouts.app')
@section('tittle', 'Basket')

@section('custom-js')
    <script src="assets/js/vendor/jquery-1.12.0.min.js"></script>
    <script src="assets/js/plus-minux-box.js"></script>
    <script>
    $(document).ready(function () {
        $('.ti-trash').click(function (event) {
            event.preventDefault()
            removeFromCart(id)
        })
    })

        function removeFromCart(id)
        {
            let routeName = "{{ route('cart.destroy') }}";
            $.ajax({
                url: routeName,
                method: 'delete',
                data: {
                    id
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: () => {
                    location.reload();
                },
                error: (data) => {
                    console.log(data)
                }
            });
        }

        function decrementCount(id)
        {
            let routeName = "{{ route('item.dec') }}";
            let qty = -1;
            $.ajax({
                url: routeName,
                method: 'patch',
                data: {
                    id, qty
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: () => {
                    location.reload();
                },
                error: (data) => {
                    console.log(data)
                }
            });
        }

        function incrementCount(id)
        {
            let routeName = "{{ route('item.inc') }}";
            let qty = +1;
            $.ajax({
                url: routeName,
                method: 'patch',
                data: {
                    id, qty
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: () => {
                    location.reload();
                },
                error: (data) => {
                    console.log(data)
                }
            });
        }
    </script>
@endsection

@section('content')
    <!-- shopping-cart-area start -->
    <div class="cart-main-area pt-95 pb-100">
        <div class="container">
            <h3 class="page-title">Your cart items</h3>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <form action="#">
                        <div class="table-content table-responsive">
                            <table>
                                <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Product Name</th>
                                    <th>Until Price</th>
                                    <th>Qty</th>
                                    <th>Subtotal</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                @isset($products)
                                    @foreach ($products as $product)
                                    <tbody>
                                        <tr>
                                        <td class="product-thumbnail">
                                            <a href="{{ route('product.show', $product->id) }}"><img src="/{{ $product->attributes['img_s'] }}" alt="{{ $product->name }}"></a>
                                        </td>
                                        <td class="product-name" data-id="{{ $product->id }}"><a href="{{ route('product.show', $product->id) }}">{{ $product->name }}</a></td>
                                        <td class="product-price-cart"><span class="amount">${{ $product->price }}.00</span></td>
                                        <td class="product-quantity">
                                            <div class="cart-plus-minus">
                                                <div onclick="decrementCount({{ $product->id }})" class="dec qtybutton">-</div>
                                                <input class="cart-plus-minus-box" type="text" name="qtybutton" value="{{ $product->quantity }}">
                                                <div onclick="incrementCount({{ $product->id }})" class="inc qtybutton">+</div>
                                            </div>
                                        </td>
                                        <td class="product-subtotal">${{ $product->getPriceSum() }}.00</td>
                                        <td class="product-remove"><a onclick="removeFromCart({{ $product->id }})" href="#"><i class="ti-trash"></i></a></td>
                                    </tr>
                                    </tbody>
                                    @endforeach
                                @endisset
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="cart-shiping-update-wrapper">
                                    <div class="cart-shiping-update">
                                        <a href="#">Оформить заказ</a>
                                        <button>Обновить</button>
                                    </div>
                                    <div class="cart-clear">
                                        <a href="#">Очистить корзину</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
