        @include('admin/adminheader')

		<div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            
            <div class="container-fluid">
                <form method="Post" action="{{url('admin/save-property/'.$property->id)}}" enctype="multipart/form-data">
                    {{csrf_field()}}
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Add Property</h5>
								<div class="form-group row">
                                    <label class="col-md-3" >Price</label>
                                    <div class="col-md-9">
                                        <input type="text"  name="price" value="{{$property->price}}" class="form-control" placeholder="Price">
                                    </div>
                                </div>
								<div class="form-group row">
                                    <label class="col-md-3" >Build Area</label>
                                    <div class="col-md-9">
                                        <input type="text"  name="build_area" value="{{$property->build_Area}}" class="form-control" placeholder="Build Area">
                                    </div>
                                </div>
								<div class="form-group row">
                                    <label class="col-md-3" >Lot Area</label>
                                    <div class="col-md-9">
                                        <input type="text"  name="lot_area" value="{{$property->lot_area}}" class="form-control" placeholder="Lot Area">
                                    </div>
                                </div>
								
								<div class="form-group row">
                                    <label class="col-md-3" >Description</label>
                                    <div class="col-md-9">
                                        <textarea class="form-control" name="description" cols="50" rows="5" placeholder="Short description">{{$property->description}}</textarea>
                                    </div>
                                </div>
								<div class="form-group row">
                                    <label class="col-md-3" >Address</label>
                                    <div class="col-md-9">
                                        <textarea class="form-control" name="address" cols="50" rows="5" placeholder="Short description"> {{$property->address}}</textarea>
                                    </div>
                                </div>
								 <div class="form-group row">
                                    <label class="col-md-3 m-t-15">State</label>
                                    <div class="col-md-9">
                                        <select class="select2 form-control custom-select" onchange="getLocations(this.value)" name="state"  style="width: 100%; height:36px;">
                                            <option value="">Select</option>
                                            
                                            
                                            @foreach($states as $key=>$states)
                                                <option value="{{$states->id}}" {{ $property->state==$properties->state ? 'selected' : '' }} >{{$states->name}}</option>
                                             @endforeach   
                                                
                                            
                                            
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 m-t-15">Location</label>
                                    <div class="col-md-9">
                                        <select id="locations" class="select2 form-control custom-select" name="city" style="width: 100%; height:36px;">
                                            <option>Select</option>
                                            @foreach($locations as $location)
                                            <option value="{{ $location->location_id }}" >{{ $location->location }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3">Property Status</label>
                                    <div class="col-md-9">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="customControlValidation1" name="propertystatus" value="rent " {{$property->propertystatus=='rent'?"Selected":""}} required>
                                            <label class="custom-control-label" for="customControlValidation1">&nbsp&nbsp &nbsp&nbsp Rent</label>
                                        </div>
                                         <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="customControlValidation2" name="propertystatus" value="sell" {{$property->propertystatus=='sell'?"Selected":""}} required>
                                            <label class="custom-control-label" for="customControlValidation2">&nbsp&nbsp &nbsp&nbsp Sell</label>
                                        </div>
                                         
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3">Property Type Status</label>
                                    <div class="col-md-9">
                                        <div class="custom-control custom-checkbox mr-sm-2">
                                            <input type="checkbox" class="custom-control-input" name="pts[]" value="new" id="customControlAutosizing1">
                                            <label class="custom-control-label" for="customControlAutosizing1">&nbsp&nbsp &nbsp&nbsp New</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mr-sm-2">
                                            <input type="checkbox" class="custom-control-input" name="pts[]" value="old" id="customControlAutosizing2">
                                            <label class="custom-control-label" for="customControlAutosizing2">&nbsp&nbsp &nbsp&nbsp Old</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mr-sm-2">
                                            <input type="checkbox" class="custom-control-input" name="pts[]" value="slider" id="customControlAutosizing3">
                                            <label class="custom-control-label" for="customControlAutosizing3">&nbsp&nbsp &nbsp&nbsp Slider</label>
                                        </div>
                                    </div>
                                </div>
								<div class="form-group row">
                                    <label class="col-md-3" >Bedrooms</label>
                                    <div class="col-md-9">
                                        <input type="number" min="0" name="bedrooms" value="{{$property->bedroom}}" class="form-control" placeholder="1">
                                    </div>
                                </div>
								<div class="form-group row">
                                    <label class="col-md-3" >Bathrooms</label>
                                    <div class="col-md-9">
                                        <input type="number" min="0" name="bathrooms" class="form-control" value="{{$property->bathroom}}" placeholder="1">
                                    </div>
                                </div>
								<div class="form-group row">
                                    <label class="col-md-3" >Floors</label>
                                    <div class="col-md-9">
                                        <input type="number"  min="0" name="floors" value="{{$property->floor}}" class="form-control" placeholder="1">
                                    </div>
                                </div>
								<div class="form-group row">
                                    <label class="col-md-3" >Kitchens</label>
                                    <div class="col-md-9">
                                        <input type="number" min="0" name="kitchens" value="{{$property->kitchen}}" class="form-control" placeholder="1">
                                    </div>
                                </div>
								<div class="form-group row">
                                    <label class="col-md-3" >Garages</label>
                                    <div class="col-md-9">
                                        <input type="number" min="0"s name="garages" value="{{$property->garage}}" class="form-control" placeholder="1">
                                    </div>
                                </div>
								<div class="form-group row">
                                    <label class="col-md-3 m-t-15">Property Type</label>
                                    <div class="col-md-9">
                                        <select id="propertytype" class="select2 form-control custom-select" name="ptypes" style="width: 100%; height:36px;">
                                            <option>Select</option>
                                            @foreach($ptypes as $ptype)
                                            <option value="{{ $ptype->slug }}" >{{ $ptype->Title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
								
                                <div class="form-group row">
                                    <label class="col-md-3">Upload Image</label>
                                    <div class="col-md-9">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="image" value="{{$property->iamge}}" id="validatedCustomFile" required>
                                            <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                                            <div class="invalid-feedback">Example invalid custom file feedback</div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="border-top">
                                <div class="card-body">
                                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                        </form>
                            </div>
            
            <footer class="footer text-center">
                All Rights Reserved by Matrix-admin. Designed and Developed by <a href="https://wrappixel.com">WrapPixel</a>.
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{ url('/public/admin/assets/libs/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ url('/public/admin/assets/libs/popper.js')}}/dist/umd/popper.min.js')}}"></script>
    <script src="{{ url('/public/admin/assets/libs/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{ url('/public/admin//assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js')}}"></script>
    <script src="{{ url('/public/admin/assets/extra-libs/sparkline/sparkline.js')}}"></script>
    <!--Wave Effects -->
    <script src="{{ url('/public/admin/dist/js/waves.js')}}"></script>
    <!--Menu sidebar -->
    <script src="{{ url('/public/admin/dist/js/sidebarmenu.js')}}"></script>
    <!--Custom JavaScript -->
    <script src="{{ url('/public/admin/dist/js/custom.min.js')}}"></script>
    <!-- This Page JS -->
    <script src="{{ url('/public/admin/assets/libs/inputmask/dist/min/jquery.inputmask.bundle.min.js')}}"></script>
    <script src="{{ url('/public/admin/dist/js/pages/mask/mask.init.js')}}"></script>
    <script src="{{ url('/public/admin/assets/libs/select2/dist/js/select2.full.min.js')}}"></script>
    <script src="{{ url('/public/admin/assets/libs/select2/dist/js/select2.min.js')}}"></script>
    <script src="{{ url('/public/admin/assets/libs/jquery-asColor/dist/jquery-asColor.min.js')}}"></script>
    <script src="{{ url('/public/admin/assets/libs/jquery-asGradient/dist/jquery-asGradient.js')}}"></script>
    <script src="{{ url('/public/admin/assets/libs/jquery-asColorPicker/dist/jquery-asColorPicker.min.js')}}"></script>
    <script src="{{ url('/public/admin/assets/libs/jquery-minicolors/jquery.minicolors.min.js')}}"></script>
    <script src="{{ url('/public/admin/assets/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{ url('/public/admin/assets/libs/quill/dist/quill.min.js')}}"></script>
    <script>
        //***********************************//
        // For select 2
        //***********************************//
        $(".select2").select2();

        /*colorpicker*/
        $('.demo').each(function() {
        //
        // Dear reader, it's actually very easy to initialize MiniColors. For example:
        //
        //  $(selector).minicolors();
        //
        // The way I've done it below is just for the demo, so don't get confused
        // by it. Also, data- attributes aren't supported at this time...they're
        // only used for this demo.
        //
        $(this).minicolors({
                control: $(this).attr('data-control') || 'hue',
                position: $(this).attr('data-position') || 'bottom left',

                change: function(value, opacity) {
                    if (!value) return;
                    if (opacity) value += ', ' + opacity;
                    if (typeof console === 'object') {
                        console.log(value);
                    }
                },
                theme: 'bootstrap'
            });

        });
        /*datwpicker*/
        jQuery('.mydatepicker').datepicker();
        jQuery('#datepicker-autoclose').datepicker({
            autoclose: true,
            todayHighlight: true
        });
        var quill = new Quill('#editor', {
            theme: 'snow'
        });

    </script>
<script type="text/javascript">
    function getLocations(id){
        $.ajax({
            url:"{{ url('/admin/get-location/') }}"+'/'+id,
            type:'get',
            success:function(res){
                if (res.status==1){
                    $('#locations').html(res.data);
                }
            }
        });
    }
</script>

</body>

</html>