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
                                            Add New <i class="fa fa-plus"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="table-scrollable">
                                <table class="table table-hover table-checkable order-column full-width" id="example4">
                                    <thead>
                                        <tr>
                                            <th class="center"> img </th>
                                            <th class="center"> # </th>
                                            <th class="center"> Type </th>
                                            <th class="center"> AC/Non AC </th>
                                            <th class="center"> Meal </th>
                                            <th class="center"> Bad Capacity </th>
                                            <th class="center"> Phone </th>
                                            <th class="center"> Rent </th>
                                            <th class="center"> Action </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="odd gradeX">
                                            <td class="user-circle-img">
                                                <img src="{{asset('assets/img/user/user1.jpg')}}" alt="">
                                            </td>
                                            <td class="center">101</td>
                                            <td class="center">Single</td>
                                            <td class="center">AC</td>
                                            <td class="center">Free Dinner</td>
                                            <td class="center">2</td>
                                            <td class="center">123456789</td>
                                            <td class="center">25$</td>
                                            <td class="center">
                                                <a href="{{route('room.edit')}}" class="btn btn-tbl-edit btn-xs">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <a class="btn btn-tbl-delete btn-xs">
                                                    <i class="fa fa-trash-o "></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr class="odd gradeX">
                                            <td class="user-circle-img">
                                                <img src="{{asset('assets/img/user/user2.jpg')}}" alt="">
                                            </td>
                                            <td class="center">102</td>
                                            <td class="center">Double</td>
                                            <td class="center">Non AC</td>
                                            <td class="center">Free Lunch</td>
                                            <td class="center">3</td>
                                            <td class="center">123456789</td>
                                            <td class="center">35$</td>
                                            <td class="center">
                                                <a href="edit_room.html" class="btn btn-tbl-edit btn-xs">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <a class="btn btn-tbl-delete btn-xs">
                                                    <i class="fa fa-trash-o "></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr class="odd gradeX">
                                            <td class="user-circle-img">
                                                <img src="{{asset('assets/img/user/user3.jpg')}}" alt="">
                                            </td>
                                            <td class="center">103</td>
                                            <td class="center">King</td>
                                            <td class="center">AC</td>
                                            <td class="center">None</td>
                                            <td class="center">5</td>
                                            <td class="center">123456789</td>
                                            <td class="center">65$</td>
                                            <td class="center">
                                                <a href="edit_room.html" class="btn btn-tbl-edit btn-xs">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <a class="btn btn-tbl-delete btn-xs">
                                                    <i class="fa fa-trash-o "></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr class="odd gradeX">
                                            <td class="user-circle-img">
                                                <img src="{{asset('assets/img/user/user4.jpg')}}" alt="">
                                            </td>
                                            <td class="center">101</td>
                                            <td class="center">Single</td>
                                            <td class="center">AC</td>
                                            <td class="center">Free Dinner</td>
                                            <td class="center">2</td>
                                            <td class="center">123456789</td>
                                            <td class="center">25$</td>
                                            <td class="center">
                                                <a href="edit_room.html" class="btn btn-tbl-edit btn-xs">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <a class="btn btn-tbl-delete btn-xs">
                                                    <i class="fa fa-trash-o "></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr class="odd gradeX">
                                            <td class="user-circle-img">
                                                <img src="assets/img/user/user2.jpg" alt="">
                                            </td>
                                            <td class="center">102</td>
                                            <td class="center">Double</td>
                                            <td class="center">Non AC</td>
                                            <td class="center">Free Lunch</td>
                                            <td class="center">3</td>
                                            <td class="center">123456789</td>
                                            <td class="center">35$</td>
                                            <td class="center">
                                                <a href="edit_room.html" class="btn btn-tbl-edit btn-xs">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <a class="btn btn-tbl-delete btn-xs">
                                                    <i class="fa fa-trash-o "></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr class="odd gradeX">
                                            <td class="user-circle-img">
                                                <img src="assets/img/user/user3.jpg" alt="">
                                            </td>
                                            <td class="center">103</td>
                                            <td class="center">King</td>
                                            <td class="center">AC</td>
                                            <td class="center">None</td>
                                            <td class="center">5</td>
                                            <td class="center">123456789</td>
                                            <td class="center">65$</td>
                                            <td class="center">
                                                <a href="edit_room.html" class="btn btn-tbl-edit btn-xs">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <a class="btn btn-tbl-delete btn-xs">
                                                    <i class="fa fa-trash-o "></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr class="odd gradeX">
                                            <td class="user-circle-img">
                                                <img src="assets/img/user/user1.jpg" alt="">
                                            </td>
                                            <td class="center">101</td>
                                            <td class="center">Single</td>
                                            <td class="center">AC</td>
                                            <td class="center">Free Dinner</td>
                                            <td class="center">2</td>
                                            <td class="center">123456789</td>
                                            <td class="center">25$</td>
                                            <td class="center">
                                                <a href="edit_room.html" class="btn btn-tbl-edit btn-xs">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <a class="btn btn-tbl-delete btn-xs">
                                                    <i class="fa fa-trash-o "></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr class="odd gradeX">
                                            <td class="user-circle-img">
                                                <img src="assets/img/user/user2.jpg" alt="">
                                            </td>
                                            <td class="center">102</td>
                                            <td class="center">Double</td>
                                            <td class="center">Non AC</td>
                                            <td class="center">Free Lunch</td>
                                            <td class="center">3</td>
                                            <td class="center">123456789</td>
                                            <td class="center">35$</td>
                                            <td class="center">
                                                <a href="edit_room.html" class="btn btn-tbl-edit btn-xs">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <a class="btn btn-tbl-delete btn-xs">
                                                    <i class="fa fa-trash-o "></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr class="odd gradeX">
                                            <td class="user-circle-img">
                                                <img src="assets/img/user/user3.jpg" alt="">
                                            </td>
                                            <td class="center">103</td>
                                            <td class="center">King</td>
                                            <td class="center">AC</td>
                                            <td class="center">None</td>
                                            <td class="center">5</td>
                                            <td class="center">123456789</td>
                                            <td class="center">65$</td>
                                            <td class="center">
                                                <a href="edit_room.html" class="btn btn-tbl-edit btn-xs">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <a class="btn btn-tbl-delete btn-xs">
                                                    <i class="fa fa-trash-o "></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr class="odd gradeX">
                                            <td class="user-circle-img">
                                                <img src="assets/img/user/user1.jpg" alt="">
                                            </td>
                                            <td class="center">101</td>
                                            <td class="center">Single</td>
                                            <td class="center">AC</td>
                                            <td class="center">Free Dinner</td>
                                            <td class="center">2</td>
                                            <td class="center">123456789</td>
                                            <td class="center">25$</td>
                                            <td class="center">
                                                <a href="edit_room.html" class="btn btn-tbl-edit btn-xs">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <a class="btn btn-tbl-delete btn-xs">
                                                    <i class="fa fa-trash-o "></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr class="odd gradeX">
                                            <td class="user-circle-img">
                                                <img src="assets/img/user/user2.jpg" alt="">
                                            </td>
                                            <td class="center">102</td>
                                            <td class="center">Double</td>
                                            <td class="center">Non AC</td>
                                            <td class="center">Free Lunch</td>
                                            <td class="center">3</td>
                                            <td class="center">123456789</td>
                                            <td class="center">35$</td>
                                            <td class="center">
                                                <a href="edit_room.html" class="btn btn-tbl-edit btn-xs">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <a class="btn btn-tbl-delete btn-xs">
                                                    <i class="fa fa-trash-o "></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr class="odd gradeX">
                                            <td class="user-circle-img">
                                                <img src="assets/img/user/user3.jpg" alt="">
                                            </td>
                                            <td class="center">103</td>
                                            <td class="center">King</td>
                                            <td class="center">AC</td>
                                            <td class="center">None</td>
                                            <td class="center">5</td>
                                            <td class="center">123456789</td>
                                            <td class="center">65$</td>
                                            <td class="center">
                                                <a href="edit_room.html" class="btn btn-tbl-edit btn-xs">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <a class="btn btn-tbl-delete btn-xs">
                                                    <i class="fa fa-trash-o "></i>
                                                </a>
                                            </td>
                                        </tr>
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
