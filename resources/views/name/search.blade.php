@extends('name.master')

@section('InfiniteName')
    > {{__("Boys Name")}}
@endsection

@section('boys_name')
    active
@endsection

@section('content')

    <section id="page-title">
        <div class="container">
            <div class="row">
                <div class="col-12 title">
                    <a href="{{ asset('/') }}"><span>{{__('Home')}}</span> </a><a href="name-details.html">> {{__('Search')}}</a>
                </div>
            </div>
        </div>
    </section>
    <!-- page title Part end -->

    @include('name.partials.list')

@endsection
