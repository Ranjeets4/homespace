@include('header')
   <div class="site-blocks-cover inner-page-cover overlay" style="background-image: {{url('/public/images/hero_bg_2.jpg')}};" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">
          <div class="col-md-10">
            <h1 class="mb-2">Property Types  </h1>
            <div><a href="index.html">Home</a> <span class="mx-2 text-white">&bullet;</span> <strong class="text-white">properties</strong></div>
          </div>
        </div>
      </div>
    </div>

    <!-- <div class="pt-5">
      <div class="container">
        <form method="Post" action="{{url('/properties')}}" class="row mb-5">
            @csrf
          <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
            <div class="select-wrap">
              <span class="icon icon-arrow_drop_down"></span>
              <select name="offer-types" id="offer-types" class="form-control d-block rounded-0">
                <option value="">Lot Area</option>
               <option value="1000-2000">1000-2000</option>
                <option value="1000-2000">2000-3000</option>
                <option value="1000-2000">3000-4000</option>
                <option value="1000-2000">4000-5000</option>
                <option value="1000-2000">5000-6000</option>
                <option value="1000-2000">6000-7000</option>
              </select>
            </div>
          </div>
          <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
            <div class="select-wrap">
              <span class="icon icon-arrow_drop_down"></span>
              <select name="propertystatus" id="offer-types" class="form-control d-block rounded-0">
                
                
                <option value="">Property Type</option>
                
                <option value="sell" {{'sell'==$searchArr['propertystatus']?'selected':''}}>For Sell</option>
                <option value="rent" {{'rent'==$searchArr['propertystatus']?'selected':''}}>For Rent</option>

              </select>
            </div>
          </div>
          <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
            <div class="select-wrap">
              <span class="icon icon-arrow_drop_down"></span>
              <select name="state" id="state" class="form-control d-block rounded-0">
                <option value="">State </option>
                @foreach($state as $state)
                <option value="{{$state->id}}" {{ $state->id == $searchArr['state'] ? 'selected' : '' }} >{{$state->name}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
            <div class="select-wrap">
              <span class="icon icon-arrow_drop_down"></span>
              <select name="location" id="offer-types" class="form-control d-block rounded-0">

                <option value="">Location</option>
                @foreach($location as $location)
                <option value="{{$location->location_id}}" {{ $location->location_id == $searchArr['address'] ? 'selected' : '' }} >{{$location->location}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
            <div class="select-wrap">
              <span class="icon icon-arrow_drop_down"></span>
              <select name="buil_area" id="offer-types" class="form-control d-block rounded-0">
                <option value="">Build Area</option>
               
                <option value="1000-2000">1000-2000</option>
                <option value="1000-2000">2000-3000</option>
                <option value="1000-2000">3000-4000</option>
                <option value="1000-2000">4000-5000</option>
                <option value="1000-2000">5000-6000</option>
                <option value="1000-2000">6000-7000</option>
                

               </select>
            </div>
          </div>
          <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
            <div class="select-wrap">
              <span class="icon icon-arrow_drop_down"></span>
              <select name="bedroom" id="offer-types" class="form-control d-block rounded-0">
                <option value="">Bedrooms</option>
                @for($i=1;$i<=5;$i++)
                <option value="{{ $i }}" {{ $i == $searchArr['bedroom'] ? 'selected' : '' }}>{{$i}}</option>
                @endfor
              </select>
            </div>
          </div>
            <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
            <div class="select-wrap">
              <span class="icon icon-arrow_drop_down"></span>
              <select name="offer-types" id="offer-types" class="form-control d-block rounded-0">
                <option value="">Bathrooms</option>
                @for($i=1;$i<=5;$i++)
                <option value="{{ $i }}" {{ $i == $searchArr['bathroom'] ? 'selected' : '' }}>{{$i}}</option>
                @endfor
              </select>
            </div>
          </div>
          <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
            <div class="mb-4">
              <div id="slider-range" class="border-primary"></div>
              <input type="text" name="text" id="amount" class="form-control border-0 pl-0 bg-white" disabled="" />
              <input type="text" name="price" id="price" class="form-control border-0 pl-0 bg-white" hidden/>
              
            </div>
          </div>
          <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
            <input type="submit" class="btn btn-primary btn-block form-control-same-height rounded-0" value="Search">
          </div>
          
        </form>

        
      </div>
    </div>--> 
    <div class="site-section site-section-sm bg-light">
      <div class="container">
        <div class="row mb-5">
          <div class="col-12">
            <div class="site-section-title">
              <h2>Properties</h2>
            </div>
          </div>
        </div>
        <?php
        // p($property);
        // echo '<pre>';
        // print_r($property);
        ?>
        <div class="row mb-5">
          @foreach($ptypedetails as $ptype)
            
          <div class="col-md-6 col-lg-4 mb-4">
            <a href="{{url('/property-details'.'/'.$ptype->id)}}" class="ptypep-entry d-block">
              <figure>
                <img src="{{ url($ptype->image)}}" height="350px" alt="Image" class="img-fluid">
              </figure>
              <div class="ptypep-text">
                <div class="inner">
                  <span class="price rounded">${{$ptype->price}}</span>
                  <h3 class="title">{{$ptype->description}}</h3>
                  <p class="location">{{$ptype->address}}</p>
                </div>
                <div class="p-more-info">
                  <div class="inner d-flex">
                    <div class="col">
                      <span>Area:</span>
                      <strong>{{$ptype->build_Area}}m<sup>2</sup></strong>
                    </div>
                    <div class="col">
                      <span>Beds:</span>
                      <strong>{{$ptype->bedroom}}</strong>
                    </div>
                    <div class="col">
                      <span>Baths:</span>
                      <strong>{{$ptype->bathroom}}</strong>
                    </div>
                    <div class="col">
                      <span>Garages:</span>
                      <strong>{{$ptype->garage}}</strong>
                    </div>
                  </div>
                </div>
              </div>
            </a>
          </div>
          @endforeach

        </div>
        <div class="row">
          <div class="col-md-12 text-center">
            
              
            
          </div>  
        </div>
        
      </div>
    </div>

    <div class="site-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-7 text-center mb-5">
            <div class="site-section-title">
              <h2>Our Services</h2>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6 col-lg-4 mb-4">
            <a href="#" class="service text-center border rounded">
              <span class="icon flaticon-house"></span>
              <h2 class="service-heading">Research Subburbs</h2>
              <p><span class="read-more">Learn More</span></p>
            </a>
          </div>
          <div class="col-md-6 col-lg-4 mb-4">
            <a href="#" class="service text-center border rounded">
              <span class="icon flaticon-sold"></span>
              <h2 class="service-heading">Sold Houses</h2>
              <p><span class="read-more">Learn More</span></p>
            </a>
          </div>
          <div class="col-md-6 col-lg-4 mb-4">
            <a href="#" class="service text-center border rounded">
              <span class="icon flaticon-camera"></span>
              <h2 class="service-heading">Security Priority</h2>
              <p><span class="read-more">Learn More</span></p>
            </a>
          </div>

          <div class="col-md-6 col-lg-4 mb-4">
            <a href="#" class="service text-center border rounded">
              <span class="icon flaticon-house"></span>
              <h2 class="service-heading">Research Subburbs</h2>
              <p><span class="read-more">Learn More</span></p>
            </a>
          </div>
          <div class="col-md-6 col-lg-4 mb-4">
            <a href="#" class="service text-center border rounded">
              <span class="icon flaticon-sold"></span>
              <h2 class="service-heading">Sold Houses</h2>
              <p><span class="read-more">Learn More</span></p>
            </a>
          </div>
          <div class="col-md-6 col-lg-4 mb-4">
            <a href="#" class="service text-center border rounded">
              <span class="icon flaticon-camera"></span>
              <h2 class="service-heading">Security Priority</h2>
              <p><span class="read-more">Learn More</span></p>
            </a>
          </div>
        </div>
      </div>
    </div>

    

    <div class="site-section site-section-sm bg-primary">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-8">
            <h2 class="text-white">Wide Range of Properties Just For You</h2>
            <p class="lead text-white-5">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
          </div>
          <div class="col-md-4 text-center">
            <a href="#" class="btn btn-outline-primary btn-block py-3 btn-lg">See Properties</a>
          </div>
        </div>
      </div>
    </div>
    

    @include('footer')
<script type="text/javascript">
        var siteSliderRange = function() {
        $( "#slider-range" ).slider({
          range: true,
          min: <?php echo $min ?>,
          max: <?php echo $max ?>,
          values: [ <?php echo empty($searchArr['minprice'])?$min:$searchArr['minprice'] ?>, <?php echo empty($searchArr['maxprice'])?$max:$searchArr['maxprice'] ?> ],
          slide: function( event, ui ) {
            $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
            $( "#price" ).val( ui.values[0] + "-" + ui.values[1] );
             
          }
        });
        $( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
          " - $" + $( "#slider-range" ).slider( "values", 1 ) );
        
        $( "#price" ).val($( "#slider-range" ).slider( "values", 0 ) +
          "-" + $( "#slider-range" ).slider( "values", 1 ) );
      };
    
      siteSliderRange();
    </script>