<!DOCTYPE html>
<html lang="en">


<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <title>Dream Social Network Toolkit</title>
    <link rel="icon" href="images/fav.png" type="image/png" sizes="16x16">

    <link rel="stylesheet" href="{{ asset('css/main.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/weather-icon.css') }}">
    <link rel="stylesheet" href="{{ asset('css/weather-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/color.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">


</head>
<style>
    .we-form {
        display: flex;
        flex-direction: column;
    }

    button {
        width: 100px;
        margin: auto;
    }
</style>

<body>
    <div class="www-layout">
        <section>
            <div class="gap no-gap signin whitish medium-opacity">
                <div class="bg-image" style="background-image:url({{asset('images/resources/theme-bg.jpg')}})"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="big-ad">
                                <figure><img src="{{asset('images/logo2.png')}}" alt=""></figure>
                                <h1>You want to retrieve your password</h1>
                                <p>
                                    Please create and remember!.
                                </p>


                                <div class="barcode">
                                    <figure><img src="{{asset('images/resources/Barcode.jpg')}}" alt=""></figure>
                                    <div class="app-download">
                                        <span>Download Mobile App and Scan QR Code to login</span>
                                        <ul class="colla-apps">
                                            <li><a title="" href="https://play.google.com/store?hl=en"><img
                                                        src="images/android.png" alt="">android</a></li>
                                            <li><a title="" href="https://www.apple.com/lae/ios/app-store/"><img
                                                        src="images/apple.png" alt="">iPhone</a></li>
                                            <li><a title="" href="https://www.microsoft.com/store/apps"><img
                                                        src="images/windows.png" alt="">Windows</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="we-login-register">
                                <div class="form-title">
                                    <i class="fa"></i>Reset your password
                                    <span> Enter your user account's verified email
                                        address and we will send you a password
                                        reset link.</span>
                                </div>
                                <form class="we-form" method="post" action="{{ route('password.email') }}">
                                    @csrf
                                    <input type="text" name="email" placeholder="Email">
                                    <button type="submit" data-ripple="">Verify</button>

                                </form>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>

    </div>

    <script src="js/main.min.js"></script>
    <script src="js/script.js"></script>
</body>

</html>