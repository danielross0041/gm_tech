<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <!-- START: Head-->
    <head>
        <meta charset="UTF-8" />
        <title>{{isset($title)?$title:'GM Tech'}}</title>
        <meta name="viewport" content="width=device-width,initial-scale=1" />
        @include('auth.problem_layouts.links')
        
        <!-- START: Template CSS-->
        
        <!-- END: Custom CSS-->
    </head>
    <!-- END Head-->

    <!-- START: Body-->

    <body id="main-container" class="default">
        
        <header class="login-header">
            <nav class="navbar navbar-expand-lg">
                <div class="container">
                    <a class="navbar-brand" href="#"><img src="{{asset('web/assets/img/logo-certificate.png')}}" class="img-fluid" alt="img" /></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <form class="d-flex">
                            <div class="mail-set">
                                <h5><i class="fas fa-envelope-open-text"></i></h5>
                                <h4><span>Online Support</span>info@gmenertech.com</h4>
                            </div>
                            <div class="mail-set">
                                <h5><i class="fas fa-phone-alt"></i></h5>
                                <h4><span>Free Contact</span>(516) 675-4345</h4>
                            </div>
                        </form>
                    </div>
                </div>
            </nav>
        </header>

        <main>
            <section class="login-main">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-8 col-xxl-8">
                            <div class="login-form-gm">
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    
                                    <div class="row">
                                        <div class="col-12 col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xxl-12">
                                            <div class="custom-input">
                                                <label for="emailaddress">{{ __('E-Mail Address') }}</label>
                                                <input id="emailaddress" placeholder="Enter your email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus />

                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xxl-12">
                                            <div class="custom-input">
                                                <label for="password">{{ __('Password') }}</label>

                                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Enter your password" />

                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <button>Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>

        @include('auth.problem_layouts.scripts')
        
    </body>
    <!-- END: Body-->
</html>
