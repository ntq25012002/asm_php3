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
        
    @foreach ($rooms as $room)
        <div class="col-md-4 col-sm-6 col-xs-6">
            <div class="room-item">
            <div class="room-image">
                <img src="{{asset('storage/room/feature-image/'.$room->feature_image)}}" alt="image">
            </div>
            <div class="room-content">
                <div class="room-title">
                    <h4>{{$room->roomType->name}}</h4>
                    <p class="price-ft"><i class="fa fa-tags"></i>{{number_format($room->price,'0',',','.')}} <span>/ Đêm</span></p>
                    
                </div>
                <div class="room-services mar-bottom-15">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <i class="fa fa-bed" aria-hidden="true"></i> 3 Bedrooms
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <i class="fa fa-wifi" aria-hidden="true"></i> Wifi
                        </div>
                    </div>
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum orci nulla, fermentum in faucibus a, interdum eu nibh.</p>
                <div class="room-btns">
                    <a href="#" class="btn btn-black mar-right-10">CHI TIẾT</a>
                    <a href="#" class="btn btn-orange">ĐẶT NGAY</a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
     </div>
    </div>
    <div class="pagination-content text-center">
        {{$rooms->links()}}
    {{-- <ul class="pagination">
        <li><a href="#"><i class="fa fa-angle-double-left" aria-hidden="true"></i></a></li>
        <li class="active"><a href="#">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i></a></li>
    </ul> --}}
    </div>
    </div>
    </section>
    
@endsection