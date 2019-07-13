@include('admin/adminheader')

<div class="page-wrapper">
	<!-- ============================================================== -->
	<!-- Bread crumb and right sidebar toggle -->
	<!-- ============================================================== -->
	 <div class="page-breadcrumb">
		<div class="row">
			<div class="col-12 d-flex no-block align-items-center">
				<h4 class="page-title">{{session('homespace_admin_id')}}'s Dashboard</h4>
				<div class="ml-auto text-right">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item active" aria-current="page">Library</li>
						</ol>
					</nav>
				</div>
			</div>
		</div>
	</div>
	
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
			<div align="center"><font size="8px">Welcome {{session('homespace_admin_id')}}</font></div>
			<div align="center"><img src="{{ url('/public/images/person_4.jpg')}}"></div>
			</div>
		</div>
	</div>
</div>

@include('admin/adminfooter')
