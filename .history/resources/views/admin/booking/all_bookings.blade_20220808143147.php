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
                                        <select name="payment" id="show_role" style="width:150px" class="form-control col-3  mx-2">
                                            <option value="" >--- Trạng thái ---</option>
                                            <option value="1" {{request()->payment==1?'selected':''}}>Đã thanh toán</option>
                                            <option value="2" {{request()->payment==2?'selected':''}}>Chưa thanh toán</option>
                                        </select>
                                        <div class="col-2 px-0">
                                            <input type="date" name="checkin" id="checkin" placeholder="checkin"
                                                value="{{request()->checkin}}"
                                                class="form-control form-control-sm ">
                                        </div>
                                        <div class="col-2 px-2">
                                            <input type="date" name="checkout" id="checkout" placeholder="checkout"
                                                value="{{request()->checkout}}"
                                                class="form-control form-control-sm ">
                                        </div>
                                        <div class="col-2 px-0">
                                            <input type="text" name="code" id="code"
                                                value="{{request()->code}}"
                                                class="form-control form-control-sm " placeholder="Tìm kiếm mã">
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
                                        {{-- <th class="center"> Khách hàng </th> --}}
                                        <th class="center"> Mã </th>
                                        <th class="center"> Phòng </th>
                                        <th class="center"> Checkin </th>
                                        <th class="center"> Checkout </th>
                                        <th class="center"> Thành tiền </th>
                                        <th class="center"> Trạng thái </th>
                                        <th class="center"> Ghi chú </th>
                                        <th class="center"> Hành động </th>
                                    </tr>
                                </thead>
                                <tbody id="list">
                                    @if(count($bookings) > 0)
                                        @foreach ($bookings as $booking)
                                            <tr class="odd gradeX">
                                                <td class="user-circle-img">
                                                    <input type="checkbox" name="ids[]" value="{{$booking->id}}" >
                                                </td>
                                                {{-- <td class="center">{{$booking->customer->name}}</td> --}}
                                                <td class="center">{{$booking->code}}</td>
                                                <td class="center">{{$booking->rooms->name}}</td>
                                                <td class="center">{{date_formart($booking->checkin,'d/m/Y')}}  </td>
                                                <td class="center">{{date_formart($booking->checkout,'d/m/Y')}} </td>
                                                <td class="center">{{number_format($booking->price,0,',','.')}} <span style="font-size:18px">₫ </span></td>
                                                <td class="center ">
                                                    @if ($booking->payment == 2)
                                                        <span class="btn btn-sm btn-default">Chưa thanh toán</span>
                                                    @else
                                                        <span class="btn btn-sm btn-success">Đã thanh toán</span>
                                                    @endif
                                                </td>
                                                <td class="center">{{$booking->note}}</td>

                                                <td class="center">
                                                    <a href="{{route('booking.edit',['id' => $booking->id])}}" class="btn btn-tbl-edit btn-xs">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                    <a class="btn btn-tbl-delete btn-xs btn-delete" data-url="{{route('booking.delete',['id' => $booking->id])}}" data-name="{{$booking->name}}">
                                                        <i class="fa fa-trash-o "></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        <a href="#" data-url="{{route('booking.delete-bookings')}}" class="text-danger delete_btn">Xóa mục đã chọn</a>
                                    @elseif(count($bookings)<=0)
                                        <tr>
                                            <td colspan="11" class="text-primary">
                                                Không có đơn đặt phòng nào
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
