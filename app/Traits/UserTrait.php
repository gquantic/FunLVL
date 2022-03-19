<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;

trait UserTrait
{

    public function dateInterval(): string
    {
        $interval = Carbon::now()->diffInYears($this->created_at);

        if ($interval > 1){
            return 'На сайте более 1 года';
        }

        return 'На сайте менее 1 года';
    }
}

