@extends('admin.layouts.main')

@section('title')
    {{$title}}
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('assets/css/pages/all_customer.css')}}">
@endsection

@section('content')
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="page-bar">
            <div class="page-title-breadcrumb">
                <div class=" pull-left">
                    <div class="page-title">{{$title}}</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="{{route('admin')}}">Home</a>&nbsp;<i
                            class="fa fa-angle-right"></i>
                    </li>
                    </li>
                    <li class="active">Danh sách khách hàng</li>
                </ol>
            </div>
        </div>
        {{-- <ul class="nav nav-pills nav-pills-rose">
            <li class="nav-item tab-all"><a class="nav-link active show" href="#tab1" data-bs-toggle="tab">List
                    View</a></li>
            <li class="nav-item tab-all"><a class="nav-link" href="#tab2" data-bs-toggle="tab">Grid View</a>
            </li>
        </ul> --}}
        <div class="tab-content tab-space">
            <div class="tab-pane active show" id="tab1">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-box">
                            <div class="card-head">
                                <header>Danh sách khách hàng</header>
                               
                            </div>
                            @if(session('err'))
                                <div class="alert alert-danger" >
                                    {{session('err')}}
                                </div>
                            @endif
                            <div class="card-body ">
                                <div class="row p-b-20 ">
                                    <div class="col-md-6 col-sm-6 col-6">
                                        {{-- <div class="btn-group">
                                            <a href="{{ route('customer.create') }}" class="btn btn-info">Thêm khách hàng <i
                                                    class="fa fa-plus"></i></a>
                                        </div> --}}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <form action="" method="get">
                                            <div class="row pr-0">
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
                                    <table class="table table-hover table-checkable order-column full-width"
                                        id="example4">
                                        <thead>
                                            <tr>
                                                {{-- <th>Số thứ tự</th> --}}
                                                <th>
                                                    <input type="checkbox" name="check_all" id="check_all">
                                                </th>
                                                <th class="center" data-sort_by="name" data-sort_type="desc"  id="name"> 
                                                    Họ tên
                                                </th>
                                                <th class="center"> Số điện thoại </th>
                                                <th class="center"> Email </th>
                                                <th class="center"> Địa chỉ </th>
                                                <th class="center" data-sort_by="created_at" data-sort_type="asc"  id="joining_date"> 
                                                    Ngày tham gia 
                                                   
                                                </th>
                                                <th class="center"> Hành động </th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody id="list_customer">
                                            {{-- <form action="{{route('customer.delete-customers')}}" method="get"> --}}
                                                @if (count($customers) > 0)
                                                    @foreach ($customers as $customer)
                                                        <tr class="odd gradeX">
                                                            {{-- <td>
                                                                {{ $loop->iteration}}
                                                            </td> --}}
                                                            <td>
                                                                <input type="checkbox" name="ids[]" value="{{$customer->id}}" >
                                                            </td>
                                                           
                                                            <td class="center">{{ $customer->name }}</td>
                                                            <td class="center">
                                                                <a href="tel:{{ '0' . $customer->phone }}">
                                                                    {{ '0' . $customer->phone }} </a>
                                                            </td>
                                                            <td class="center">
                                                                <a href="mailto:{{ $customer->email }}">
                                                                    {{ $customer->email }}</a>
                                                            </td>
                                                            <td class="center">{{ $customer->address }}</td>
                                                            <td class="center">{{ $customer->created_at->format('d/m/Y') }}</td>
                                                            <td class="center">
                                                                {{-- {{ route('customer.edit', ['id' => $customer->id]) }} --}}
                                                                <a href=""
                                                                    class="btn btn-tbl-edit btn-xs">
                                                                    <i class="fa fa-pencil"></i>
                                                                </a>
                                                                <a  data-name = "{{$customer->name}}" data-url="{{ route('customer.delete', ['id' => $customer->id])}}" class="btn btn-tbl-delete btn-xs btn-delete">
                                                                    <i class="fa fa-trash-o "></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    <a href="#" data-url="{{route('customer.delete-customers')}}" class="text-danger delete_btn">Xóa mục đã chọn</a>
                                                @elseif (count($customers) == 0)
                                                    <tr>
                                                        <td colspan="10" class="text-primary">Không có khách hàng</td>
                                                    </tr>
                                                @endif
                                              
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    {{-- {{$customers->links()}} --}}
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection

@section('scripts')
	<script src="{{asset('assets/js/pages/customer/customer.js')}}"></script>
    <script src="{{asset('assets/js/main.js')}}"></script>
    
@endsection
