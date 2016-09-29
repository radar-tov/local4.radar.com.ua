@inject('bannerProvider', '\App\ViewDataProviders\BannerDataProvider')
@if($bannerProvider->getBanner())
    <li class="banner card">
        <div class="card-image col no-padding">
            <img src="{{ url($bannerProvider->getBanner()->thumbnail) }}" alt="{{ $bannerProvider->getBanner()->alt }}">
            @if($bannerProvider->getBanner()->title)
                <a @if($bannerProvider->getBanner()->link)href="{{ $bannerProvider->getBanner()->link }}"@endif class="title-company-link">{!! $bannerProvider->getBanner()->title !!}</a>
            @endif
            @if($bannerProvider->getBanner()->link)
                <a @if($bannerProvider->getBanner()->link)href="{{ $bannerProvider->getBanner()->link }}"@endif class="arrow-link">
                    <img src="{{ url('/frontend/images/arrow-banner.png') }}"/>
                </a>
            @endif
            <span class="card-title">{!! $bannerProvider->getBanner()->caption !!}</span>
            <span class="title-company">{!! $bannerProvider->getBanner()->title !!}</span>
        </div>
    </li>
@endif