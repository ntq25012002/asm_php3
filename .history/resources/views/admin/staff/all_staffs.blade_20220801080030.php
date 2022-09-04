@extends('admin.layouts.main')

@section('title')
    {{$title}}
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('assets/css/pages/all_staff.css')}}">
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
                    <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="{{url('/admin')}}">Home</a>&nbsp;<i
                            class="fa fa-angle-right"></i>
                    </li>
                    </li>
                    <li class="active">Danh sách nhân viên</li>
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
                                <header>Danh sách nhân viên</header>
                                <button id="panel-button" class="mdl-button mdl-js-button mdl-button--icon pull-right"
                                    data-upgraded=",MaterialButton">
                                    <i class="material-icons">more_vert</i>
                                </button>
                                <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
                                    data-mdl-for="panel-button">
                                    <li class="mdl-menu__item"><i class="material-icons">assistant_photo</i>Action</li>
                                    <li class="mdl-menu__item"><i class="material-icons">print</i>Another
                                        action</li>
                                    <li class="mdl-menu__item"><i class="material-icons">favorite</i>Something else here
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body ">
                                <div class="row p-b-20 ">
                                    <div class="col-md-6 col-sm-6 col-6">
                                        <div class="btn-group">
                                            <a href="{{ route('staff.create') }}" class="btn btn-info">Thêm nhân viên <i
                                                    class="fa fa-plus"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <div class="d-flex d-inline-flex">
                                            <label for="" class="pt-1">Show:</label>
                                            <select name="" id="show_role" data-url="{{route('staff.search')}}" class="form-control px-3 mx-2">
                                                <option value="">Tất cả vai trò</option>
                                                @foreach ($roles as $role)
                                                    <option value="{{$role->id}}">{{$role->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="d-flex d-inline-flex pull-right">
                                            <label for="" class="px-2 pt-1">Search:</label>
                                            <input type="text" name="search" id="keyword" data-url="{{route('staff.search')}}"
                                                class="form-control form-control-sm ">
                                        </div>
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
                                                <th  style="width:4%">Ảnh đại diện</th>
                                                <th class="center" data-sort_by="name" data-sort_type="desc" data-url="{{route('staff.search')}}" id="name"> 
                                                    Họ tên
                                                    <span>
                                                        <i class="fa fa-sort sort-icon sort-icon-asc-and-desc active"></i>
                                                        <i class="fa fa-sort-asc sort-icon sort-icon-asc"></i>                                                  
                                                        <i class="fa fa-sort-desc sort-icon sort-icon-desc"></i> 
                                                    </span>                                                 
                                                </th>
                                                <th class="center"> Vai trò </th>
                                                <th class="center"> Số điện thoại </th>
                                                <th class="center"> Email </th>
                                                <th class="center"> Địa chỉ </th>
                                                <th class="center" data-sort_by="created_at" data-sort_type="asc" data-url="{{route('staff.search')}}" id="joining_date"> 
                                                    Ngày tham gia 
                                                    <span>
                                                        <i class="fa fa-sort sort-icon-join sort-icon-join-asc-desc active"></i>
                                                        <i class="fa fa-sort-asc sort-icon-join sort-icon-join-asc"></i>                                                  
                                                        <i class="fa fa-sort-desc sort-icon-join sort-icon-join-desc"></i> 
                                                    </span>   
                                                </th>
                                                <th class="center"> Hành động </th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody id="list_staff">
                                            {{-- <form action="{{route('staff.delete-staffs')}}" method="get"> --}}
                                                @if (count($staffs) > 0)
                                                    @foreach ($staffs as $staff)
                                                        <tr class="odd gradeX">
                                                            {{-- <td>
                                                                {{ $loop->iteration}}
                                                            </td> --}}
                                                            <td>
                                                                <input type="checkbox" name="ids[]" value="{{$staff->id}}" >
                                                            </td>
                                                            <td class="user-circle-img sorting_1">
                                                                <img src="{{ asset($staff->avatar) }}" alt="" width="100%">
                                                            </td>
                                                            <td class="center">{{ $staff->name }}</td>
                                                            <td class="center">{{ $staff->role->name }}</td>
                                                            <td class="center">
                                                                <a href="tel:{{ '0' . $staff->phone_number }}">
                                                                    {{ '0' . $staff->phone_number }} </a>
                                                            </td>
                                                            <td class="center">
                                                                <a href="mailto:{{ $staff->email }}">
                                                                    {{ $staff->email }}</a>
                                                            </td>
                                                            <td class="center">{{ $staff->address }}</td>
                                                            <td class="center">{{ $staff->created_at->format('d/m/Y ') }}</td>
                                                            <td class="center">
                                                                <a href="{{ route('staff.edit', ['id' => $staff->id]) }}"
                                                                    class="btn btn-tbl-edit btn-xs">
                                                                    <i class="fa fa-pencil"></i>
                                                                </a>
                                                                <a  data-name_staff = "{{$staff->name}}" data-url="{{ route('staff.delete', ['id' => $staff->id])}}" class="btn btn-tbl-delete btn-xs btn-delete">
                                                                    <i class="fa fa-trash-o "></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    <a href="#" class="text-danger delete_btn">Xóa mục đã chọn</a>
                                                @elseif (count($staffs) == 0)
                                                    Không có nhân viên 
                                                @endif
                                                {{-- <tr>
                                                    <td>
                                                        <button type="submit" class="btn btn-danger">Xóa tất cả mục đã chọn</button>
                                                    </td>
                                                </tr> --}}
                                            {{-- </form> --}}
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    {{-- {{$staffs->links()}} --}}
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection

@section('scripts')
	<script src="{{asset('assets/js/pages/staff/staff.js')}}"></script>
    
    <script>
        const checkAll = document.querySelector('#check_all');
        const itemsCheckbox = document.querySelectorAll('input[name="ids[]"]');
        const deleteBtn = document.querySelector('.delete_btn');
        itemsCheckbox.forEach(function(item) {
            item.onchange = function() {
                const checked = document.querySelectorAll('input[name="ids[]"]:checked')
                const isCheckedAll = checked.length === itemsCheckbox.length;
                const isDelete = checked.length === 0;
                if (isCheckedAll) {
                    checkAll.checked = isCheckedAll;
                }
                checkAll.checked = isCheckedAll;

                if (isDelete) {
                    deleteBtn.disabled = isDelete;
                }
                deleteBtn.disabled = isDelete;

            }
        })
        checkAll.onchange = function() {
            if (checkAll.checked) {
                deleteBtn.disabled = false;
                itemsCheckbox.forEach(function(item) {
                    item.checked = true;
                })
            } else {
                deleteBtn.disabled = true;

                itemsCheckbox.forEach(function(item) {
                    item.checked = false;
                })
            }
        }
    </script>
@endsection
