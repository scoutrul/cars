<div class="comments">

    <h3><center>Новые отзывы об авто</center></h3>
    @foreach($reviews as $review)
        <div class="review">
            <div class="review-header">
                @if(!empty($review->make->icon))
                    <img src="/{{$review->make->icon}}" style="width: 32px; text-align: right; vertical-align: middle">
                @endif
                <a href="{{ route('mention', ['type' => $review->type->name,'id' => $review->slug, 'make' => $review->make->name, 'model' => $review->model->name]) }}"> <?= $review->make->title .'/'. $review->model->title?></a>
            </div>
            <div class="review-body">
                <?= str_limit($review->header) ?>
            </div>
            <div class="review-date">
                <?= $review->created_at->format('d.m.Y'); ?>
            </div>
        </div>
    @endforeach
</div>