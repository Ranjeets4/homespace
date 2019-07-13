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
                            <div class="card-body">
                              <form method="post" action="{{ url('admin/view-location') }}">
                                @csrf
                                <input type="text" value="{{ request()->search }}" name="search" >
                                <button type="submit">Search</button>
                              </form>
                            </div>
                            <table class="table">
                                  <thead>
                                    <tr>
                                      <th scope="col">#</th>
                                      <th scope="col">State Name</th>
                                      <th scope="col">Location</th>
                                      <th scope="col">Action</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    @foreach($locations as $key => $location)
									<tr>
                                      <th scope="row">{{ $key+1 }}</th>
                                      <td>{{ $location->name }}</td>
                                      <td>{{ $location->location }}</td>
                                      <td>
                                        <div class="dropdown">
                                          <button class="btn {{ $location->location_status==1 ? 'btn-success' : 'btn-danger' }} dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                            {{ $location->location_status==1 ? 'Active' : 'Deactive' }}
                                            <span class="caret"></span>
                                          </button>
                                          <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                            @php
                                              $value = $location->location_status==1 ? 0 : 1;
                                            @endphp
                                            <li><a href="{{ url('admin/status-location/'.$location->location_id.'/'.$value) }}">{{ $location->location_status==1 ? 'Deactive' : 'Active' }}</a></li>
                                            <li><a href="{{ url('/admin/add-location/'.$location->location_id) }}">Edit</a></li>
                                            <li><a href="#">Delete</a></li>
                                          </ul>
                                        </div>
                                      </td>
                                    </tr>
									@endforeach
                                  </tbody>
                            </table>
                            <div class="col-12" >
                                {{ $locations->links() }}
                            </div>
                        </div>
            </div></div>
            
            @include('admin/adminfooter')