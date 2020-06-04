@extends('layouts.basekz')



@section('content')
        <div class="container-fluid">
            <div class="container">
                <div class="primary margin-15">
                    <div class="row">
                        <div class="col-md-8 newcase">
                            <div class="owl-carousel owl-theme js section_margin line_hoz animate-box" id="slideshow_face">
                                @foreach($articles as $article)
                                @if($loop->index <=3)
                                <div class="item">
                                    <figure class="alith_post_thumb_big">
                                        <span class="post_meta_categories_label">{{$article->name}}</span>
                                        <a href="{{Route('kz.Article',$article->id)}}"><img src="{{asset($article->path)}}" alt="" style="width: 100%;"/></a>
                                    </figure>
                                    <h3 class="alith_post_title animate-box" data-animate-effect="fadeInUp">
                                        <a href="{{Route('kz.Article',$article->id)}}" style="text-transform: uppercase;">{{$article->titlekz}}</a>
                                    </h3>
                                    <div class="alith_post_content_big">
                                        <div class="row">
                                            <div class="col-md-4 col-sm-12">
                                                <div class="post_meta_center animate-box">

                                                    <p><a href="page-author.html" class="author"><strong>{{$article->author}}</strong></a></p>
                                                    <span class="post_meta_date">{{$article->created_at}}.</span>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                                @endif
                                @endforeach

                            </div>
                            <div class="post_list post_list_style_1">

                                <div class="alith_heading">
                                    <h2 class="alith_heading_patern_2">хабарламалар</h2>
                                </div>
                                @foreach($NewArticles as $newArticle)
                                
                                    <article class="row section_margin animate-box">
                                        <div class="col-md-3 animate-box">
                                            <figure class="alith_news_img"><a href="{{Route('kz.Article',$newArticle->id)}}" ><img src="{!!  $newArticle->path !!}" alt=""/></a></figure>
                                        </div>
                                        <div class="col-md-9 animate-box">
                                            <h3 class="alith_post_title"><a href="{{Route('kz.Article',$newArticle->id)}}" style="text-transform: uppercase;">
                                                    {{$newArticle->titlekz}}
                                                </a></h3>
                                            <div class="post_meta">


                                                <span class="meta_categories">Авторы: {{$newArticle->author}} </span>
                                                <span class="meta_date">{{$newArticle->created_at}}</span>
                                            </div>
                                        </div>
                                    </article>

                                @endforeach
                                {{$NewArticles->links()}}



                            </div>
                        </div>
                        <!--Start Sidebar-->
                        <aside class="col-md-4 sidebar_right">
                            <div class="sidebar-widget animate-box">
                                <div class="widget-title-cover"><h4 class="widget-title"><span>Танымал мақалалар</span></h4></div>
                                <div class="latest_style_1">
                                    @foreach($articles as $article)
                                    @if($loop->index <=4)
                                    <div class="latest_style_1_item">
                                        <span class="item-count vertical-align"></span>
                                        <div class="alith_post_title_small">
                                            <a href="{{Route('kz.Article',$article->id)}}"><strong> @php
                                                        echo mb_strimwidth($article['titlekz'],0,40,'...');
                                                    @endphp
                                                </strong></a>
                                            <p class="meta"><span>{{$article->created_at}}</span> <span>{{$article->views}} көріністер</span></p>
                                        </div>
                                        <figure class="alith_news_img"><a href="{{Route('kz.Article',$article->id)}}"><img style="height: 100px;width: 100%;" src="{!!$article->path  !!}" alt=""/></a></figure>
                                    </div>
                                    @endif
                                    @endforeach

                                </div>
                            </div> <!--.sidebar-widget-->

                            <div class="sidebar-widget animate-box">
                                <div class="widget-title-cover"><h4 class="widget-title"><span>Іздеу</span></h4></div>
                                <form action="{{Route('kz.Search')}}" class="search-form" method="get" role="search">
                                    <label>
                                        <input type="search" name="search" value="" placeholder="Іздеу …" class="search-field">
                                    </label>
                                    <input type="submit" value="Іздеу" class="search-submit">
                                </form>
                            </div> <!--.sidebar-widget-->

                            <div class="sidebar-widget animate-box">
                                <div class="widget-title-cover"><h4 class="widget-title"><span>Тренд</span></h4></div>
                                <div class="latest_style_2">
                                    <div class="latest_style_2_item_first">
                                        <figure class="alith_post_thumb_big">
                                            <span class="post_meta_categories_label">{{$popularArticle->name}}</span>
                                            <a href="{{Route('kz.Article',$popularArticle->id)}}"><img src="{!! $popularArticle->path   !!}" alt=""/></a>
                                        </figure>
                                        <h3 class="alith_post_title">
                                            <a href="{{Route('kz.Article',$popularArticle->id)}}" style="text-transform: uppercase"><strong>
                                                    @php
                                                        echo mb_strimwidth($popularArticle['titlekz'],0,20,'...');
                                                    @endphp</strong></a>
                                        </h3>
                                    </div>

                                </div>
                            </div> <!--.sidebar-widget-->

                            <div class="sidebar-widget animate-box">
                                <div class="widget-title-cover"><h4 class="widget-title"><span>Тегтер бұлты</span></h4></div>
                                <div class="alith_tags_all">
                                    @foreach($cats as $cat)
                                        <a href="{{Route('kz.ArticleCategory',$cat->id)}}" class="alith_tagg">{{$cat->name}}</a>

                                    @endforeach

                                </div>
                            </div> <!--.sidebar-widget-->

                        </aside>
                        <!--End Sidebar-->
                    </div>
                </div> <!--.primary-->

            </div>
        </div>
        <div class="container-fluid">
            <div class="container animate-box">
                <div class="bottom margin-15">
                    <div class="row">

                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                            <div class="sidebar-widget">
                                <div class="widget-title-cover"><h4 class="widget-title"><span>Ең соңғысы</span></h4></div>
                                <div class="latest_style_2">
                                    @foreach($NewArticles as $newArticle)
                                    <div class="latest_style_2_item">
                                        <figure class="alith_news_img"><a href="{{Route('kz.Article',$newArticle->id)}}"><img alt="" src="{!! $newArticle->path !!}" class="hover_grey"></a></figure>
                                        <h3 class="alith_post_title"><a href="{{Route('kz.Article',$newArticle->id)}}">{{$newArticle->titlekz}}</a></h3>

                                    </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                            <div class="sidebar-widget">
                                <div class="widget-title-cover"><h4 class="widget-title"><span>Категориялар</span></h4></div>
                                <ul class="bottom_menu">
                                    @foreach($cats as $cat)
                                    <li><a href="{{Route('kz.ArticleCategory',$cat->id)}}" class=""><i class="fa fa-angle-right"></i>&nbsp;&nbsp; {{$cat->name}}</a></li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                            <div class="sidebar-widget">
                                <div class="widget-title-cover"><h4 class="widget-title"><span>Инстаграм</span></h4></div>
                                <ul class="alith-instagram-grid-widget alith-clr alith-row alith-gap-10">
                                    <li class="wow fadeInUp alith-col-nr alith-clr alith-col-3 animated">
                                        <a class="" target="_blank" href="https://www.instagram.com/thekhantime/">
                                            <img class="" title="" alt="" src="{{asset('images/1.png')}}">
                                        </a>
                                    </li>
                                    <li class="wow fadeInUp alith-col-nr alith-clr alith-col-3 animated">
                                        <a class="" target="_blank" href="https://www.instagram.com/thekhantime/">
                                            <img class="" title="" alt="" src="{{asset('images/2.png')}}">
                                        </a>
                                    </li>
                                    <li class="wow fadeInUp alith-col-nr alith-clr alith-col-3 animated">
                                        <a class="" target="_blank" href="https://www.instagram.com/thekhantime/">
                                            <img class="" title="" alt="" src="{{asset('images/3.png')}}">
                                        </a>
                                    </li>
                                  
                                  
                                </ul>
                            </div>
                        </div>
                    </div> <!--.row-->
                </div>
            </div>
        </div>
        <style>
            .alith_post_thumb_big  img{
                height:400px !important;
            }
            @media(max-width:720px){
                .alith_post_thumb_big  img{
                    height:250px !important;
                }
                .alith_post_title{
                    font-size:20px;
                }
                .post_meta span{
                    font-size:70%;
                }
                .widget-title-cover{
                    margin-top:20px;
                }
                .latest_style_1_item .alith_post_title_small{
                    left:0% !important;
                }
            }
            
            
        </style>
@endsection
