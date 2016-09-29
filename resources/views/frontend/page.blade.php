@extends('frontend.layout')

@section('seo')
    <title>{{ 'Акции' }}</title>
    <meta name="description" content=""/>
    <meta name="keywords" content=""/>
@endsection


@section('content')
    <section class="breadcrumbs">
        <div class="container">
            <div class="row">
                <ol class="breadcrumb">
                    <li><a href="/">Главная</a></li>
                    <li class="active">Акции</li>
                </ol>
            </div>
        </div>
    </section>

    <section class="content">
        <!--Simple Menu-->
        <div class="container">
            <div class="row"><div class="col s12 text-page no-padding">
                    {{--<h3>{{ $page->title }}</h3>--}}
                    @foreach($articles as $key => $article)
                        <!--Post-->
                        <div class="post col s12 wow fadeInUp animated" data-wow-delay="0.{{ $key + 2 }}s">
                            <div class="post-row-left center col s2 hide-on-small-and-down">
                                <div class="post-date">
                                    <span class="top-part col s12"> {{ date('d', strtotime($article->published_at)) }} </span>
                                    <span class="bottom-part col s12"> {{ date('m \'y', strtotime($article->published_at)) }}</span>
                                </div>
                            </div>
                            <div class="post-row-center col s12 m10">
                                <div class="post-media col s12 m6 l4">
                                    <div class="media-inner">
                                        <a href="/news/{{ $article->id }}/{{ $article->slug }}" title="{{ $article->title }}!">
                                            <img src="{{ url($article->thumbnail) }}" class="responsive-img" alt="{{ $article->title }}">
                                        </a>
                                    </div>
                                </div>
                                <div class="post-content-outer col s12 m6 l8">
                                    <header class="single">
                                        <h4>
                                            <a href="/news/{{ $article->id }}/{{ $article->slug }}" title="{{ $article->title }}">{{ $article->title }}</a>
                                        </h4>
                                    </header>
                                    <p>
                                        {!! $article->excerpt !!}
                                    </p>
                                    <a href="/news/{{ $article->id }}/{{ $article->slug }}" class="waves-effect waves-light btn">Подробнее</a>
                                </div>
                            </div>
                        </div>
                        <!--End of Post-->
                    @endforeach

                    <div class="col s12 center arts_pag">
                        <br/>
                        {!! $articles->render() !!}
                        {{--<a href="#" class="more btn white-text waves-effect waves-light"></a>--}}
                    </div>
                </div>
            </div>
        </div>
        <!--/Menu-->
    </section>

@endsection

@section('__bottom-scripts')
    <script>
        var post = 4; // - количество отображаемых новостей
        hidenews = "скрыть";
        shownews = "показать ещё";

        $(".more").html( shownews );
        $(".post:not(:lt("+post+"))").hide();

        $(".more").click(function (e){
            e.preventDefault();
            if( $(".post:eq("+post+")").is(":hidden") )
            {
                $(".post:hidden").show();
                $(".more").html( hidenews );
            }
            else
            {
                $(".post:not(:lt("+post+"))").hide();
                $(".more").html( shownews );
            }
        });
    </script>
@endsection