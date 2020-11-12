@extends('layouts.app')
@section('tittle', 'Basket')

@section('custom-js')
    <script>
        $(document).ready(function () {
            $('.ti-trash').click(function (e) {
                e.preventDefault()
            })
        })

        function removeFromCart(id)
        {
            let routeName = "{{ route('cart.item.remove') }}";
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

        function updateCount(id)
        {
            let routeName = "{{ route('cart.item.update') }}";
            let qty = $('.cart-plus-minus-box').val();
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

        function decrementCount(id)
        {
            let routeName = "{{ route('cart.item.dec') }}";
            $.ajax({
                url: routeName,
                method: 'patch',
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

        function incrementCount(id)
        {
            let routeName = "{{ route('cart.item.inc') }}";
            $.ajax({
                url: routeName,
                method: 'patch',
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
                                @isset($sortedProducts)
                                    @foreach ($sortedProducts as $product)
                                    <tbody>
                                        <tr>
                                            <td class="product-thumbnail">
                                                <a href="{{ route('product.show', $product->id) }}"><img src="/{{ $product->attributes['img_s'] }}" alt="{{ $product->name }}"></a>
                                            </td>
                                            <td class="product-name" data-id="{{ $product->id }}"><a href="{{ route('product.show', $product->id) }}">{{ $product->name }}</a></td>
                                            <td class="product-price-cart"><span class="amount">${{ number_format($product->price, 2) }}</span></td>
                                            <td class="product-quantity">
                                                <div class="cart-plus-minus">
                                                    <div class="dec qtybutton" onclick="decrementCount({{ $product->id }})">-</div>
                                                    <input class="cart-plus-minus-box" onchange="updateCount({{ $product->id }})" type="text" name="qty" value="{{ $product->quantity }}">
                                                    <div class="inc qtybutton" onclick="incrementCount({{ $product->id }})">+</div>
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
