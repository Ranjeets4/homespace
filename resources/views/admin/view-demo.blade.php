@include('admin/adminheader')
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title m-b-0">Static Table</h5>
                            </div>
                            <table class="table">
                                  <thead>
                                    <tr>
                                      <th scope="col">#</th>
                                      <th scope="col">First</th>
                                      <th scope="col">Last</th>
                                      <th scope="col">Handle</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    @foreach($demos as $key => $demo)
									<tr>
                                      <th scope="row">{{ $key+1 }}</th>
                                      <td>{{ $demo->demo_name }}</td>
                                      <td>{{ $demo->demo_city }}</td>
                                      <td>{{ $demo->demo_checks }}</td>
                                    </tr>
									@endforeach
                                  </tbody>
                            </table>
                        </div>
            </div></div>
            
            @include('admin/adminfooter')