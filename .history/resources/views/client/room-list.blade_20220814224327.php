@extends('client.layouts.main')

@section('css')
    <style>
        .btn-submit{
            background: #ffa801;
            color: #fff;
            border-radius: 0;
            font-size: 18px;
            padding: 8px 32px;
        }
        .btn-submit:hover {
            background-color: transparent;
            border: 1px solid #ffa801;
            color: #ffa801;
            transition: 0.3s linear;
        }
    </style>
@endsection

@section('content')
<section class="breadcrumb-outer">
    <div class="container">
        <div class="breadcrumb-content">
            <h2>Danh sách phòng</h2>
            <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Trang chủ</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Danh sách phòng</li>
                </ul>
            </nav>
        </div>
    </div>
</section>
    
    
<section class="room-list">
    <div class="container">
        <div class="list-filter">
            <form action=""  class="row">
                
                <div class="col-md-3 col-sm-4 col-xs-4">
                    <div class="table-item">
                        <div class="form-group">
                            <div class="date-range-inner-wrapper">
                                <input id="date-range2" name="checkin" class="form-control" placeholder="yyyy-mm-dd">
                                <span class="input-group-addon">
                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-4">
                    <div class="table-item">
                        <div class="form-group">
                            <div class="date-range-inner-wrapper">
                                <input id="date-range2" name="checkout" class="form-control" placeholder="yyyy-mm-dd">
                                <span class="input-group-addon">
                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 col-sm-4 col-xs-4">
                    <div class="form-group room-type">
                        <select name="room_type" class="selectpicker" data-width="100%" title="Loại phòng">
                            <option value="0" {{request()->room_type==0?'selected':''}}>Tất cả</option>
                            @foreach ($roomTypes as $item)
                                <option value="{{$item->id}}" {{request()->room_type==$item->id?'selected':''}}>{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-2 col-sm-4 col-xs-4">
                    <div class="form-group price">
                        <select name="price" class="selectpicker" data-width="100%" title="Giá">
                            <option value="0" {{request()->room_type==0?'selected':''}}>Tất cả</option>
                            <option value="0-500000" {{request()->price=='0-500000'?'selected':''}}>Dưới 500.000đ</option>
                            <option value="500000-999000" {{request()->price=='500000-999000'?'selected':''}}>500.000 - 999.000đ</option>
                            <option value="1000000-1499000" {{request()->price=='1000000-1499000'?'selected':''}}>1.000.000 - 1.499.000đ</option>
                            <option value="1500000-2000000" {{request()->price=='1500000-2000000'?'selected':''}}>1.500.000 - 2.000.000đ</option>
                            <option value="2000000" {{request()->price=='2000000'?'selected':''}}>Trên 2.000.000đ</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-2 col-sm-4 col-xs-4">
                    <div class="table-item">
                        <div class="form-btn">
                            <button type="submit" class="btn-submit">Lọc</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="list-content">

            <div class="row">
                @if(count($rooms) > 0)
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
                                    <ul>
                                        <li>
                                            <i class="fas fa-users"></i>
                                            <span>{{$room->roomType->adults}} Người lớn - {{$room->roomType->children}} Trẻ em</span>
                                        </li>
                                        <li><i class="fa fa-wifi" aria-hidden="true"></i> Wifi miễn phí</li>
                                    </ul>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum orci nulla, fermentum in faucibus a, interdum eu nibh.</p>
                                <div class="room-btns">
                                    <a href="{{route('room-detail',['id' => $room->id])}}" class="btn btn-black mar-right-10">CHI TIẾT</a>
                                    <a href="{{route('room-detail',['id' => $room->id])}}" class="btn btn-orange">ĐẶT NGAY</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @elseif(count($rooms) == 0)
                    <h4 class="text-center" style="color:#ffa801">
                        Không có phòng nào! 
                    </h4>
                @endif
            </div>
        </div>
        <div class="pagination-content text-center">
            {{-- {{dd($rooms->links())}} --}}
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