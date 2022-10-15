@extends('name.master')

@section('InfiniteName')
    > {{__("Girls Name")}}
@endsection

@section('girls_name')
    active
@endsection

@section('content')
    <section id="page-title">
        <div class="container">
            <div class="row">
                <div class="col-12 title">
                    <a href="{{ asset('/') }}"><span>{{__('Home')}}</span> </a><a href="girls-name.html">> > {{__("Girls Name")}}</a>
                </div>
            </div>
        </div>
    </section>
    <!-- page title Part end -->
    @include('name.partials.list')

@endsection
