@extends('client.layouts.main')

@section('content')
<section class="breadcrumb-outer">
    <div class="container">
    <div class="breadcrumb-content">
    <h2>Room Grid</h2>
    <nav aria-label="breadcrumb">
    <ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Room Grid</li>
    </ul>
    </nav>
    </div>
    </div>
    </section>
    
    
    <section class="room-list">
    <div class="container">
    <div class="list-filter">
    <div class="row">
    <div class="col-md-3 col-sm-12 col-xs-12">
    <div class="filter-title">
    <p class="text-uppercase mar-top-10 mar-bottom-0">Filter Rooms by</p>
    </div>
    </div>
    <div class="col-md-3 col-sm-4 col-xs-4">
    <div class="form-group room-type">
    <select class="selectpicker" data-width="100%" title="Rooms Type">
    <option value="1">0</option>
    <option value="2">1</option>
    <option value="3">2</option>
    <option value="4">3</option>
    <option value="5">4</option>
    </select>
    </div>
    </div>
    <div class="col-md-3 col-sm-4 col-xs-4">
    <div class="form-group price">
    <select class="selectpicker" data-width="100%" title="Price">
    <option value="1">0</option>
    <option value="2">1</option>
    <option value="3">2</option>
    <option value="4">3</option>
    <option value="5">4</option>
    </select>
    </div>
    </div>
    <div class="col-md-3 col-sm-4 col-xs-4">
    <div class="form-group rating">
    <select class="selectpicker" data-width="100%" title="Rating">
    <option value="1">0</option>
    <option value="2">1</option>
    <option value="3">2</option>
    <option value="4">3</option>
    <option value="5">4</option>
    </select>
    </div>
    </div>
    </div>
    </div>
    <div class="list-content">
    <div class="row">
    <div class="col-md-4 col-sm-6 col-xs-6">
    <div class="room-item">
    <div class="room-image">
    <img src="images/room-list/list1.jpg" alt="image">
    </div>
    <div class="room-content">
    <div class="room-title">
     <h4>Royal Suite</h4>
    <p class="price-ft"><i class="fa fa-tags"></i> $2010 <span>/ per Night</span></p>
    <div class="deal-rating">
    <span class="fa fa-star checked"></span>
    <span class="fa fa-star checked"></span>
    <span class="fa fa-star checked"></span>
    <span class="fa fa-star checked"></span>
    <span class="fa fa-star checked"></span>
    </div>
    </div>
    <div class="room-services mar-bottom-15">
    <div class="row">
    <div class="col-md-6 col-sm-6 col-xs-6">
    <i class="fa fa-bed" aria-hidden="true"></i> 3 Bedrooms
    </div>
    <div class="col-md-6 col-sm-6 col-xs-6">
    <i class="fa fa-wifi" aria-hidden="true"></i> Quick Service
    </div>
    </div>
    </div>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum orci nulla, fermentum in faucibus a, interdum eu nibh.</p>
    <div class="room-btns">
    <a href="#" class="btn btn-black mar-right-10">VIEW DETAILS</a>
    <a href="#" class="btn btn-orange">BOOK NOW</a>
    </div>
    </div>
    </div>
    </div>
    <div class="col-md-4 col-sm-6 col-xs-6">
    <div class="room-item">
    <div class="room-image">
    <img src="images/room-list/list2.jpg" alt="image">
    </div>
    <div class="room-content">
    <div class="room-title">
    <h4>Deluxe Suite</h4>
    <p class="price-ft"><i class="fa fa-tags"></i> $1100 <span>/ per Night</span></p>
    <div class="deal-rating">
    <span class="fa fa-star checked"></span>
    <span class="fa fa-star checked"></span>
    <span class="fa fa-star checked"></span>
    <span class="fa fa-star checked"></span>
    <span class="fa fa-star checked"></span>
    </div>
    </div>
    <div class="room-services mar-bottom-15">
    <div class="row">
    <div class="col-md-6 col-sm-6 col-xs-6">
    <i class="fa fa-bed" aria-hidden="true"></i> 3 Bedrooms
    </div>
    <div class="col-md-6 col-sm-6 col-xs-6">
    <i class="fa fa-wifi" aria-hidden="true"></i> Quick Service
    </div>
    </div>
    </div>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum orci nulla, fermentum in faucibus a, interdum eu nibh.</p>
    <div class="room-btns">
    <a href="#" class="btn btn-black mar-right-10">VIEW DETAILS</a>
    <a href="#" class="btn btn-orange">BOOK NOW</a>
     </div>
    </div>
    </div>
    </div>
    <div class="col-md-4 col-sm-6 col-xs-6">
    <div class="room-item">
    <div class="room-image">
    <img src="images/room-list/list3.jpg" alt="image">
    </div>
    <div class="room-content">
    <div class="room-title">
    <h4>Villa Suite</h4>
    <p class="price-ft"><i class="fa fa-tags"></i> $1000 <span>/ per Night</span></p>
    <div class="deal-rating">
    <span class="fa fa-star checked"></span>
    <span class="fa fa-star checked"></span>
    <span class="fa fa-star checked"></span>
    <span class="fa fa-star checked"></span>
    <span class="fa fa-star checked"></span>
    </div>
    </div>
    <div class="room-services mar-bottom-15">
    <div class="row">
    <div class="col-md-6 col-sm-6 col-xs-6">
    <i class="fa fa-bed" aria-hidden="true"></i> 3 Bedrooms
    </div>
    <div class="col-md-6 col-sm-6 col-xs-6">
    <i class="fa fa-wifi" aria-hidden="true"></i> Quick Service
    </div>
    </div>
    </div>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum orci nulla, fermentum in faucibus a, interdum eu nibh.</p>
    <div class="room-btns">
    <a href="#" class="btn btn-black mar-right-10">VIEW DETAILS</a>
    <a href="#" class="btn btn-orange">BOOK NOW</a>
    </div>
    </div>
    </div>
    </div>
    <div class="col-md-4 col-sm-6 col-xs-6">
    <div class="room-item">
    <div class="room-image">
    <img src="images/room-list/list4.jpg" alt="image">
    </div>
    <div class="room-content">
    <div class="room-title">
    <h4>Terrace Suite</h4>
    <p class="price-ft"><i class="fa fa-tags"></i> $900 <span>/ per Night</span></p>
    <div class="deal-rating">
    <span class="fa fa-star checked"></span>
    <span class="fa fa-star checked"></span>
    <span class="fa fa-star checked"></span>
    <span class="fa fa-star checked"></span>
    <span class="fa fa-star checked"></span>
    </div>
    </div>
    <div class="room-services mar-bottom-15">
    <div class="row">
    <div class="col-md-6 col-sm-6 col-xs-6">
    <i class="fa fa-bed" aria-hidden="true"></i> 3 Bedrooms
    </div>
    <div class="col-md-6 col-sm-6 col-xs-6">
    <i class="fa fa-wifi" aria-hidden="true"></i> Quick Service
    </div>
    </div>
    </div>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum orci nulla, fermentum in faucibus a, interdum eu nibh.</p>
    <div class="room-btns">
    <a href="#" class="btn btn-black mar-right-10">VIEW DETAILS</a>
    <a href="#" class="btn btn-orange">BOOK NOW</a>
    </div>
    </div>
    </div>
    </div>
    <div class="col-md-4 col-sm-6 col-xs-6">
    <div class="room-item">
    <div class="room-image">
    <img src="images/room-list/list5.jpg" alt="image">
    </div>
    <div class="room-content">
    <div class="room-title">
    <h4>Penthouse Suite</h4>
    <p class="price-ft"><i class="fa fa-tags"></i> $800 <span>/ per Night</span></p>
    <div class="deal-rating">
    <span class="fa fa-star checked"></span>
    <span class="fa fa-star checked"></span>
    <span class="fa fa-star checked"></span>
    <span class="fa fa-star checked"></span>
    <span class="fa fa-star checked"></span>
    </div>
    </div>
    <div class="room-services mar-bottom-15">
    <div class="row">
    <div class="col-md-6 col-sm-6 col-xs-6">
    <i class="fa fa-bed" aria-hidden="true"></i> 3 Bedrooms
    </div>
    <div class="col-md-6 col-sm-6 col-xs-6">
    <i class="fa fa-wifi" aria-hidden="true"></i> Quick Service
    </div>
    </div>
    </div>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum orci nulla, fermentum in faucibus a, interdum eu nibh.</p>
    <div class="room-btns">
    <a href="#" class="btn btn-black mar-right-10">VIEW DETAILS</a>
    <a href="#" class="btn btn-orange">BOOK NOW</a>
    </div>
    </div>
    </div>
    </div>
    <div class="col-md-4 col-sm-6 col-xs-6">
    <div class="room-item">
    <div class="room-image">
    <img src="images/room-list/list6.jpg" alt="image">
    </div>
    <div class="room-content">
    <div class="room-title">
    <h4>Presidential Suite</h4>
    <p class="price-ft"><i class="fa fa-tags"></i> $700 <span>/ per Night</span></p>
    <div class="deal-rating">
    <span class="fa fa-star checked"></span>
    <span class="fa fa-star checked"></span>
    <span class="fa fa-star checked"></span>
    <span class="fa fa-star checked"></span>
    <span class="fa fa-star checked"></span>
    </div>
     </div>
    <div class="room-services mar-bottom-15">
    <div class="row">
    <div class="col-md-6 col-sm-6 col-xs-6">
    <i class="fa fa-bed" aria-hidden="true"></i> 3 Bedrooms
    </div>
    <div class="col-md-6 col-sm-6 col-xs-6">
    <i class="fa fa-wifi" aria-hidden="true"></i> Quick Service
    </div>
    </div>
    </div>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum orci nulla, fermentum in faucibus a, interdum eu nibh.</p>
    <div class="room-btns">
    <a href="#" class="btn btn-black mar-right-10">VIEW DETAILS</a>
    <a href="#" class="btn btn-orange">BOOK NOW</a>
    </div>
    </div>
    </div>
    </div>
    <div class="col-md-4 col-sm-6 col-xs-6">
    <div class="room-item">
    <div class="room-image">
    <img src="images/room-list/list7.jpg" alt="image">
    </div>
    <div class="room-content">
    <div class="room-title">
    <h4>Super Deluxe</h4>
    <p class="price-ft"><i class="fa fa-tags"></i> $600 <span>/ per Night</span></p>
    <div class="deal-rating">
    <span class="fa fa-star checked"></span>
    <span class="fa fa-star checked"></span>
    <span class="fa fa-star checked"></span>
    <span class="fa fa-star checked"></span>
    <span class="fa fa-star checked"></span>
    </div>
    </div>
    <div class="room-services mar-bottom-15">
    <div class="row">
    <div class="col-md-6 col-sm-6 col-xs-6">
    <i class="fa fa-bed" aria-hidden="true"></i> 3 Bedrooms
    </div>
    <div class="col-md-6 col-sm-6 col-xs-6">
    <i class="fa fa-wifi" aria-hidden="true"></i> Quick Service
    </div>
    </div>
    </div>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum orci nulla, fermentum in faucibus a, interdum eu nibh.</p>
    <div class="room-btns">
    <a href="#" class="btn btn-black mar-right-10">VIEW DETAILS</a>
    <a href="#" class="btn btn-orange">BOOK NOW</a>
    </div>
    </div>
    </div>
    </div>
    <div class="col-md-4 col-sm-6 col-xs-6">
    <div class="room-item">
    <div class="room-image">
    <img src="images/room-list/list8.jpg" alt="image">
    </div>
    <div class="room-content">
    <div class="room-title">
    <h4>Junior Suite</h4>
    <p class="price-ft"><i class="fa fa-tags"></i> $500 <span>/ per Night</span></p>
    <div class="deal-rating">
    <span class="fa fa-star checked"></span>
    <span class="fa fa-star checked"></span>
    <span class="fa fa-star checked"></span>
    <span class="fa fa-star checked"></span>
    <span class="fa fa-star checked"></span>
    </div>
    </div>
    <div class="room-services mar-bottom-15">
    <div class="row">
    <div class="col-md-6 col-sm-6 col-xs-6">
    <i class="fa fa-bed" aria-hidden="true"></i> 3 Bedrooms
    </div>
    <div class="col-md-6 col-sm-6 col-xs-6">
    <i class="fa fa-wifi" aria-hidden="true"></i> Quick Service
    </div>
    </div>
    </div>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum orci nulla, fermentum in faucibus a, interdum eu nibh.</p>
    <div class="room-btns">
    <a href="#" class="btn btn-black mar-right-10">VIEW DETAILS</a>
    <a href="#" class="btn btn-orange">BOOK NOW</a>
    </div>
    </div>
    </div>
    </div>
    <div class="col-md-4 col-sm-12 col-xs-12">
    <div class="room-item">
    <div class="room-image">
    <img src="images/room-list/list9.jpg" alt="image">
    </div>
    <div class="room-content">
    <div class="room-title">
    <h4>Executive Suite</h4>
    <p class="price-ft"><i class="fa fa-tags"></i> $400 <span>/ per Night</span></p>
    <div class="deal-rating">
    <span class="fa fa-star checked"></span>
    <span class="fa fa-star checked"></span>
    <span class="fa fa-star checked"></span>
    <span class="fa fa-star checked"></span>
    <span class="fa fa-star checked"></span>
    </div>
    </div>
    <div class="room-services mar-bottom-15">
    <div class="row">
    <div class="col-md-6 col-sm-6 col-xs-6">
    <i class="fa fa-bed" aria-hidden="true"></i> 3 Bedrooms
    </div>
    <div class="col-md-6 col-sm-6 col-xs-6">
    <i class="fa fa-wifi" aria-hidden="true"></i> Quick Service
    </div>
    </div>
    </div>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum orci nulla, fermentum in faucibus a, interdum eu nibh.</p>
    <div class="room-btns">
    <a href="#" class="btn btn-black mar-right-10">VIEW DETAILS</a>
    <a href="#" class="btn btn-orange">BOOK NOW</a>
    </div>
    </div>
    </div>
    </div>
     </div>
    </div>
    <div class="pagination-content text-center">
    <ul class="pagination">
    <li><a href="#"><i class="fa fa-angle-double-left" aria-hidden="true"></i></a></li>
    <li class="active"><a href="#">1</a></li>
    <li><a href="#">2</a></li>
    <li><a href="#">3</a></li>
    <li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i></a></li>
    </ul>
    </div>
    </div>
    </section>
    
@endsection