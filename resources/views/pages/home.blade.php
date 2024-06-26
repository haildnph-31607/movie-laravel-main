@extends('layout')
@section('main')
    <div class="row container" id="wrapper">
        <div class="halim-panel-filter">
            <div id="ajax-filter" class="panel-collapse collapse" aria-expanded="true" role="menu">
                <div class="ajax"></div>
            </div>
        </div>

        {{-- <div class="col-xs-12 carausel-sliderWidget">
       <section id="halim-advanced-widget-4">
          <div class="section-heading">
             <a href="danhmuc.php" title="Phim Chiếu Rạp">
             <span class="h-text">Phim Chiếu Rạp</span>
             </a>
             <ul class="heading-nav pull-right hidden-xs">
                <li class="section-btn halim_ajax_get_post" data-catid="4" data-showpost="12" data-widgetid="halim-advanced-widget-4" data-layout="6col"><span data-text="Chiếu Rạp"></span></li>
             </ul>
          </div>
          <div id="halim-advanced-widget-4-ajax-box" class="halim_box">
             <article class="col-md-2 col-sm-4 col-xs-6 thumb grid-item post-38424">
                <div class="halim-item">
                   <a class="halim-thumb" href="{{route('movie')}}" title="GÓA PHỤ ĐEN">
                      <figure><img class="lazy img-responsive" src="https://lumiere-a.akamaihd.net/v1/images/p_blackwidow_disneyplus_21043-1_63f71aa0.jpeg" alt="GÓA PHỤ ĐEN" title="GÓA PHỤ ĐEN"></figure>
                      <span class="status">HD</span><span class="episode"><i class="fa fa-play" aria-hidden="true"></i>Vietsub</span>
                      <div class="icon_overlay"></div>
                      <div class="halim-post-title-box">
                         <div class="halim-post-title ">
                            <p class="entry-title">GÓA PHỤ ĐEN</p>
                            <p class="original_title">Black Widow</p>
                         </div>
                      </div>
                   </a>
                </div>
             </article>

          </div>
       </section>
       <div class="clearfix"></div>
    </div> --}}
        <div id="halim_related_movies-2xx" class="wrap-slider">
            <div class="section-bar clearfix">
                <h3 class="section-title"><span>PHIM HOT</span></h3>
            </div>
            <div id="halim_related_movies-2" class="owl-carousel owl-theme related-film">
                @foreach ($movie_hot as $key => $items)
                    <article class="thumb grid-item post-38498">
                        <div class="halim-item">
                            <a class="halim-thumb" href="{{ route('movie', $items->slug) }}" title="{{ $items->title }}">
                                <figure><img class="lazy img-responsive"
                                        src="{{ asset('/uploads/movie/' . $items->image) }}" alt="{{ $items->title }}"
                                        title="{{ $items->title }}"></figure>
                                <span class="status">
                                    @if ($items->resolution == 0)
                                        HD
                                    @elseif($items->resolution == 1)
                                        SD
                                    @elseif($items->resolution == 3)
                                        Trailer
                                    @endif
                                </span><span class="episode"><i class="fa fa-play" aria-hidden="true"></i>
                                    @if ($items->subtitle == 0)
                                        Phụ Đề - Tập {{$items->episode}}
                                    @else
                                        Thuyết Minh - Tập {{$items->episode}}
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



            </div>

        </div>
        <main id="main-contents" class="col-xs-12 col-sm-12 col-md-8">
            @foreach ($category_home as $key => $item)
                <section id="halim-advanced-widget-2">
                    <div class="section-heading">
                        <a href="danhmuc.php" title="Phim Bộ">
                            <span class="h-text">{{ $item->title }}</span>
                        </a>
                    </div>
                    <div id="halim-advanced-widget-2-ajax-box" class="halim_box">
                        @foreach ($item->movie as $key => $items)
                            <article class="col-md-3 col-sm-3 col-xs-6 thumb grid-item post-37606">
                                <div class="halim-item">
                                    <a class="halim-thumb" href="{{ route('movie', $items->slug) }}">
                                        <figure><img class="lazy img-responsive"
                                                src="{{ asset('uploads/movie/' . $items->image) }}"
                                                alt="BẠN CÙNG PHÒNG CỦA TÔI LÀ GUMIHO"
                                                title="BẠN CÙNG PHÒNG CỦA TÔI LÀ GUMIHO"></figure>
                                        <span class="status">
                                            @if ($items->resolution == 0)
                                                HD
                                            @elseif($items->resolution == 1)
                                                SD
                                            @elseif($items->resolution == 3)
                                                Trailer
                                            @endif
                                        </span><span class="episode"><i class="fa fa-play" aria-hidden="true"></i>
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
                                                <p class="original_title">My Roommate Is a Gumiho</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </section>
                <div class="clearfix"></div>
            @endforeach
            {{-- <section id="halim-advanced-widget-2">
          <div class="section-heading">
             <a href="danhmuc.php" title="Phim Lẻ">
             <span class="h-text">Phim Lẻ</span>
             </a>
          </div>
          <div id="halim-advanced-widget-2-ajax-box" class="halim_box">
             <article class="col-md-3 col-sm-3 col-xs-6 thumb grid-item post-37606">
                <div class="halim-item">
                   <a class="halim-thumb" href="chitiet.php">
                      <figure><img class="lazy img-responsive" src="https://upload.wikimedia.org/wikipedia/vi/e/e8/Avengers-Infinity_War-Official-Poster.jpg" alt="BẠN CÙNG PHÒNG CỦA TÔI LÀ GUMIHO" title="BẠN CÙNG PHÒNG CỦA TÔI LÀ GUMIHO"></figure>
                      <span class="status">TẬP 15</span><span class="episode"><i class="fa fa-play" aria-hidden="true"></i>Vietsub</span>
                      <div class="icon_overlay"></div>
                      <div class="halim-post-title-box">
                         <div class="halim-post-title ">
                            <p class="entry-title">BẠN CÙNG PHÒNG CỦA TÔI LÀ GUMIHO</p>
                            <p class="original_title">My Roommate Is a Gumiho</p>
                         </div>
                      </div>
                   </a>
                </div>
             </article>





          </div>
       </section> --}}
            <div class="clearfix"></div>
            {{-- <section id="halim-advanced-widget-2">
          <div class="section-heading">
             <a href="danhmuc.php" title="Phim Lẻ">
             <span class="h-text">Phim Chiếu Rạp</span>
             </a>
          </div>
          <div id="halim-advanced-widget-2-ajax-box" class="halim_box">
             <article class="col-md-3 col-sm-3 col-xs-6 thumb grid-item post-37606">
                <div class="halim-item">
                   <a class="halim-thumb" href="chitiet.php">
                      <figure><img class="lazy img-responsive" src="https://fptninhbinh.vn/wp-content/uploads/2021/06/bo-gia.jpg" alt="BẠN CÙNG PHÒNG CỦA TÔI LÀ GUMIHO" title="BẠN CÙNG PHÒNG CỦA TÔI LÀ GUMIHO"></figure>
                      <span class="status">TẬP 15</span><span class="episode"><i class="fa fa-play" aria-hidden="true"></i>Vietsub</span>
                      <div class="icon_overlay"></div>
                      <div class="halim-post-title-box">
                         <div class="halim-post-title ">
                            <p class="entry-title">BẠN CÙNG PHÒNG CỦA TÔI LÀ GUMIHO</p>
                            <p class="original_title">My Roommate Is a Gumiho</p>
                         </div>
                      </div>
                   </a>
                </div>
             </article>






          </div>
       </section> --}}
            <div class="clearfix"></div>
        </main>
        <div class="d-flex">
            @include('pages.sidebar.sidebar')
        </div>
    </div>
@endsection
