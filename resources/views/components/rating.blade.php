<div class="rating">
    @for($i = 1; $i < 6; $i++)
    <img src="{{ asset('images/star.png') }}" class="{{ $rating < $i ? 'passive' : '' }}" alt="star">
    @endfor
</div>
