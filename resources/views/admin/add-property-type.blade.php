        @include('admin/adminheader')

		<div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>      
                </div>
            @endif
            <div class="container-fluid">
                <form method="Post" action="{{ url('/admin/save-property-type/'.$ptype->id)}}">
					{{csrf_field()}}
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Add Property Types</h5>
                               
                                <div class="form-group row">
                                    <label class="col-md-3" >Title</label>
                                    <div class="col-md-9">
                                        <input type="text"  class="form-control" name="title" value="{{ $ptype->Title!='' ? $ptype->Title : old('title')  }}" placeholder="Title">
                                    </div>
                                    <!-- <div class="text-danger">
                                        {{ $errors->first('title') }}
                                    </div> -->
                                </div>
								<div class="form-group row">
                                    <label class="col-md-3" >Short Description</label>
                                    <div class="col-md-9">
                                        <textarea class="form-control" name="short_description" cols="50" rows="5" placeholder="Short description">{{$ptype->short_Description}}</textarea>
                                    </div>
                                    <!-- <div class="text-danger">
                                        {{ $errors->first('short_description') }}
                                    </div> -->
                                </div>
								
                            </div>
                            <div class="border-top">
                                <div class="card-body">
                                    <button type="submit" class="btn btn-primary">Submit</button>
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
</body>

</html>