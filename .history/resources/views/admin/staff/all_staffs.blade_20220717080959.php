@extends('admin.layouts.main')

@section('content')
<div class="page-content-wrapper">
	<div class="page-content">
		<div class="page-bar">
			<div class="page-title-breadcrumb">
				<div class=" pull-left">
					<div class="page-title">All Staffs</div>
				</div>
				<ol class="breadcrumb page-breadcrumb pull-right">
					<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
							href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li><a class="parent-item" href="#">Staffs</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li class="active">All Staffs</li>
				</ol>
			</div>
		</div>
		<ul class="nav nav-pills nav-pills-rose">
			<li class="nav-item tab-all"><a class="nav-link active show" href="#tab1" data-bs-toggle="tab">List View</a></li>
			<li class="nav-item tab-all"><a class="nav-link" href="#tab2" data-bs-toggle="tab">Grid View</a>
			</li>
		</ul>
		<div class="tab-content tab-space">
			<div class="tab-pane active show" id="tab1">
				<div class="row">
					<div class="col-md-12">
						<div class="card-box">
							<div class="card-head">
								<header>Danh sách nhân viên</header>
								<button id="panel-button"
									class="mdl-button mdl-js-button mdl-button--icon pull-right"
									data-upgraded=",MaterialButton">
									<i class="material-icons">more_vert</i>
								</button>
								<ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
									data-mdl-for="panel-button">
									<li class="mdl-menu__item"><i
											class="material-icons">assistant_photo</i>Action</li>
									<li class="mdl-menu__item"><i class="material-icons">print</i>Another
										action</li>
									<li class="mdl-menu__item"><i
											class="material-icons">favorite</i>Something else here</li>
								</ul>
							</div>
							<div class="card-body ">
								<div class="row p-b-20 ">
									<div class="col-md-6 col-sm-6 col-6">
										<div class="btn-group">
											<a href="{{route('staff.create')}}" class="btn btn-info">Thêm nhân viên <i class="fa fa-plus"></i></a>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12 col-md-6">
										<div class="d-flex d-inline-flex">
											<label for="" class="pt-1">Show:</label>
											<select name="" id="" class="form-control px-5 mx-2">
												<option value="10">10</option>
												<option value="15">15</option>
												<option value="20">20</option>
												<option value="25">25</option>
											</select>
										</div>
									</div>
									<div class="col-sm-12 col-md-6">
										<div class="d-flex d-inline-flex pull-right">
											<label for="" class="px-2 pt-1">Search:</label>
											<input type="text" name="search" id="" class="form-control form-control-sm " >
										</div>
									</div>
								</div>
								<div class="table-scrollable">
									<table class="table table-hover table-checkable order-column full-width"
										id="example4">
										<thead>
											<tr>
												<th>Ảnh đại diện</th>
												<th class="center"> Họ tên </th>
												<th class="center"> Vai trò </th>
												<th class="center"> Số điện thoại </th>
												<th class="center"> Email </th>
												<th class="center"> Địa chỉ </th>
												<th class="center"> Ngày tham gia </th>
												<th class="center"> Hành động </th>
											</tr>
										</thead>
										<tbody>
											@foreach ($staffs as $staff)
												<tr class="odd gradeX">
													<td class="user-circle-img sorting_1">
														<img src="{{asset($staff->avatar)}}" alt="">
													</td>
													<td class="center">{{$staff->name}}</td>
													<td class="center">{{$staff->role->name}}</td>
													<td class="center">
														<a href="tel:{{'0'. $staff->phone_number}}">
														{{'0'.$staff->phone_number}} </a>
													</td>
													<td class="center">
														<a href="mailto:{{$staff->email}}">
														{{$staff->email}}</a>
													</td>
													<td class="center">{{$staff->address}}</td>
													<td class="center">{{$staff->created_at->format('d/m/Y ')}}</td>
													<td class="center">
														<a href="{{route('staff.edit',['id'=>$staff->id])}}"
															class="btn btn-tbl-edit btn-xs">
															<i class="fa fa-pencil"></i>
														</a>
														<a class="btn btn-tbl-delete btn-xs">
															<i class="fa fa-trash-o "></i>
														</a>
													</td>
												</tr>
												
											@endforeach
											{{-- <tr class="odd gradeX">
												<td class="user-circle-img sorting_1">
													<img src="{{asset('assets/img/user/user10.jpg')}}" alt="">
												</td>
												<td class="center">Pooja Patel</td>
												<td class="center">Manager</td>
												<td class="center"><a href="tel:444786876">
														444786876 </a></td>
												<td class="center"><a href="mailto:shuxer@gmail.com">
														pooja@gmail.com </a></td>
												<td class="center">22,tilak appt. surat</td>
												<td class="center">27 Aug 2005</td>
												<td class="center">
													<a href="{{route('staff.edit')}}"
														class="btn btn-tbl-edit btn-xs">
														<i class="fa fa-pencil"></i>
													</a>
													<a class="btn btn-tbl-delete btn-xs">
														<i class="fa fa-trash-o "></i>
													</a>
												</td>
											</tr>
											<tr class="odd gradeX">
												<td class="user-circle-img sorting_1">
													<img src="{{asset('assets/img/user/user2.jpg')}}" alt="">
												</td>
												<td class="center">Sarah Smith</td>
												<td class="center">Manager</td>
												<td class="center"><a href="tel:44455546456">
														44455546456 </a></td>
												<td class="center"><a href="mailto:shuxer@gmail.com">
														sarah@gmail.com </a></td>
												<td class="center">22,tilak appt. surat</td>
												<td class="center">05 Jun 2011</td>
												<td class="center">
													<a href="edit_staff.html"
														class="btn btn-tbl-edit btn-xs">
														<i class="fa fa-pencil"></i>
													</a>
													<a class="btn btn-tbl-delete btn-xs">
														<i class="fa fa-trash-o "></i>
													</a>
												</td>
											</tr>
											<tr class="odd gradeX">
												<td class="user-circle-img sorting_1">
													<img src="assets/img/user/user3.jpg" alt="">
												</td>
												<td class="center">John Deo</td>
												<td class="center">Dishwasher</td>
												<td class="center"><a href="tel:444543564">
														444543564 </a></td>
												<td class="center"><a href="mailto:shuxer@gmail.com">
														john@gmail.com </a></td>
												<td class="center">22,tilak appt. surat</td>
												<td class="center">15 Feb 2012</td>
												<td class="center">
													<a href="edit_staff.html"
														class="btn btn-tbl-edit btn-xs">
														<i class="fa fa-pencil"></i>
													</a>
													<a class="btn btn-tbl-delete btn-xs">
														<i class="fa fa-trash-o "></i>
													</a>
												</td>
											</tr>
											<tr class="odd gradeX">
												<td class="user-circle-img sorting_1">
													<img src="assets/img/user/user4.jpg" alt="">
												</td>
												<td class="center">Jay Soni</td>
												<td class="center">Purchase Officer</td>
												<td class="center"><a href="tel:444543564">
														444543564 </a></td>
												<td class="center"><a href="mailto:shuxer@gmail.com">
														kenh@gmail.com </a></td>
												<td class="center">22,tilak appt. surat</td>
												<td class="center">12 Nov 2012</td>
												<td class="center">
													<a href="edit_staff.html"
														class="btn btn-tbl-edit btn-xs">
														<i class="fa fa-pencil"></i>
													</a>
													<a class="btn btn-tbl-delete btn-xs">
														<i class="fa fa-trash-o "></i>
													</a>
												</td>
											</tr>
											<tr class="odd gradeX">
												<td class="user-circle-img sorting_1">
													<img src="assets/img/user/user5.jpg" alt="">
												</td>
												<td class="center">Jacob Ryan</td>
												<td class="center">Receptionist</td>
												<td class="center"><a href="tel:444543564">
														444543564 </a></td>
												<td class="center"><a href="mailto:shuxer@gmail.com">
														johnson@gmail.com </a></td>
												<td class="center">22,tilak appt. surat</td>
												<td class="center">03 Dec 2001</td>
												<td class="center">
													<a href="edit_staff.html"
														class="btn btn-tbl-edit btn-xs">
														<i class="fa fa-pencil"></i>
													</a>
													<a class="btn btn-tbl-delete btn-xs">
														<i class="fa fa-trash-o "></i>
													</a>
												</td>
											</tr>
											<tr class="odd gradeX">
												<td class="user-circle-img sorting_1">
													<img src="assets/img/user/user6.jpg" alt="">
												</td>
												<td class="center">Megha Trivedi</td>
												<td class="center">Manager</td>
												<td class="center"><a href="tel:444543564">
														444543564 </a></td>
												<td class="center"><a href="mailto:shuxer@gmail.com">
														megha@gmail.com </a></td>
												<td class="center">22,tilak appt. surat</td>
												<td class="center">17 Mar 2013</td>
												<td class="center">
													<a href="edit_staff.html"
														class="btn btn-tbl-edit btn-xs">
														<i class="fa fa-pencil"></i>
													</a>
													<a class="btn btn-tbl-delete btn-xs">
														<i class="fa fa-trash-o "></i>
													</a>
												</td>
											</tr>
											<tr class="odd gradeX">
												<td class="user-circle-img sorting_1">
													<img src="assets/img/user/user1.jpg" alt="">
												</td>
												<td class="center">Rajesh</td>
												<td class="center">Bar Staff</td>
												<td class="center"><a href="tel:4444565756">
														4444565756 </a></td>
												<td class="center"><a href="mailto:shuxer@gmail.com">
														rajesh@gmail.com </a></td>
												<td class="center">22,tilak appt. surat</td>
												<td class="center">22 Feb 2000</td>
												<td class="center">
													<a href="edit_staff.html"
														class="btn btn-tbl-edit btn-xs">
														<i class="fa fa-pencil"></i>
													</a>
													<a class="btn btn-tbl-delete btn-xs">
														<i class="fa fa-trash-o "></i>
													</a>
												</td>
											</tr>
											<tr class="odd gradeX">
												<td class="user-circle-img sorting_1">
													<img src="assets/img/user/user10.jpg" alt="">
												</td>
												<td class="center">Pooja Patel</td>
												<td class="center">Cook</td>
												<td class="center"><a href="tel:444786876">
														444786876 </a></td>
												<td class="center"><a href="mailto:shuxer@gmail.com">
														pooja@gmail.com </a></td>
												<td class="center">22,tilak appt. surat</td>
												<td class="center">27 Aug 2005</td>
												<td class="center">
													<a href="edit_staff.html"
														class="btn btn-tbl-edit btn-xs">
														<i class="fa fa-pencil"></i>
													</a>
													<a class="btn btn-tbl-delete btn-xs">
														<i class="fa fa-trash-o "></i>
													</a>
												</td>
											</tr>
											<tr class="odd gradeX">
												<td class="user-circle-img sorting_1">
													<img src="assets/img/user/user2.jpg" alt="">
												</td>
												<td class="center">Sarah Smith</td>
												<td class="center">Manager</td>
												<td class="center"><a href="tel:44455546456">
														44455546456 </a></td>
												<td class="center"><a href="mailto:shuxer@gmail.com">
														sarah@gmail.com </a></td>
												<td class="center">22,tilak appt. surat</td>
												<td class="center">05 Jun 2011</td>
												<td class="center">
													<a href="edit_staff.html"
														class="btn btn-tbl-edit btn-xs">
														<i class="fa fa-pencil"></i>
													</a>
													<a class="btn btn-tbl-delete btn-xs">
														<i class="fa fa-trash-o "></i>
													</a>
												</td>
											</tr>
											<tr class="odd gradeX">
												<td class="user-circle-img sorting_1">
													<img src="assets/img/user/user5.jpg" alt="">
												</td>
												<td class="center">Jacob Ryan</td>
												<td class="center">Receptionist</td>
												<td class="center"><a href="tel:444543564">
														444543564 </a></td>
												<td class="center"><a href="mailto:shuxer@gmail.com">
														johnson@gmail.com </a></td>
												<td class="center">22,tilak appt. surat</td>
												<td class="center">03 Dec 2001</td>
												<td class="center">
													<a href="edit_staff.html"
														class="btn btn-tbl-edit btn-xs">
														<i class="fa fa-pencil"></i>
													</a>
													<a class="btn btn-tbl-delete btn-xs">
														<i class="fa fa-trash-o "></i>
													</a>
												</td>
											</tr>
											<tr class="odd gradeX">
												<td class="user-circle-img sorting_1">
													<img src="assets/img/user/user6.jpg" alt="">
												</td>
												<td class="center">Megha Trivedi</td>
												<td class="center">Manager</td>
												<td class="center"><a href="tel:444543564">
														444543564 </a></td>
												<td class="center"><a href="mailto:shuxer@gmail.com">
														megha@gmail.com </a></td>
												<td class="center">22,tilak appt. surat</td>
												<td class="center">17 Mar 2013</td>
												<td class="center">
													<a href="edit_staff.html"
														class="btn btn-tbl-edit btn-xs">
														<i class="fa fa-pencil"></i>
													</a>
													<a class="btn btn-tbl-delete btn-xs">
														<i class="fa fa-trash-o "></i>
													</a>
												</td>
											</tr>
											<tr class="odd gradeX">
												<td class="user-circle-img sorting_1">
													<img src="assets/img/user/user1.jpg" alt="">
												</td>
												<td class="center">Rajesh</td>
												<td class="center">Bar Staff</td>
												<td class="center"><a href="tel:4444565756">
														4444565756 </a></td>
												<td class="center"><a href="mailto:shuxer@gmail.com">
														rajesh@gmail.com </a></td>
												<td class="center">22,tilak appt. surat</td>
												<td class="center">22 Feb 2000</td>
												<td class="center">
													<a href="edit_staff.html"
														class="btn btn-tbl-edit btn-xs">
														<i class="fa fa-pencil"></i>
													</a>
													<a class="btn btn-tbl-delete btn-xs">
														<i class="fa fa-trash-o "></i>
													</a>
												</td>
											</tr>
											<tr class="odd gradeX">
												<td class="user-circle-img sorting_1">
													<img src="assets/img/user/user10.jpg" alt="">
												</td>
												<td class="center">Pooja Patel</td>
												<td class="center">Cook</td>
												<td class="center"><a href="tel:444786876">
														444786876 </a></td>
												<td class="center"><a href="mailto:shuxer@gmail.com">
														pooja@gmail.com </a></td>
												<td class="center">22,tilak appt. surat</td>
												<td class="center">27 Aug 2005</td>
												<td class="center">
													<a href="edit_staff.html"
														class="btn btn-tbl-edit btn-xs">
														<i class="fa fa-pencil"></i>
													</a>
													<a class="btn btn-tbl-delete btn-xs">
														<i class="fa fa-trash-o "></i>
													</a>
												</td>
											</tr>
											<tr class="odd gradeX">
												<td class="user-circle-img sorting_1">
													<img src="assets/img/user/user2.jpg" alt="">
												</td>
												<td class="center">Sarah Smith</td>
												<td class="center">Manager</td>
												<td class="center"><a href="tel:44455546456">
														44455546456 </a></td>
												<td class="center"><a href="mailto:shuxer@gmail.com">
														sarah@gmail.com </a></td>
												<td class="center">22,tilak appt. surat</td>
												<td class="center">05 Jun 2011</td>
												<td class="center">
													<a href="edit_staff.html"
														class="btn btn-tbl-edit btn-xs">
														<i class="fa fa-pencil"></i>
													</a>
													<a class="btn btn-tbl-delete btn-xs">
														<i class="fa fa-trash-o "></i>
													</a>
												</td>
											</tr> --}}
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="tab-pane" id="tab2">
				<div class="row">
					<div class="col-md-4">
						<div class="card">
							<div class="m-b-20">
								<div class="doctor-profile">
									<div class="profile-header bg-b-purple">
										<div class="user-name">Pooja Patel</div>
										<div class="name-center">General Manager</div>
									</div>
									<img src="assets/img/user/usrbig1.jpg" class="user-img" alt="">
									<p>
										A-103, shyam gokul flats, Mahatma Road <br />Mumbai
									</p>
									<div>
										<p>
											<i class="fa fa-phone"></i><a href="tel:(123)456-7890">
												(123)456-7890</a>
										</p>
									</div>
									<div class="profile-userbuttons">
										<a href="staff_profile.html"
											class="btn btn-circle deepPink-bgcolor btn-sm">Read
											More</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="card">
							<div class="m-b-20">
								<div class="doctor-profile">
									<div class="profile-header cyan-bgcolor">
										<div class="user-name">Smita Patil</div>
										<div class="name-center">Housekeeper</div>
									</div>
									<img src="{{asset('assets/img/user/usrbig2.jpg')}}" class="user-img" alt="">
									<p>
										45, Krishna Tower, Near Bus Stop, Satellite, <br />Ahmedabad
									</p>
									<div>
										<p>
											<i class="fa fa-phone"></i><a href="tel:(123)456-7890">
												(123)456-7890</a>
										</p>
									</div>
									<div class="profile-userbuttons">
										<a href="staff_profile.html"
											class="btn btn-circle deepPink-bgcolor btn-sm">Read
											More</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="card">
							<div class="m-b-20">
								<div class="doctor-profile">
									<div class="profile-header light-dark-bgcolor">
										<div class="user-name">John Smith</div>
										<div class="name-center">Cook</div>
									</div>
									<img src="{{asset('assets/img/user/usrbig3.jpg')}}" class="user-img" alt="">
									<p>
										456, Estern evenue, Courtage area, <br />New York
									</p>
									<div>
										<p>
											<i class="fa fa-phone"></i><a href="tel:(123)456-7890">
												(123)456-7890</a>
										</p>
									</div>
									<div class="profile-userbuttons">
										<a href="staff_profile.html"
											class="btn btn-circle deepPink-bgcolor btn-sm">Read
											More</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<div class="card">
							<div class="m-b-20">
								<div class="doctor-profile">
									<div class="profile-header bg-b-orange">
										<div class="user-name">Pooja Patel</div>
										<div class="name-center">General Manager</div>
									</div>
									<img src="{{asset('assets/img/user/usrbig4.jpg')}}" class="user-img" alt="">
									<p>
										A-103, shyam gokul flats, Mahatma Road <br />Mumbai
									</p>
									<div>
										<p>
											<i class="fa fa-phone"></i><a href="tel:(123)456-7890">
												(123)456-7890</a>
										</p>
									</div>
									<div class="profile-userbuttons">
										<a href="staff_profile.html"
											class="btn btn-circle deepPink-bgcolor btn-sm">Read
											More</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="card">
							<div class="m-b-20">
								<div class="doctor-profile">
									<div class="profile-header bg-b-green">
										<div class="user-name">Smita Patil</div>
										<div class="name-center">Housekeeper</div>
									</div>
									<img src="{{asset('assets/img/user/usrbig5.jpg')}}" class="user-img" alt="">
									<p>
										45, Krishna Tower, Near Bus Stop, Satellite, <br />Ahmedabad
									</p>
									<div>
										<p>
											<i class="fa fa-phone"></i><a href="tel:(123)456-7890">
												(123)456-7890</a>
										</p>
									</div>
									<div class="profile-userbuttons">
										<a href="staff_profile.html"
											class="btn btn-circle deepPink-bgcolor btn-sm">Read
											More</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="card">
							<div class="m-b-20">
								<div class="doctor-profile">
									<div class="profile-header bg-b-danger">
										<div class="user-name">John Smith</div>
										<div class="name-center">Cook</div>
									</div>
									<img src="{{asset('assets/img/user/usrbig6.jpg')}}" class="user-img" alt="">
									<p>
										456, Estern evenue, Courtage area, <br />New York
									</p>
									<div>
										<p>
											<i class="fa fa-phone"></i><a href="tel:(123)456-7890">
												(123)456-7890</a>
										</p>
									</div>
									<div class="profile-userbuttons">
										<a href="staff_profile.html"
											class="btn btn-circle deepPink-bgcolor btn-sm">Read
											More</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<div class="card">
							<div class="m-b-20">
								<div class="doctor-profile">
									<div class="profile-header bg-b-black">
										<div class="user-name">Pooja Patel</div>
										<div class="name-center">General Manager</div>
									</div>
									<img src="{{asset('assets/img/user/usrbig7.jpg')}}" class="user-img" alt="">
									<p>
										A-103, shyam gokul flats, Mahatma Road <br />Mumbai
									</p>
									<div>
										<p>
											<i class="fa fa-phone"></i><a href="tel:(123)456-7890">
												(123)456-7890</a>
										</p>
									</div>
									<div class="profile-userbuttons">
										<a href="staff_profile.html"
											class="btn btn-circle deepPink-bgcolor btn-sm">Read
											More</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="card">
							<div class="m-b-20">
								<div class="doctor-profile">
									<div class="profile-header bg-b-yellow">
										<div class="user-name">Smita Patil</div>
										<div class="name-center">Housekeeper</div>
									</div>
									<img src="{{asset('assets/img/user/usrbig8.jpg')}}" class="user-img" alt="">
									<p>
										45, Krishna Tower, Near Bus Stop, Satellite, <br />Ahmedabad
									</p>
									<div>
										<p>
											<i class="fa fa-phone"></i><a href="tel:(123)456-7890">
												(123)456-7890</a>
										</p>
									</div>
									<div class="profile-userbuttons">
										<a href="staff_profile.html"
											class="btn btn-circle deepPink-bgcolor btn-sm">Read
											More</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="card">
							<div class="m-b-20">
								<div class="doctor-profile">
									<div class="profile-header bg-b-pink">
										<div class="user-name">John Smith</div>
										<div class="name-center">Cook</div>
									</div>
									<img src="{{asset('assets/img/user/usrbig9.jpg')}}" class="user-img" alt="">
									<p>
										456, Estern evenue, Courtage area, <br />New York
									</p>
									<div>
										<p>
											<i class="fa fa-phone"></i><a href="tel:(123)456-7890">
												(123)456-7890</a>
										</p>
									</div>
									<div class="profile-userbuttons">
										<a href="staff_profile.html"
											class="btn btn-circle deepPink-bgcolor btn-sm">Read
											More</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('scripts')

@endsection