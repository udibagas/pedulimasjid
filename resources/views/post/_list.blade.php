<div class="media" style="height:120px;">
    <div class="media-left">
        <div  style="width:100px;height:100px;">
            <a href="/post/{{ $p->id }}-{{ str_slug($p->title) }}">
                <img class="media-object cover" src="/{{ $p->img }}" alt="{{ $p->title }}" />
            </a>
        </div>
    </div>
    <div class="media-body">
        <a href="/post/{{ $p->id }}-{{ str_slug($p->title) }}">
            <h4 style="margin:0;">{{ $p->title }}</h4>
        </a>
        <span class="text-muted">
            {{ $p->updated_at->diffForHumans() }} |
            <a href="/category/{{ $p->category_id }}">{{ $p->category->name }}</a>
        </span>
        <p> {!! str_limit(strip_tags($p->content)) !!}</p>
    </div>
</div>
