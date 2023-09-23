@extends('frontend.layouts.master')
@section('title', 'Check Out')
@section('content')

    <main id="main" class="site-main">
        <div class="page-title page-title--small align-left" style="background-image: url(images/bg/bg-checkout.png);">
            <div class="container">
                <div class="page-title__content">
                    <h1 class="page-title__name">Payment Successfully</h1>
                </div>
            </div>
        </div>
        <div class="row justify-content-md-center">
            <div class="col-md-6 mb-5">
                <?php if($data['status']=='success'){?>
                <div class="card text-center" style="background-color:green;color: white;text-align: center;">
                    <div class="card-header" style="color: white;">
                        Payment Success
                    </div>
                    <div class="card-body">
                        <h5 class="card-title" style="color: white;">Great</h5>
                        <p class="card-text">Congratulations! Your plan is now active. If you have any further questions or
                            need
                            assistance with anything else, feel free to ask.</p>
                        <a href="/" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
                <?php }else{ ?>
                <div class="card text-center" style="background-color:green">
                    <div class="card-header" style="color: white;">
                        Payment Faild
                    </div>
                    <div class="card-body">
                        <h5 class="card-title" style="color: white;">Opps...</h5>
                        <p class="card-text">Your Payment successfully trafer Please retry this.</p>
                        <a href="/" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>

    </main><!-- .site-main -->


@endsection
