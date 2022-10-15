@extends('name.master')

@section('InfiniteName')
Infinite Name
@endsection

@section('content')
    <!-- Banner Part Start -->
    <section id="banner">
        <div class="container">
            <div class="row">
                <div class=".col-md-7 text-center ml-auto">
                    <div class="banner-text">
                        <h3>{{__('Search the name with meaning')}}</h3>
                        <div class="search-name">
                            <form action="{{ url('search') }}" method="get">
                              <div class="input-group">
                                <input class="form-control aa" placeholder="Search your name" type="text" name="search_string">
                                <div class="input-group-btn">
                                    <button class="btn btn-default" type="submit">Search</button>
                                </div>
                              </div>
                            </form>
                            <div class="which-name">
                                <a href="{{ url('/boys') }}">{{__("Boys Name")}}</a>
                                <a href="{{ url('/girls') }}">{{__("Girls Name")}}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner Part End -->

    <!-- Alphabitacally Search start -->
    <section id="alpha-search">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="heading">
                        <h2>{{__("Alphabitacally Search")}}</h2>
                    </div>
                </div>
                <div class="col-12 boy">
                    <div class="col-6 names-by-letter mx-auto">
                        <span>{{__("Boys Name")}}: </span>
                        @foreach($boy_letters as $letter)
                            <a href="{{ url('/boys/alphabate') }}/{{$letter}}">{{$letter}}</a>
                        @endforeach
{{--                        <a href="{{ url('/boys/alphabate') }}/z">z</a>--}}
                    </div>
                </div>
                <div class="col-12 girl">
                    <div class="col-6 names-by-letter mx-auto">
                        <span>{{__("Girls Name")}}: </span>
                        @foreach($girl_letters as $letter)
                            <a href="{{ url('/girls/alphabate') }}/{{$letter}}">{{$letter}}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Alphabitacally Search end -->

    <!-- Name blogs start -->
    <section id="name-blog">
        <div class="container d-none">
            <div class="row">
                <div class="col-4 pl-0">
                    <div class="left-item">
                        <div class="left-top">
                            <img src="{{asset('/')}}name/images/img1.png" alt="img1" class="img-fluid">
                            <div class="overlay">
                                <a href="#"><img src="{{asset('/')}}name/images/shape-border.png" alt="border" class="img-fluid"></a>
                            </div>
                        </div>
                        <div class="left-bottom">
                            <img src="{{asset('/')}}name/images/experince.jpg" alt="expericnce" class="img-fluid">
                            <a href="#">Read More <i class="fa fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-8">
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-6 pr-0">
                                    <div class="blog-item">
                                        <div class="blog-img">
                                            <img src="{{asset('/')}}name/images/blog1.png" alt="blog1" class="img-fluid">
                                            <div class="overlay2">
                                                <a href="#"><i class="fa fa-link"></i></a>
                                                <a href="#"><i class="fa fa-share-alt"></i></a>
                                            </div>
                                        </div>
                                        <div class="commnets-like">
                                            <a href="#"><i class="fa fa-user"></i> Post by: Admin</a>
                                            <span>
                                            <a href="#"><i class="fa fa-eye"></i> 2.3k</a>
                                            <a href="#"><i class="fa fa-thumbs-o-up"></i> 1.8k</a>
                                            <a href="#"><i class="fa fa-comments"></i> 1.3k</a>
                                        </span>
                                        </div>
                                        <h3>Aqeeqah For New Born Muslim</h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
                                        <a class="read" href="blog-details.html">Read More <i class="fa fa-long-arrow-right"></i> </a>
                                    </div>
                                </div>
                                <div class="col-6 pr-0">
                                    <div class="blog-item">
                                        <div class="blog-img">
                                            <img src="{{asset('/')}}name/images/blog2.png" alt="blog1" class="img-fluid">
                                            <div class="overlay2">
                                                <a href="#"><i class="fa fa-link"></i></a>
                                                <a href="#"><i class="fa fa-share-alt"></i></a>
                                            </div>
                                        </div>
                                        <div class="commnets-like">
                                            <a href="#"><i class="fa fa-user"></i> Post by: Admin</a>
                                            <span>
                                            <a href="#"><i class="fa fa-eye"></i> 2.3k</a>
                                            <a href="#"><i class="fa fa-thumbs-o-up"></i> 1.8k</a>
                                            <a href="#"><i class="fa fa-comments"></i> 1.3k</a>
                                        </span>
                                        </div>
                                        <h3>Teaching Islam to our Children</h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
                                        <a class="read" href="blog-details.html">Read More <i class="fa fa-long-arrow-right"></i> </a>
                                    </div>
                                </div>
                                <div class="col-6 pr-0">
                                    <div class="blog-item">
                                        <div class="blog-img">
                                            <img src="{{asset('/')}}name/images/blog3.png" alt="blog1" class="img-fluid">
                                            <div class="overlay2">
                                                <a href="#"><i class="fa fa-link"></i></a>
                                                <a href="#"><i class="fa fa-share-alt"></i></a>
                                            </div>
                                        </div>
                                        <div class="commnets-like">
                                            <a href="#"><i class="fa fa-user"></i> Post by: Admin</a>
                                            <span>
                                            <a href="#"><i class="fa fa-eye"></i> 2.3k</a>
                                            <a href="#"><i class="fa fa-thumbs-o-up"></i> 1.8k</a>
                                            <a href="#"><i class="fa fa-comments"></i> 1.3k</a>
                                        </span>
                                        </div>
                                        <h3>Shaving the head For Newborn</h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
                                        <a class="read" href="blog-details.html">Read More <i class="fa fa-long-arrow-right"></i> </a>
                                    </div>
                                </div>
                                <div class="col-6 pr-0">
                                    <div class="blog-item">
                                        <div class="blog-img">
                                            <img src="{{asset('/')}}name/images/blog4.png" alt="blog1" class="img-fluid">
                                            <div class="overlay2">
                                                <a href="#"><i class="fa fa-link"></i></a>
                                                <a href="#"><i class="fa fa-share-alt"></i></a>
                                            </div>
                                        </div>
                                        <div class="commnets-like">
                                            <a href="#"><i class="fa fa-user"></i> Post by: Admin</a>
                                            <span>
                                            <a href="#"><i class="fa fa-eye"></i> 2.3k</a>
                                            <a href="#"><i class="fa fa-thumbs-o-up"></i> 1.8k</a>
                                            <a href="#"><i class="fa fa-comments"></i> 1.3k</a>
                                        </span>
                                        </div>
                                        <h3>Aqeeqah For New Born Muslim</h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
                                        <a class="read" href="blog-details.html">Read More <i class="fa fa-long-arrow-right"></i> </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="succes-banner">
                    <img src="{{asset('/')}}name/images/success.jpg" alt="success" class="img-fluid">
                    <a href="#">Join Now</a>
                </div>
            </div>
        </div>
    </section>
    <!-- Name blogs end -->
@endsection
