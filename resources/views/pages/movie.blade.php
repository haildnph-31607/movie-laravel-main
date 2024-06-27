@extends('layout')
@section('main')
    <div class="row container" id="wrapper">
        <div class="halim-panel-filter">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-6">
                        <div class="yoast_breadcrumb hidden-xs"><span><span><a href=""></a> » <span><a
                                            href="">{{ $coun_detail->title }}</a> » <span class="breadcrumb_last"
                                            aria-current="page">{{ $detail->title }}</span></span></span></span></div>
                    </div>
                </div>
            </div>
            <div id="ajax-filter" class="panel-collapse collapse" aria-expanded="true" role="menu">
                <div class="ajax"></div>
            </div>
        </div>
        <main id="main-contents" class="col-xs-12 col-sm-12 col-md-8">
            <section id="content" class="test">
                <div class="clearfix wrap-content">

                    <div class="halim-movie-wrapper">
                        <div class="title-block">
                            <div id="bookmark" class="bookmark-img-animation primary_ribbon" data-id="38424">
                                <div class="halim-pulse-ring"></div>
                            </div>
                            <div class="title-wrapper" style="font-weight: bold;">
                                Bookmark
                            </div>
                        </div>
                        <div class="movie_info col-xs-12">
                            <div class="movie-poster col-md-3">
                                <img class="movie-thumb" src="{{ asset('/uploads/movie/' . $detail->image) }}"
                                    alt="{{ $detail->title }}">
                                @if ($detail->resolution != 3)
                                    <div class="bwa-content">

                                        <div class="loader"></div>
                                        <a href="{{ route('watch',$detail->slug) }}" class="bwac-btn">
                                            <i class="fa fa-play"></i>
                                        </a>
                                    </div>
                                @elseif($detail->resolution == 3)
                                    <a href="#watch_trailer" class="btn btn-primary scroll-trailer"
                                        style="display: block;">Xem Trailer Ngay</a>
                                @endif
                            </div>
                            <div class="film-poster col-md-9">
                                <h1 class="movie-title title-1"
                                    style="display:block;line-height:35px;margin-bottom: -14px;color: #ffed4d;text-transform: uppercase;font-size: 18px;">
                                    {{ $detail->title }}</h1>
                                <h2 class="movie-title title-2" style="font-size: 12px;">{{ $detail->title }}</h2>
                                <ul class="list-info-group">
                                    <li class="list-info-group-item"><span>Trạng Thái</span> : <span class="quality">
                                            @if ($detail->resolution == 0)
                                                HD
                                            @elseif($detail->resolution == 1)
                                                SD
                                            @elseif($detail->resolution == 3)
                                                Trailer
                                            @endif
                                        </span>
                                        <span class="episode">
                                            @if ($detail->subtitle == 0)
                                                Phụ Đề
                                            @else
                                                Thuyết Minh
                                            @endif
                                        </span>
                                    </li>
                                    <li class="list-info-group-item"><span>Điểm IMDb</span> : <span
                                            class="imdb">7.2</span></li>
                                    <li class="list-info-group-item"><span>Thời lượng</span> : {{ $detail->movie_duration }}
                                        Phút</li>
                                        <li class="list-info-group-item last-item"
                                        style="-overflow: hidden;-display: -webkit-box;-webkit-line-clamp: 1;-webkit-box-flex: 1;-webkit-box-orient: vertical;">
                                        <span>Số Tập</span> : {{$detail->episode_number}}
                                        </li>
                                    <li class="list-info-group-item"><span>Thể loại</span> : <a href=""
                                            rel="category tag">{{ $cate_detail->title }}</a>, <a href=""
                                            rel="category tag">{{ $genre_detail->title }}</a></li>
                                    <li class="list-info-group-item"><span>Quốc gia</span> : <a href=""
                                            rel="tag">{{ $coun_detail->title }}</a></li>
                                    <li class="list-info-group-item"><span>Đạo diễn</span> : <a class="director"
                                            rel="nofollow" href="https://phimhay.co/dao-dien/cate-shortland"
                                            title="Cate Shortland">Oda Echijo</a></li>

                                </ul>
                                <div class="movie-trailer hidden"></div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div id="halim_trailer"></div>
                    <div class="clearfix"></div>
                    <div class="section-bar clearfix">
                        <h2 class="section-title"><span style="color:#ffed4d">Nội dung phim</span></h2>
                    </div>
                    <div class="entry-content htmlwrap clearfix">
                        <div class="video-item halim-entry-box">
                            <article id="watch_trailer" class="item-content">
                                Phim <a href="https://phimhay.co/goa-phu-den-38424/">{{ $detail->title }}</a> - 2024 -
                                {{ $coun_detail->title }}:
                                <p>{{ $detail->title }} &#8211; hay còn gọi là
                                    {{ $detail->title }}{{ $detail->description }}</p>
                                <h5>Từ Khoá Tìm Kiếm: {{ $detail->tags }}</h5>
                                <ul>
                                    <li>{{ $detail->title }}</li>

                                </ul>
                            </article>
                        </div>
                    </div>

                    <div class="section-bar clearfix">
                        <h2 class="section-title"><span style="color:#ffed4d">Bình Luận</span></h2>
                    </div>
                    <div class="entry-content htmlwrap clearfix">
                        <div class="video-item halim-entry-box">
                            <article id="post-38424" class="item-content">
                                @php

                                    $url = Request::url();
                                    // dd($url);
                                @endphp
                                <div class="fb-comments" data-href= "{{$url}}"
                                    data-width="100%" style="color: white;" data-numposts="10"></div>
                            </article>
                        </div>
                    </div>

                    {{-- Trailer phim  --}}
                    <div class="section-bar clearfix">
                        <h2 class="section-title"><span style="color:#ffed4d">Trailer</span></h2>
                    </div>
                    <div class="entry-content htmlwrap clearfix">
                        <div class="video-item halim-entry-box">
                            <article id="post-38424" class="item-content">
                                <iframe width="800" height="315"
                                    src="https://www.youtube.com/embed/{{ $detail->trailer }}" frameborder="0" autoplay
                                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                            </article>
                        </div>
                    </div>
                </div>
            </section>
            <section class="related-movies">
                <div id="halim_related_movies-2xx" class="wrap-slider">
                    <div class="section-bar clearfix">
                        <h3 class="section-title"><span>CÓ THỂ BẠN MUỐN XEM</span></h3>
                    </div>
                    <div id="halim_related_movies-2" class="owl-carousel owl-theme related-film">
                        @foreach ($detail_lq as $item)
                            <article class="thumb grid-item post-38498">
                                <div class="halim-item">
                                    <a class="halim-thumb" href="{{ route('movie', $item->slug) }}"
                                        title="{{ $item->title }}">
                                        <figure><img class="lazy img-responsive"
                                                src="{{ asset('/uploads/movie/' . $item->image) }}"
                                                alt="{{ $item->title }}" title="{{ $item->title }}"></figure>
                                        <span class="status">
                                            @if ($item->resolution == 0)
                                                HD
                                            @else
                                                SD
                                            @endif
                                        </span><span class="episode"><i class="fa fa-play"
                                                aria-hidden="true"></i>Vietsub</span>
                                        <div class="icon_overlay"></div>
                                        <div class="halim-post-title-box">
                                            <div class="halim-post-title ">
                                                <p class="entry-title">{{ $item->title }}</p>
                                                <p class="original_title">{{ $item->title }}</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </article>
                        @endforeach



                    </div>
                    <script>
                        jQuery(document).ready(function($) {
                            var owl = $('#halim_related_movies-2');
                            owl.owlCarousel({
                                loop: true,
                                margin: 4,
                                autoplay: true,
                                autoplayTimeout: 4000,
                                autoplayHoverPause: true,
                                nav: true,
                                navText: ['<i class="hl-down-open rotate-left"></i>',
                                    '<i class="hl-down-open rotate-right"></i>'
                                ],
                                responsiveClass: true,
                                responsive: {
                                    0: {
                                        items: 2
                                    },
                                    480: {
                                        items: 3
                                    },
                                    600: {
                                        items: 4
                                    },
                                    1000: {
                                        items: 4
                                    }
                                }
                            })
                        });
                    </script>
                </div>
            </section>
        </main>
        <aside id="sidebar" class="col-xs-12 col-sm-12 col-md-4"></aside>
    </div>
@endsection
