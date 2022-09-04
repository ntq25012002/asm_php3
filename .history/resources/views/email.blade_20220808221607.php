@php
    $checkin = strtotime($emails['booking']->checkin);
    $checkout = strtotime($emails['booking']->checkout);
    $datediff = abs($checkin - $checkout);
    $nights = 1 + $datediff / (60*60*24);
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mail</title>
    <!-- icons -->
    <link href="{{asset('assets/plugins/simple-line-icons/simple-line-icons.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
    <!--bootstrap -->
    <link href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/plugins/summernote/summernote.css')}}" rel="stylesheet">
    <!-- morris chart -->
    <link href="{{asset('assets/plugins/morris/morris.css')}}" rel="stylesheet" type="text/css" />
    <!-- Material Design Lite CSS -->
    <link rel="stylesheet" href="{{asset('assets/plugins/material/material.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/material_style.css')}}">
    <!-- animation -->
    <link href="{{asset('assets/css/pages/animate_page.css')}}" rel="stylesheet">
    <!-- Template Styles -->
    <link href="{{asset('assets/css/plugins.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/responsive.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/theme-color.css')}}" rel="stylesheet" type="text/css" />
    <!-- favicon -->
    <link rel="shortcut icon" href="{{asset('assets/img/favicon.ico')}}" />
</head>
<body>
    <div class="table-scrollable">
        <h3>Thông tin đơn đặt phòng</h3>
        <table class="table table-hover table-checkable order-column full-width" id="example4">
            <thead>
                <tr>
                    <th class="center"> Thông tin đơn đặt phòng </th>
                </tr>
            </thead>
            <tbody id="list">
                <tr class="odd gradeX">
                    <td >Mã:</td>
                    <td class="center">{{$emails['booking']['code']}}</td>
                </tr>
                <tr class="odd gradeX">
                    <td >Ngày đi:</td>
                    <td class="center">{{$emails['booking']['name']}}</td>
                </tr>
                <tr class="odd gradeX">
                    <td >Ngày về:</td>
                    <td class="center">{{$emails['booking']['name']}}</td>
                </tr>
                <tr class="odd gradeX">
                    <td >Số đêm:</td>
                    <td class="center">{{$emails['booking']['name']}}</td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>