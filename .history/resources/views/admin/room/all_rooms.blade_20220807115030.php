@extends('admin.layouts.main')

@section('content')
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="page-bar">
            <div class="page-title-breadcrumb">
                <div class=" pull-left">
                    <div class="page-title">Danh sách phòng</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.html">Home</a>&nbsp;<i
                            class="fa fa-angle-right"></i>
                    </li>
                    <li class="active">Danh sách phòng</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                @if(session('msg'))
						<div class="alert alert-success hidden">
							{{session('msg')}}
						</div>
					@endif

					@if(session('err'))
						<div class="alert alert-danger">
							{{session('err')}}
						</div>
					@endif
                <div class="card card-box">
                    <div class="card-head">
                        <header>Danh sách các phòng</header>
                        <div class="tools">
                            <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
                            <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                            <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                        </div>
                    </div>
                    <div class="card-body ">
                        <div class="row p-b-20">
                            <div class="col-md-6 col-sm-6 col-6">
                                <div class="btn-group">
                                    <a href="{{route('room.create')}}" id="addRow" class="btn btn-info">
                                        Thêm phòng <i class="fa fa-plus"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <form action="" method="get">
                                    <div class="row pr-0">
                                        <select name="status" id="show_role" style="width:150px" class="form-control col-3  mx-2">
                                            <option value="" >--- Trạng thái ---</option>
                                            <option value="1" {{request()->status==1?'selected':''}}>Hoạt động</option>
                                            <option value="2" {{request()->status==2?'selected':''}}>Bảo trì</option>
                                        </select>
                                        <select name="room_type" id="show_role" style="width:150px" class="form-control col-3 ">
                                            <option value="">--- Loại phòng ---</option>
                                            @foreach ($roomTypes as $item)
                                                <option value="{{$item->id}}" {{request()->room_type==$item->id?'selected':''}}>{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                        <select name="price" id="show_role" style="width:180px" class="form-control col-4  mx-2">
                                            <option value="">--- Giá ---</option>
                                            <option value="0-500000" {{request()->price=='0-500000'?'selected':''}}>Dưới 500.000đ</option>
                                            <option value="500000-999000" {{request()->price=='500000-999000'?'selected':''}}>500.000 - 999.000đ</option>
                                            <option value="1000000-1499000" {{request()->price=='1000000-1499000'?'selected':''}}>1.000.000 - 1.499.000đ</option>
                                            <option value="1500000-2000000" {{request()->price=='1500000-2000000'?'selected':''}}>1.500.000 - 2.000.000đ</option>
                                            <option value="2000000" {{request()->price=='2000000'?'selected':''}}>Trên 2.000.000đ</option>
                                        </select>
                                        <div class="col-2 px-0">
                                            <input type="text" name="keyword" id="keyword"
                                                value="{{request()->keyword}}"
                                                class="form-control form-control-sm " placeholder="Từ khóa tìm kiếm">
                                        </div>
                                        
                                        <div class="col-2">
                                            <button type="submit" class="btn btn-info px-3">Tìm kiếm</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="table-scrollable">
                            <table class="table table-hover table-checkable order-column full-width" id="example4">
                                <thead>
                                    <tr>
                                        <th class="center"> 
                                            <input type="checkbox" name="check_all" id="check_all">    
                                        </th>
                                        <th class="center"> Phòng </th>
                                        <th class="center"> Loại phòng </th>
                                        <th class="center"> Diện tích ( m<sup>2</sup> ) </th>
                                        <th class="center"> Điều hòa </th>
                                        {{-- <th class="center"> Bữa ăn </th> --}}
                                        <th class="center"> Chỗ chứa </th>
                                        <th class="center"> Số điện thoại </th>
                                        <th class="center"> Giá / Đêm </th>
                                        <th class="center"> Trạng thái </th>
                                        <th class="center"> Hành động </th>
                                    </tr>
                                </thead>
                                <tbody id="list">
                                    @if(count($rooms) > 0)
                                        @foreach ($rooms as $room)
                                            <tr class="odd gradeX">
                                                <td class="user-circle-img">
                                                    <input type="checkbox" name="ids[]" value="{{$room->id}}" >
                                                </td>
                                                <td class="center">{{$room->name}}</td>
                                                <td class="center">{{$room->roomType->name}}</td>
                                                <td class="center">{{$room->area}}  </td>
                                                <td class="center">{{$room->air_condition == 0 ? 'Không' : 'Có'}}</td>
                                                {{-- <td class="center">Miễn phí ăn sáng</td> --}}
                                                <td class="center">{{$room->roomType->adults + $room->roomType->children}}</td>
                                                <td class="center">{{ '0'. $room->phone}}</td>
                                                <td class="center">{{number_format($room->price,0,',','.')}} <span style="font-size:18px">₫ </span></td>
                                                <td class="center ">
                                                    @if ($room->status == 1)
                                                        <span class="btn btn-sm btn-success">Hoạt động</span>
                                                    @else
                                                        <span class="btn btn-sm btn-default">Bảo trì</span>
                                                    @endif
                                                </td>
                                                <td class="center">
                                                    <a href="{{route('room.edit',['id' => $room->id])}}" class="btn btn-tbl-edit btn-xs">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                    <a class="btn btn-tbl-delete btn-xs btn-delete" data-url="{{route('room.delete',['id' => $room->id])}}" data-name="{{$room->name}}">
                                                        <i class="fa fa-trash-o "></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        <a href="#" data-url="{{route('room.delete-rooms')}}" class="text-danger delete_btn">Xóa mục đã chọn</a>
                                    @elseif(count($rooms)<=0)
                                        <tr>
                                            <td colspan="11" class="text-primary">
                                                Không có Phòng
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    {{-- <script src="{{asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/js/pages/table/table_data.js')}}"></script> --}}
    <script src="{{asset('assets/js/main.js')}}"></script>

@endsection
