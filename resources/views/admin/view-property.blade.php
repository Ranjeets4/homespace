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
                <div class="row" >
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title m-b-0">View {{ trans('language.property') }}</h5>
                                <input type="text" value="{{ request()->search }}" name="search" >
                                <button type="submit">Search</button>
                            </div>
							<div class="table-responsive">
                            <table class="table">
                                  <thead>
                                    <tr>
                                      <th scope="col">#</th>
                                      <th scope="col">Price</th>
                                      <th scope="col">Build Area</th>
                                      <th scope="col">Lot Area</th>
									                    <th scope="col">Property Agent</th>
                                      <th scope="col">Image</th>
                                      <th scope="col">Description</th>
                                      <th scope="col">Address</th>
                                      <th scope="col">State</th>
                                      <th scope="col">City</th>
                                      <th scope="col">Bedrooms</th>
                                      <th scope="col">Bathrooms</th>
                                      <th scope="col">Floor</th>
                                      <th scope="col">Kitchens</th>
									                    <th scope="col">Garages</th>
                    									<th scope="col">Location_Id</th>
                    									<th scope="col">Property_Type</th>
                    									<th scope="col">Property_Status</th>
                    									<th scope="col">property_Type_Status</th>
                    									<th scope="col">Status</th>
									  
                                    </tr>
                                  </thead>
                                  <tbody>
                                    @foreach($property as $key=>$properties)
                                    <tr>
                                      <td>{{$key+1}}</td>
                                      <td>{{$properties->price}}</td>
                                      <td>{{$properties->build_Area}}</td>
                                      <td>{{$properties->lot_area}}</td>
                                      <td>{{$properties->property_agent}}</td>
                                      <td>
                                        <img src="{{ url($properties->image) }}" width="100" height="50">
                                      </td>
                                      <td>{{$properties->description}}</td>
                                      <td>{{$properties->address}}</td>
                                      <td>{{$properties->state}}</td>
                                      <td>{{$properties->city}}</td>
                                      <td>{{$properties->bedroom}}</td>
                                      <td>{{$properties->bathroom}}</td>
                                      <td>{{$properties->floor}}</td>
                                      <td>{{$properties->kitchen}}</td>
                                      <td>{{$properties->garage}}</td>
                                      <td>{{$properties->location_id}}</td>
                                      <td>{{$properties->property_type}}</td>
                                      <td>{{$properties->propertystatus}}</td>
                                      <td>{{$properties->propertytypestatus}}</td>
                                     
                                      

                                      <td><div class="dropdown">
                                          <button class="btn {{$properties->status==1?'btn-success':'btn-danger'}} dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                            {{$properties->status==1?"Active":"Not Active"}}
                                            <span class="caret"></span>
                                          </button>
                                          @php
                                          $value=$properties->status==1?'0':'1';
                                          @endphp
                                          <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                            
                                            <li><a href="{{url('admin/status-property/'.$properties->id.'/'.$value)}}">{{$properties->status==1?"Not Active":"Active"}}</a></li>
                                            <li><a href="{{url('admin/add-property/'.$properties->id)}}">Edit</a></li>
                                            <li><a href="{{url('admin/delete-property/'.$properties->id)}}">Delete</a></li>
                                          </ul>
                                        </div></td>
                                    </tr>
                                    @endforeach
                                  </tbody>
                            </table>
                            {{ $property->links()}}
							</div>
                        </div>
            </div></div>
            
            @include('admin/adminfooter')