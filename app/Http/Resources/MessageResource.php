<?php

namespace App\Http\Resources;

use App\Models\Chat;
use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class MessageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'text'=>$this->text,
            'name'=>(\Auth::id() === $this->user_id) ? 'Я' : User::find($this->user_id)->name,
            'class'=>(\Auth::id() === $this->user_id) ? 'owner' : 'guest'
        ];
    }
}
