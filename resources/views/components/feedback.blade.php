<div class="review-item">
    <div class="text">
        {{ $feedback->text }}
    </div>
    <div class="author-review">
        <p class="name">{{ $feedback->author->name }}</p>
        <div class="avatar" style="background-image: url('{{ $feedback->author->data->avatar_path ?? '' }}')"></div>
    </div>
</div>
