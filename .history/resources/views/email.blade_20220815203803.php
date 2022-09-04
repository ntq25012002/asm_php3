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
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="table-scrollable">
                <table class="table table-hover table-checkable order-column full-width" id="example4">
                    <thead> 
                        <th style="text-align:center; color:green">Xác nhận đặt phòng khách sạn</th>
                    </thead>
                    <tbody id="list">
                        <tr class="odd gradeX">
                            <td >Họ tên:</td>
                            <td class="center">{{$emails['customer']['name']}}</td>
                        </tr>
                        <tr class="odd gradeX">
                            <td >Số điện thoại:</td>
                            <td class="center">{{$emails['customer']['phone']}}</td>
                        </tr>
                        <tr class="odd gradeX">
                            <td>Email:</td>
                            <td class="center">{{$emails['customer']['email']}}</td>
                        </tr>
                        <tr class="odd gradeX">
                            <td>Địa chỉ:</td>
                            <td class="center">{{$emails['customer']['address']}}</td>
                        </tr>
                        <tr class="odd gradeX">
                            <td >Mã:</td>
                            <td class="center">{{$emails['booking']['code']}}</td>
                        </tr>
                        
                        <tr class="odd gradeX">
                            <td >Ngày đi:</td>
                            <td class="center">{{date('d/m/Y', strtotime($emails['booking']['checkin']))}}</td>
                        </tr>
                        <tr class="odd gradeX">
                            <td >Ngày về:</td>
                            <td class="center">{{date('d/m/Y', strtotime($emails['booking']['checkout']))}}</td>
                        </tr>
                        <tr class="odd gradeX">
                            <td >Số đêm:</td>
                            <td class="center">{{$nights}}</td>
                        </tr>
                        <tr class="odd gradeX">
                            <td >Ghi chú:</td>
                            <td class="center">{{$emails['booking']['note']}}</td>
                        </tr>
                        <tr class="odd gradeX">
                            <th >Tổng tiền:</th>
                            <td class="center">{{number_format($emails['booking']['price'],'0',',','.')}}đ</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>