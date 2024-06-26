@extends('layout')
@section('main')
    <div class="row container" id="wrapper">
        <div class="halim-panel-filter">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-6">
                        <div class="yoast_breadcrumb hidden-xs"><span><span><a href=""></a> » Phim thuộc năm
                                    {{ $year }} <span class="breadcrumb_last"
                                        aria-current="page"></span></span></span></div>
                    </div>
                </div>
            </div>
            <div id="ajax-filter" class="panel-collapse collapse" aria-expanded="true" role="menu">
                <div class="ajax"></div>
            </div>
        </div>
        <main id="main-contents" class="col-xs-12 col-sm-12 col-md-8">
            <section>
                <div class="section-bar clearfix">

                </div>
                <div class="halim_box">
                    @if (count($movie) == 0)
                    <div class="alert alert-dark text-center" role="alert">
                        <img src="{{asset('imgs/image.png')}}" alt=""> <br>
                        <h2 class="text-danger">Không có phim nào</h2>
                    </div>
                    @else
                        @foreach ($movie as $items)
                            <article class="col-md-3 col-sm-3 col-xs-6 thumb grid-item post-27021">
                                <div class="halim-item">
                                    <a class="halim-thumb" href="{{ route('movie', $items->slug) }}"
                                        title="{{ $items->title }}">
                                        <figure><img class="lazy img-responsive"
                                                src="{{ asset('/uploads/movie/' . $items->image) }}" alt="{{ $items->title }}"
                                                title="{{ $items->title }}"></figure>
                                        <span class="status">5/5</span><span class="episode"><i class="fa fa-play"
                                                aria-hidden="true"></i>
                                            @if ($items->subtitle == 0)
                                                Phụ Đề
                                            @else
                                                Thuyết Minh
                                            @endif
                                        </span>
                                        <div class="icon_overlay"></div>
                                        <div class="halim-post-title-box">
                                            <div class="halim-post-title ">
                                                <p class="entry-title">{{ $items->title }}</p>
                                                <p class="original_title">{{ $items->description }}</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </article>
                        @endforeach
                    @endif




                </div>
                <div class="clearfix"></div>
                <div class="text-center">
                    {!! $movie->links('pagination::bootstrap-4') !!}

                </div>
            </section>
        </main>
        @include('pages.sidebar.sidebar')
    </div>
@endsection
