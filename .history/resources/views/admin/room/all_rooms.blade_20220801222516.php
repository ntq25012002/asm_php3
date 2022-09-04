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
						<div class="alert alert-danger hidden">
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
                            <div class="col-sm-12 col-md-6">
                                <div class="d-flex d-inline-flex">
                                    <label for="" class="pt-1">Show:</label>
                                    <select name="" id="show_role" data-url="{{route('room.search')}}" class="form-control px-3 mx-2">
                                        <option value="">Tất cả loại phòng</option>
                                        @foreach ($roomTypes as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                    {{-- <select name="" id="show_role" data-url="{{route('room.search')}}" class="form-control px-3 mx-2">
                                        <option value="">Trạng thái</option>
                                        @foreach ($roles as $role)
                                            <option value="{{$role->id}}">{{$role->name}}</option>
                                            <option value="{{$role->id}}">{{$role->name}}</option>
                                        @endforeach
                                    </select> --}}
                                    <select name="status" data-url="{{route('room.search')}}" class="form-control px-3 mx-2">
                                        <option value="">Trạng thái</option>
                                        <option class="form-control form-control-sm px-2" value="1">Hoạt động</option>
                                        <option class="form-control form-control-sm px-2" value="0">Bảo trì</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="d-flex d-inline-flex pull-right">
                                    <label for="" class="px-2 pt-1">Tìm:</label>
                                    <input type="text" name="search" id="keyword" data-url="{{route('staff.search')}}"
                                        class="form-control form-control-sm ">
                                </div>
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
                                <tbody>
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
                                                    @elseif ($room->status == 0 ) 
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
                                    @elseif(count($room)<=0)
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
