@extends('layouts.app')

@section('content')
    <div class="container">

        <div style="padding: 40px 15px; text-align: center;">
            <h1>Nightlife Coordination</h1>
            <p class="lead">Check out the bars that are in your area and reserve in your favorite one.</p>
        </div>

        <div class="row">
            <div class="col-md-12">
                <section class="input-search">
                    <form method="post" action="{{ route('create') }}">
                        {{ csrf_field() }}
                        <div id="custom-search-input">
                            <div class="input-group col-md-12">
                                <input type="text" name="search" id="search"  class="form-control input-lg" placeholder="Search for city, zip or neighborhood..." required />
                    <span class="input-group-btn">
                        <button class="btn btn-default btn-lg" type="submit" id="search-button" value="Search">
                            <i class="glyphicon glyphicon-search" style="color: black"></i>
                        </button>
                    </span>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>

    </div><!-- /.container -->


@endsection