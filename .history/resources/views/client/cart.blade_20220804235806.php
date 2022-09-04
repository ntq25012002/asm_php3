@extends('client.layouts.main')

@section('content')
    
<section class="breadcrumb-outer">
    <div class="container">
    <div class="breadcrumb-content">
    <h2>Booking</h2>
    <nav aria-label="breadcrumb">
    <ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('cart')}}">Trang chủ</a></li>
    <li class="breadcrumb-item active" aria-current="page">Booking</li>
    </ul>
    </nav>
    </div>
    </div>
    </section>
    
    
    <section id="cart-main" class="cart-main bg-white">
    <div class="container">
    <div class="cart-inner">
    <div class="cart-table-list">
    <div class="order-list">
    <table class="shop_table rt-checkout-review-order-table">
    <thead>
    <tr>
    <th></th>
    <th class="product-name">Product</th>
    <th class="product-price">Price</th>
    <th class="product-quantity">Quantity</th>
    <th class="product-total">Total</th>
    </tr>
    </thead>
    <tbody>
    <tr>
    <td><i class="fa fa-times"></i></td>
    <td class="cart_item">
    <span class="product-thumbnail">
    <img src="images/gallery/thumb1-1.jpg/index.html" alt="">
    </span>
    <span class="product-name">Parmigiani Fleurier</span>
    </td>
    <td><span class="rt-Price-amount"><span>$</span>35.00</span></td>
    <td>
    <span class="quantity-buttons">
    <input type="number" class="quantity-input" name="quantity" min="1" max="50" placeholder="No.">
    </span>
    </td>
    <td class="cart-subtotal">
    <span class="rt-Price-amount"><span>$</span>35.00</span>
    </td>
    </tr>
    <tr>
    <td colspan="6" class="actions">
    <div class="coupon">
    <label for="coupon_code">Coupon:</label>
    <input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="Coupon code">
    <button type="submit" class="btn btn-red" name="apply_coupon" value="Apply coupon">Apply coupon</button>
    <button type="submit" class="btn btn_red update_cart" name="update_cart" value="Update cart" disabled="">Update cart</button>
     </div>
    </td>
    </tr>
    </tbody>
    </table>
    </div>
    </div>
    <div class="checkout-order">
    <h4 class="mar-bottom-20">Cart Totals</h4>
    <div class="order-list">
    <table class="shop_table rt-checkout-review-order-table">
    <thead>
    <tr>
    <th class="product-name">Product</th>
    <th class="product-total">Total</th>
    </tr>
    </thead>
    <tbody>
    <tr class="cart_item">
    <td class="product-name">
    Hot water bag&nbsp; <strong class="product-quantity">× 1</strong> </td>
    <td class="product-total">
    <span class="rt-Price-amount"><span>$</span>35.00</span>
    </td>
    </tr>
    </tbody>
    <tfoot>
    <tr class="cart-subtotal">
    <th>Subtotal</th>
    <td><span class="rt-Price-amount"><span>$</span>35.00</span>
    </td>
    </tr>
    <tr class="rt-shipping-totals shipping">
    <th>Shipping</th>
    <td data-title="Shipping">
    Enter your address to view shipping options.
    </td>
    </tr>
    <tr class="order-total">
    <th>Total</th>
    <td><strong><span class="rt-Price-amount"><span>$</span>35.00</span></strong> </td>
    </tr>
    </tfoot>
    </table>
    </div>
    </div>
    <div class="checkout-place-order">
    <p class="mar-bottom-15">Your personal data will be used to process your order, support your experience throughout this website, and for other purposes described in our <a href="#">privacy policy</a>.
    </p>
    <a href="#" class="btn btn-orange">Proceed to Checkout</a>
    </div>
    </div>
    </div>
    </section>
@endsection