<div id="carousel" class="carousel slide" data-ride="carousel" style="min-height:500px;">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <?php $i = 0; ?>
        @foreach ($sliders as $s)
            <li data-target="#carousel" data-slide-to="{{ $i++ }}" class="@if ($i == 0) active @endif"></li>
        @endforeach
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox" style="min-height:500px;">
        <?php $i = 0; ?>
        @foreach ($sliders as $s)
            <div class="item @if ($i == 0) active @endif" style="min-height:500px;">
                <img src="/{{ $s->img }}" alt="...">
                <div class="carousel-caption">
                    <h2>{{ $s->title }}</h2>
                    {!! $s->content !!}
                </div>
            </div>
            <?php $i++ ?>
        @endforeach
    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#carousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#carousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
