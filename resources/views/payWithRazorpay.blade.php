@include('header')
  <script src="{{ url('/public/js/jquery-3.3.1.min.js')}}"></script>
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            @if($message = Session::get('error'))
                <div class="alert alert-danger alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <strong>Error!</strong> {{ $message }}
                </div>
            @endif
            {!! Session::forget('error') !!}
            @if($message = Session::get('success'))
                <div class="alert alert-info alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <strong>Success!</strong> {{ $message }}
                </div>
            @endif
            {!! Session::forget('success') !!}
            <div class="panel panel-default">
                <div class="panel-heading">Pay With Razorpay</div>
                <?php $amt=$amount*100; 
                #ff7529
                ?>
                <div class="panel-body text-center">
                    <form action="{{url('payment'.'/'.$id)}}" method="POST" >
                        <!-- Note that the amount is in paise = 50 INR -->
                        <!--amount need to be in paisa-->
                        <script src="https://checkout.razorpay.com/v1/checkout.js"
                                data-key="{{ Config::get('custom.razor_key') }}"
                                data-amount={{$amt}}
                                data-buttontext="Pay {{$amount}} INR"
                                data-name="Homespace"
                                data-description="Order Value"
                                data-image="{{url('public/images/google.png')}}"
                                data-prefill.name="Ranjeet"
                                data-prefill.email="kr.ranjeetsingh4@gmail.com"
                                data-theme.color="#16769c">
                        </script>
                        <input type="hidden" name="_token" value="{!!csrf_token()!!}">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@include('footer')