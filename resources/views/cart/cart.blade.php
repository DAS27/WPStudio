@extends('layouts.app')
@section('tittle', 'Basket')

@section('custom-js')
    <script src="assets/js/vendor/jquery-1.12.0.min.js"></script>
    <script src="assets/js/plus-minux-box.js"></script>
    <script>
        $(document).ready(function () {
            $('.ti-trash').click(function (event) {
                event.preventDefault()
                removeFromCart()
            })
        })

        function removeFromCart(id) {
            $.ajax({
                url: "{{ route('cart.delete') }}",
                method: "DELETE",
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
                                <tbody>
                                <tr>
                                    @isset($item)
                                    <td class="product-thumbnail">
                                        <a href="{{ route('product.show', $item->id) }}"><img src="/{{ $item->attributes['img_s'] }}" alt="{{ $item->name }}"></a>
                                    </td>
                                    <td class="product-name" data-id="{{ $item->id }}"><a href="{{ route('product.show', $item->id) }}">{{ $item->name }}</a></td>
                                    <td class="product-price-cart"><span class="amount">${{ $item->price }}.00</span></td>
                                    <td class="product-quantity">
                                        <div class="cart-plus-minus">
                                            <input class="cart-plus-minus-box" type="text" name="qtybutton" value="{{ $item->quantity }}">
                                        </div>
                                    </td>
                                    <td class="product-subtotal">${{ \Cart::session($_COOKIE['cart_id'])->getSubTotal() }}.00</td>
                                    <td class="product-remove"><a onclick="removeFromCart({{ $item->id }})" href="#"><i class="ti-trash"></i></a></td>
                                    @endisset
                                </tr>
                                <tr>
                                    <td class="product-thumbnail">
                                        <a href="#"><img src="assets/img/basket/cart-3.jpg" alt=""></a>
                                    </td>
                                    <td class="product-name"><a href="#">Dry Dog Food</a></td>
                                    <td class="product-price-cart"><span class="amount">$110.00</span></td>
                                    <td class="product-quantity">
                                        <div class="cart-plus-minus">
                                            <input class="cart-plus-minus-box" type="text" name="qtybutton" value="2">
                                        </div>
                                    </td>
                                    <td class="product-subtotal">$110.00</td>
                                    <td class="product-remove"><a href="#"><i class="ti-trash"></i></a></td>
                                </tr>
                                <tr>
                                    <td class="product-thumbnail">
                                        <a href="#"><img src="assets/img/basket/cart-4.jpg" alt=""></a>
                                    </td>
                                    <td class="product-name"><a href="#">Cat Buffalo Food</a></td>
                                    <td class="product-price-cart"><span class="amount">$150.00</span></td>
                                    <td class="product-quantity">
                                        <div class="cart-plus-minus">
                                            <input class="cart-plus-minus-box" type="text" name="qtybutton" value="2">
                                        </div>
                                    </td>
                                    <td class="product-subtotal">$150.00</td>
                                    <td class="product-remove"><a href="#"><i class="ti-trash"></i></a></td>
                                </tr>
                                <tr>
                                    <td class="product-thumbnail">
                                        <a href="#"><img src="assets/img/basket/cart-5.jpg" alt=""></a>
                                    </td>
                                    <td class="product-name"><a href="#">Legacy Dog Food</a></td>
                                    <td class="product-price-cart"><span class="amount">$170.00</span></td>
                                    <td class="product-quantity">
                                        <div class="cart-plus-minus">
                                            <input class="cart-plus-minus-box" type="text" name="qtybutton" value="2">
                                        </div>
                                    </td>
                                    <td class="product-subtotal">$170.00</td>
                                    <td class="product-remove"><a href="#"><i class="ti-trash"></i></a></td>
                                </tr>
                                </tbody>
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
