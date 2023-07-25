@extends('name.master')

@section('InfiniteName')
Infinite Name
@endsection

@section('content')
    <!-- Banner Part Start -->
    <section id="banner">
        <div class="container">
            <div class="row">
                <div class="col-md-7 col-xs-12 text-center ml-auto">
                    <div class="banner-text">
                        <h3>{{__('Search the name with meaning')}}</h3>
                        <div class="search-name">
                            <form action="{{ url('search') }}" method="get">
                              <div class="input-group">
                                <input class="form-control aa" placeholder="{{__('Search the name with meaning')}}" type="text" name="search_string">
                                <div class="input-group-btn">
                                    <button class="btn btn-default" type="submit">{{__("Search")}}</button>
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


        <!-- Random Names Popup Start -->
        <section id="random-names-popup">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <div class="random-names-content text-center" style="background-color: #ffffff; padding: 20px; border-radius: 10px;">
                            <h3 style="color: #333;">{{ __("messages.random_names") }}</h3>
                            <div class="random-names">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h4 style="color: #007bff;">{{ __("messages.random_boy_name") }}</h4>
                                        <p id="random-boy-name"></p>
                                        <button class="btn btn-primary" onclick="showRandomBoyName()" style="background-color: #007bff; border-color: #007bff;">{{ __("messages.show_random_boy_name") }}</button>
                                    </div>
                                    <div class="col-md-6">
                                        <h4 style="color: #ff6b6b;">{{ __("messages.random_girl_name") }}</h4>
                                        <p id="random-girl-name"></p>
                                        <button class="btn btn-primary" onclick="showRandomGirlName()" style="background-color: #ff6b6b; border-color: #ff6b6b;">{{ __("messages.show_random_girl_name") }}</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Random Names Popup End -->

        <script>
            function showRandomBoyName() {
                fetchRandomName('boy');
            }

            function showRandomGirlName() {
                fetchRandomName('girl');
            }

            function fetchRandomName(gender) {
                // Call an API endpoint to get a random name based on gender
                fetch(`/api/random-name/${gender}`)
                    .then(response => response.json())
                    .then(data => {
                        // Update the content of the popup with the fetched name
                        if (gender === 'boy') {
                            document.getElementById('random-boy-name').textContent = data.name;
                        } else if (gender === 'girl') {
                            document.getElementById('random-girl-name').textContent = data.name;
                        }

                        // Show the popup
                        $('#random-names-popup').modal('show');
                    })
                    .catch(error => {
                        console.error('Error fetching random name:', error);
                    });
            }
        </script>
    @endsection
