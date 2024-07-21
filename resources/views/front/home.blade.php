@extends('front.master')

@section('content')

<!--intro-->
<div class="intro">
        <div id="slider" class="carousel slide" data-ride="carousel">
            {{-- <ol class="carousel-indicators">
                <li data-target="#slider" data-slide-to="0" class="active"></li>
                <li data-target="#slider" data-slide-to="1"></li>
                <li data-target="#slider" data-slide-to="2"></li>
            </ol> --}}
            <div class="carousel-inner">
                <div class="carousel-item carousel-1 active">
                    <div class="container info">
                        <div class="col-lg-5">
                            <h3>بنك الدم نمضى قدما لصحة أفضل</h3>
                            <p> {{ Str::limit($settings->about_app, 150) }} </p>

                            <a href="#">المزيد</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>

<!--about-->
<div class="about">
        <div class="container">
            <div class="col-lg-6 text-center">
                <p>
                    <span>بنك الدم</span> {{ $settings->about_us }}</p>
            </div>
        </div>
</div>

<!--articles-->
<div class="articles">
        <div class="container title">
            <div class="head-text">
                <h2>المقالات</h2>
            </div>
        </div>
        <div class="view">
            <div class="container">
                <div class="row">
                    <!-- Set up your HTML -->
                    <div class="owl-carousel articles-carousel">
                        @foreach ($posts as $post)
                        <div class="card">
                            <div class="photo">
                                <img src="{{ asset($post->image) }}"  width="100" height="300" class="card-img-top" alt="ImagePost">
                                <a href="article-details.html" class="click">المزيد</a>
                            </div>
                            <a href="#" class="favourite">
                                <i class="far fa-heart"></i>
                            </a>

                            <div class="card-body">
                                <h5 class="card-title">{{ $post->title }}</h5>
                                <p class="card-text">{{ $post->content }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
</div>

<!--requests-->
<div class="requests">
        <div class="container">
            <div class="head-text">
                <h2>طلبات التبرع</h2>
            </div>
        </div>
        <div class="content">
            <div class="container">
                <form class="row filter">
                    <div class="col-md-5 blood">
                        <div class="form-group">
                            <div class="inside-select">
                                <select class="form-control" id="exampleFormControlSelect1">
                                    <option selected disabled>اختر فصيلة الدم</option>
                                    @foreach ($bloodTypes as $type)                                        
                                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                                    @endforeach
                                </select>
                                <i class="fas fa-chevron-down"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 city">
                        <div class="form-group">
                            <div class="inside-select">
                                <select class="form-control" id="exampleFormControlSelect1">
                                    <option selected disabled>اختر المدينة</option>
                                    @foreach ($governments as $government)
                                    <option value="{{ $government->id }}">{{ $government->name }}</option>
                                    @endforeach
                                </select>
                                <i class="fas fa-chevron-down"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1 search">
                        <button type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>
                <div class="patients">
                    @foreach ($donationRequests as $donationRequest)                        
                    <div class="details">
                        <div class="blood-type">
                            <h2 dir="ltr">{{ $donationRequest->bloodType->name }}</h2>
                        </div>
                        <ul>
                            <li><span>اسم الحالة:</span> {{ $donationRequest->patient_name }}</li>
                            <li><span>مستشفى:</span> {{ $donationRequest->hospital_name }}</li>
                            <li><span>المدينة:</span> {{ $donationRequest->city->name }}</li>
                        </ul>
                        <a href="inside-request.html">التفاصيل</a>
                    </div>
                    @endforeach
                </div>
                <div class="more">
                    <a href="donation-requests.html">المزيد</a>
                </div>
            </div>
        </div>
</div>

<!--contact-->
<div class="contact">
        <div class="container">
            <div class="col-md-7">
                <div class="title">
                    <h3>اتصل بنا</h3>
                </div>
                <p class="text">يمكنك الإتصال بنا للإستفسار عن معلومة وسيتم الرد عليكم</p>
                <div class="row whatsapp">
                    <a href="#">
                        <img src="{{ asset('front/imgs') }}/whats.png">
                        <p dir="ltr">010 611 38 754</p>
                    </a>
                </div>
            </div>
        </div>
</div>

<!--app-->
<div class="app">
        <div class="container">
            <div class="row">
                <div class="info col-md-6">
                    <h3>تطبيق بنك الدم</h3>
                    <p>هدفنا أن لايعاني المريض في الحصول على الدم  وأن لا يعاني المرضى أصحاب فئات الدم النادرة في الحصول عليه</p>
                    <div class="download">
                        <h4>متوفر على</h4>
                        <div class="row stores">
                            <div class="col-sm-6">
                                <a href="#">
                                    <img src="{{ asset('front/imgs') }}/google.png">
                                </a>
                            </div>
                            <div class="col-sm-6">
                                <a href="#">
                                    <img src="{{ asset('front/imgs') }}/ios.png">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="screens col-md-6">
                    <img src="{{ asset('front/imgs') }}/App.png">
                </div>
            </div>
        </div>
</div>

@stop
