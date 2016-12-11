@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row" style="padding: 15px">
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

            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-primary">
                    <div align="center" class="panel-heading">
                      <h3>  Bars Search Results </h3>
                    </div>

                    @foreach ($yelpResults -> businesses as $yelpResult)
                        <article data-postid="{{ $yelpResult->id }}">
                        <div class="col-xs-6 col-md-3" style="padding-top: 6px">
                            <a href="{{$yelpResult -> url}}" class="thumbnail">
                                <img src="{{$yelpResult -> image_url}}"/>
                            </a>
                        </div>
                        <div class="panel panel-default" style="padding-top: 8px; border-bottom: none">
                            <h3 class="panel-title">
                                {{$yelpResult -> name}}
                            </h3>
                            <div class="panel-body">
                                @foreach ($yelpResult -> location -> display_address as $a => $address)
                                    <strong style="line-height: 30px"> {{ $address }} </strong>
                                @endforeach
                                <br />
                                <span style="font-style: italic">" {{$yelpResult -> snippet_text}} "</span>
                                    <br />
                                   <div class="btn-group">
                                       <button type="button" class="btn btn-secondary like">{{ Auth::user()->likes()->where('post_id', $yelpResult->id)->first() ? Auth::user()->likes()->where('post_id', $yelpResult->id)->first()->like == 1 ? 'Going!' : 'Not Going' : 'Not Going' }}</button>
                                       {{--<a href="#" class="like">not ging </a>--}}
                                   </div>
                                {{--<a href="{{ route('post.like', $yelpResult->id) }}">Unlike this shit</a>--}}
                                {{--{{$yelpResult -> id}}--}}
                            </div>
                        </div>
                        </article>
                            @endforeach

                </div>
            </div>

        <script>
            var token = '{{ Session::token() }}';
            var urlLike = '{{ route('like') }}';
        </script>
@endsection
