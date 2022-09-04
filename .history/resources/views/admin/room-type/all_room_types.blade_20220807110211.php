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
                    @if(session('err'))
                        <div class="alert alert-danger" >
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
                                        <a href="{{route('room-type.create')}}" id="addRow" class="btn btn-info">
                                            Thêm loại phòng <i class="fa fa-plus"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <form action="" method="get">
                                        <div class="row pr-0">
                                            <div class="col-2 px-0">
                                                <input type="text" name="keyword" id="keyword"
                                                    value="{{request()->keyword}}"
                                                    class="form-control form-control-sm " placeholder="Từ khóa tìm kiếm ...">
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
                                            {{-- <td>ID</td> --}}
                                            <th class="center"> <input type="checkbox" name="check_all" id="check_all"> </th>
                                            <th class="center"> Loại </th>
                                            <th class="center"> Hình ảnh </th>
                                            <th class="center"> Thiết bị </th>
                                            <th class="center"> Người lớn </th>
                                            <th class="center"> Trẻ em </th>
                                            <th class="center"> Mô tả </th>
                                            <th class="center"> Hành động </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (count($roomTypes) > 0)
                                            @foreach ($roomTypes as $item)
                                                <tr class="odd gradeX">
                                                    {{-- <td>{{$item->id}}</td> --}}
                                                    <td class="center"> <input type="checkbox" name="ids[]" value="{{$item->id}}"> </td>
                                                    <td class="center" >{{$item->name}}</td>
                                                    <td class="center" width="15%">
                                                        <img src="{{asset($item->image)}}" alt="" width="100%">
                                                    </td>
                                                    <td class="center" width="12%">
                                                        @foreach ($item->equipments as $equipment)
                                                            {{-- {{$item}} --}}
                                                            <div>
                                                                {{$equipment->name}}
                                                                <span>( {{$equipment->pivot->quantity_equipment}} ) </span>
                                                            </div>
                                                        @endforeach
                                                    </td>
                                                    <td class="center">{{$item->adults}}</td>
                                                    <td class="center">{{$item->children}}</td>
                                                    <td class="center">{{$item->description}}</td>
                                                    <td class="center">
                                                        <a href="{{route('room-type.edit', ['id' => $item->id])}}" class="btn btn-tbl-edit btn-xs">
                                                            <i class="fa fa-pencil"></i>
                                                        </a>
                                                        <a data-url="{{route('room-type.delete', ['id' => $item->id])}}" data-name="{{$item->name}}" class="btn btn-tbl-delete btn-xs  btn-delete">
                                                            <i class="fa fa-trash-o "></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                
                                            @endforeach
                                            <a href="#" data-url="{{route('room-type.delete-room-types')}}" class="text-danger delete_btn">Xóa mục đã chọn</a>
                                        
                                        @elseif (count($roomTypes) <= 0) 
                                            <tr>
                                                <td colspan="8" class="center text-primary">Không có loại phòng nào</td>
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
