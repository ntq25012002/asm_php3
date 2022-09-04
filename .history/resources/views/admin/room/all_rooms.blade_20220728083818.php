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
                            <div class="table-scrollable">
                                <table class="table table-hover table-checkable order-column full-width" id="example4">
                                    <thead>
                                        <tr>
                                            <th class="center"> Ảnh </th>
                                            <th class="center"> # </th>
                                            <th class="center"> Loại phòng </th>
                                            <th class="center"> Diện tích </th>
                                            <th class="center"> Điều hòa </th>
                                            <th class="center"> Bữa ăn </th>
                                            <th class="center"> Chỗ chứa </th>
                                            <th class="center"> Số điện thoại </th>
                                            <th class="center"> Giá thuê/Đêm </th>
                                            <th class="center"> Trạng thái </th>
                                            <th class="center"> Hành động </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($rooms as $room)
                                            <tr class="odd gradeX">
                                                <td class="user-circle-img">
                                                    <img src="{{asset('assets/img/user/user1.jpg')}}" alt="">
                                                </td>
                                                <td class="center">{{$room->name}}</td>
                                                <td class="center">{{$room->roomType->name}}</td>
                                                <td class="center">{{$room->area}} <sup>m <sub>2</sub> </sup> </td>
                                                <td class="center">Có</td>
                                                <td class="center">Miễn phí ăn sáng</td>
                                                <td class="center">{{$room->roomType->adults + $room->roomType->children}}</td>
                                                <td class="center">{{ '0'. $room->phone}}</td>
                                                <td class="center">{{number_format($room->price,0,',','.')}}</td>
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
                                                    <a class="btn btn-tbl-delete btn-xs">
                                                        <i class="fa fa-trash-o "></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        
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

{{-- @section('script')
    <script src="{{asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/js/pages/table/table_data.js')}}"></script>

@endsection --}}
