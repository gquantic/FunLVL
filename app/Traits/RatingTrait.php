<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait RatingTrait
{
    public function avg()
    {
        return (int)$this->stars_count / (int) $this->votes_count;
    }

    static function whereAvg(int $value): Builder
    {
        return self::where(function ($query) {}, $value);
    }

    public function addRating(int $stars)
    {
        $this->setAttributes(
            [
                'stars_count' => $this->stars_count + $stars,
                'votes_count' => $this->votes_count++
            ]
        );
        $this->save();
    }
}
