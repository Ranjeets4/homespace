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
                                <input type="text" value="{{ request()->search }}" name="search" >
                                <button type="submit">Search</button>
                            </div>
                            <table class="table">
                                  <thead>
                                    <tr>
                                      <th scope="col">#</th>
                                      <th scope="col">Title</th>
                                      <th scope="col">Short_Description</th>
                                      <th scope="col">Slug</th>
                                      <th scope="col">Status</th>
                                    </tr>
                                  </thead>
                                  <tbody>
								  @foreach($ptypes as $key=>$ptype)
                                    <tr>
                                      <th scope="row">{{$key+1}}</th>
                                      <td>{{$ptype->Title}}</td>
                                      <td>{{$ptype->short_Description}}</td>
                                      <td>{{$ptype->slug}}</td>
                                      <td><div class="dropdown">
                                          <button class="btn {{ $ptype->status==1?'btn-success' : 'btn-danger'}} dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                             {{ $ptype->status==1?'Active' : 'Not Active'}}
                                            <span class="caret"></span>
                                          </button>
                                          <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                             @php
                                              $value = $ptype->status==1 ? 0 : 1;
                                            @endphp
                                            <li><a href="{{url('admin/status-property-type/'.$ptype->id.'/'.$value)}}">{{ $ptype->status==1 ? 'Not active' : 'Active' }}</a></li>
                                            <li><a href="{{url('admin/add-property-type/'.$ptype->id)}}">Edit</a></li>
                                            <li><a href="{{url('admin/delete-property-type/'.$ptype->id)}}">Delete</a></li>
                                          </ul>
                                        </div></td>
                                    </tr>
                                   @endforeach
                                  </tbody>
                            </table>
                            {{$ptypes->links()}}
                        </div>
            </div></div>
            
            @include('admin/adminfooter')