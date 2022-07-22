<div class="edica-landing-header-content">
    <div id="edicaLandingHeaderCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#edicaLandingHeaderCarousel" data-slide-to="0" class="active">.01</li>
            <li data-target="#edicaLandingHeaderCarousel" data-slide-to="1">.02</li>
            <li data-target="#edicaLandingHeaderCarousel" data-slide-to="2">.03</li>
        </ol>
        <div class="carousel-inner" role="listbox">
            @foreach($randomArticles as $key => $randomArticle)
            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                <div class="row">
                    <div class="col-md-6 carousel-content-wrapper">
                        <h1>{{ $randomArticle->title }}</h1>
                        <p>{!! Str::limit($randomArticle->description, 150) !!}</p>
                    </div>
                    <div class="col-md-6 carousel-img-wrapper">
                        <img src="{{ url('storage/'.$randomArticle->image) }}" alt="carousel-img" class="img-fluid" width="350px">
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
