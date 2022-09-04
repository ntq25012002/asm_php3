@extends('admin.layouts.main')

@section('css')
    <link rel="stylesheet" href="{{asset('assets/css/pages/all_staff.css')}}">
@endsection

@section('content')
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="page-bar">
            <div class="page-title-breadcrumb">
                <div class=" pull-left">
                    <div class="page-title">Danh sách thiết bị</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="{{url('/admin')}}">Home</a>&nbsp;<i
                            class="fa fa-angle-right"></i>
                    </li>
                    </li>
                    <li class="active">Danh sách thiết bị</li>
                </ol>
            </div>
        </div>
        
        <div class="tab-content tab-space">
            <div class="tab-pane active show" id="tab1">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-box">
                            <div class="card-head">
                                <header>Danh sách slider</header>
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
                                            <a href="{{ route('slider.create') }}" class="btn btn-info">Thêm silder<i
                                                    class="fa fa-plus"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        {{-- <div class="d-flex d-inline-flex">
                                            <label for="" class="pt-1">Show:</label>
                                            <select name="" id="show_role" data-url="{{route('search')}}" class="form-control px-3 mx-2">
                                                <option value="">Tất cả vai trò</option>
                                                @foreach ($roles as $role)
                                                    <option value="{{$role->id}}">{{$role->name}}</option>
                                                @endforeach
                                            </select>
                                        </div> --}}
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        {{-- <form action="{{route('equipment.search')}}"> --}}
                                            <div class="d-flex d-inline-flex pull-right">
                                                <label for="" class="px-2 pt-1">Search:</label>
                                                <input type="text" name="keyword" id="keyword" data-url="{{route('equipment.search')}}"
                                                    class="form-control form-control-sm ">
                                                    {{-- <button type="submit" class="btn btn-info px-2">Tìm</button> --}}
                                            </div>
                                        {{-- </form> --}}
                                    </div>
                                </div>
                                <div class="table-scrollable">
                                    <table class="table table-hover table-checkable order-column full-width"
                                        id="example4">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <input type="checkbox" name="check_all" id="check_all">
                                                </th>
                                                <th  style="width:26%">Ảnh</th>
                                                <th class="center" data-sort_by="name" data-sort_type="desc" data-url="{{route('equipment.index')}}" id="name"> 
                                                    Tiêu đề
                                                    <span>
                                                        <i class="fa fa-sort sort-icon sort-icon-asc-and-desc active"></i>
                                                        <i class="fa fa-sort-asc sort-icon sort-icon-asc"></i>                                                  
                                                        <i class="fa fa-sort-desc sort-icon sort-icon-desc"></i> 
                                                    </span>                                                 
                                                </th>
                                                <th class="center">Mô tả</th>
                                                <th class="center"> Hành động </th>
                                            </tr>
                                        </thead>
                                        <tbody id="list_slider">
                                            @if (count($sliders) > 0)
                                                @foreach ($sliders as $silder)
                                                    <tr class="odd gradeX">
                                                        <td>
                                                            <input type="checkbox" name="slider{{$silder->id}}" >
                                                        </td>
                                                        <td class="" >
                                                            <img src="{{ asset($silder->image) }}" alt="" width="100%">
                                                        </td>
                                                        <td class="center">{{ $silder->title }}</td>
                                                        <td class="center">{{ $silder->description }}</td>
                                                        
                                                        <td class="center">
                                                            <a href=""
                                                                class="btn btn-tbl-edit btn-xs">
                                                                <i class="fa fa-pencil"></i>
                                                            </a>
                                                            <a href="" data-url="{{route('sliders.delete',['id'=>$silder->id])}}" data-title_silder = "{{$silder->title}}" class="btn btn-tbl-delete btn-xs btn-delete">
                                                                <i class="fa fa-trash-o "></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                
                                            @elseif (count($sliders) <= 0)
                                                <tr>
                                                    <td colspan="5" class="text-primary">Không có thiết bị nào</td>
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
                    {{-- {{$staffs->links()}} --}}
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection

@section('scripts')
	{{-- <script src="{{asset('assets/js/pages/staff/staff.js')}}"></script> --}}
<script>
    $(document).on('keyup','#keyword',function() {
        let keyword = $(this).val();
        let urlSearch =  $(this).data('url');
        console.log(keyword,urlSearch);
        console.log($('#list_staff'));
        $.ajax({
            type: 'get',
            url: urlSearch,
            data: {
                keyword: keyword,
            },
            dataType: 'json',
            success: function(response) {
                console.log( response);
                $('#list_staff').html(response)
            }
        })
    })
</script>
@endsection
