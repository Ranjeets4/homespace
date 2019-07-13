@include('header')

    <div class="site-blocks-cover inner-page-cover overlay" style="background-image: {{url('/public/images/hero_bg_2.jpg')}}" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">
          <div class="col-md-10">
            <h1 class="mb-2">Login</h1>
            <div><a href="{{url('/')}}">Home</a> <span class="mx-2 text-white">&bullet;</span> <strong class="text-white">Login</strong></div>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">
        <div class="row">
       
          <div class="col-md-12 col-lg-8 mb-5">
          
            
          
            <form method="Post" action="{{url('/login-check')}}" class="p-5 bg-white border">
              @csrf
              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname">Email</label>
                  <input type="text" id="fullname" name="email" class="form-control" placeholder="Email">
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname">Password</label>
                  <input type="password" id="fullname" name="password" class="form-control" placeholder="Password">
                </div>
              </div>
              <a style="color:black;" href="{{url('/login/googlepage')}}"><img src="{{url('/public/images/googlesignin.png')}}" height="100px" width="200px"></a><br>
              <div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" value="Login" class="btn btn-primary  py-2 px-4 rounded-0">
                </div>
              </div>

  
            </form>
          </div>

          
        </div>
      </div>
    </div>


    
    
@include('footer')
