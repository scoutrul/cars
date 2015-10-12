<div class="mention-side">

    <svg fill="#000000" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
        <path d="M20 2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h14l4 4V4c0-1.1-.9-2-2-2zm-2 12H6v-2h12v2zm0-3H6V9h12v2zm0-3H6V6h12v2z"/>
        <path d="M0 0h24v24H0z" fill="none"/>
    </svg>

    <h3 class="mention-header">Новые отзывы</h3>
    @foreach($reviews as $review)
        <div class="mention-block">
            <div class="mention-block_header">
                @if(!empty($review->make->icon))
                    <img src="/{{$review->make->icon}}">
                @endif
                <a href="{{ route('mention', ['type' => $review->type->name,'id' => $review->slug, 'make' => $review->make->name, 'model' => $review->model->name]) }}"> <?= $review->make->title .'/'. $review->model->title?></a>
            </div>
            <div class="mention-block_body">
                "<?= str_limit($review->header) ?>"
            </div>
            <div class="mention-block_date">
                <?= $review->created_at->format('d.m.Y'); ?>
            </div>
            <hr>
        </div>
    @endforeach
</div>