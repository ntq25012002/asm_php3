@extends('client.layouts.main')

@section('content')
<section class="breadcrumb-outer">
    <div class="container">
        <div class="breadcrumb-content">
            <h2>Checkout</h2>
            <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{asset('home')}}">Trang chủ</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                </ul>
            </nav>
        </div>
    </div>
</section>
    
    
<section id="checkout-main" class="checkout-main section-padding">
    <div class="container">
    <div class="checkout-inner">
    <div class="checkout-coupon mar-bottom-30 white text-center">Have a coupon? <a href="#" class="showcoupon white">Click here to enter your code</a> </div>
    <div class="checkout-info">
    <h4 class="mar-bottom-20">Billing details</h4>
    <div class="row">
    <div class="col-sm-6 col-xs-12">
    <div class="checkout-billing">
    <form method="" target="">
    <div class="row">
    <div class="col-sm-6 col-xs-12">
    <div class="form-group">
    <label>First Name: <abbr class="required" title="required">*</abbr></label>
    <input type="text" name="" class="form-control">
    </div>
    </div>
    <div class="col-sm-6 col-xs-12">
    <div class="form-group">
    <label>Last Name: <abbr class="required" title="required">*</abbr></label>
    <input type="text" name="" class="form-control">
    </div>
    </div>
    <div class="col-xs-12">
    <div class="form-group">
    <label>Company Name (optional):</label>
    <input type="text" name="" class="form-control">
    </div>
    </div>
    <div class="col-xs-12">
    <div class="form-group">
    <label>Country: <abbr class="required" title="required">*</abbr></label>
    <select>
    <option>Argentina</option>
    <option>Bulgaria</option>
    <option>Canada</option>
    <option>Denmark</option>
    <option>Egypt</option>
     <option>Germany</option>
    <option>Hungary</option>
    </select>
    </div>
    </div>
    <div class="col-sm-6 col-xs-12">
    <div class="form-group">
    <label>Street Address: <abbr class="required" title="required">*</abbr></label>
    <input type="text" name="" class="form-control">
    </div>
    </div>
    <div class="col-sm-6 col-xs-12">
    <div class="form-group">
    <label>Town/City: <abbr class="required" title="required">*</abbr></label>
    <input type="text" name="" class="form-control">
    </div>
    </div>
    <div class="col-xs-12">
    <div class="form-group">
    <label>Postcode / ZIP (optional):</label>
    <input type="text" name="" class="form-control">
    </div>
    </div>
    </div>
    </form>
    </div>
    </div>
    <div class="col-sm-6 col-xs-12">
    <div class="row">
    <div class="col-xs-12">
    <div class="form-group">
    <label>Phone No.: <abbr class="required" title="required">*</abbr></label>
    <input type="text" name="" class="form-control">
    </div>
    </div>
    <div class="col-xs-12">
    <div class="form-group">
    <label>Email Address: <abbr class="required" title="required">*</abbr></label>
    <input type="text" name="" class="form-control">
    </div>
    </div>
    <div class="col-xs-12">
    <div class="form-group">
    <label>
    <input type="checkbox" name="">
    <span>Ship to a different address?</span>
    </label>
    </div>
    </div>
    <div class="col-xs-12">
    <div class="form-group">
    <label>Order notes (optional):</label>
    <textarea placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    <div class="checkout-order mar-top-15">
    <h4 class="mar-bottom-20">Order</h4>
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
    Blue Dress&nbsp; <strong class="product-quantity">× 1</strong>
    </td>
    <td class="product-total">
    <span class="rt-Price-amount"><span>$</span>329.00</span>
    </td>
    </tr>
    </tbody>
    <tfoot>
    <tr class="cart-subtotal">
    <th>Subtotal</th>
    <td><span class="rt-Price-amount"><span>$</span>329.00</span>
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
    <td><strong><span class="rt-Price-amount"><span>$</span>329.00</span></strong> </td>
    </tr>
    </tfoot>
    </table>
    </div>
    </div>
    <div class="checkout-place-order mar-top-15">
    <p class="mar-bottom-15">Your personal data will be used to process your order, support your experience throughout this website, and for other purposes described in our <a href="#">privacy policy</a>.
    </p>
    <a class="btn btn-orange">Place order</a>
    </div>
    </div>
    </div>
</section>
    
@endsection