<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\DeskListResource;

class DeskResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // https://www.youtube.com/watch?v=ptM2gDsbAFo&list=PLze7bMjv1CYv7JNFtFjs1jqE5bW5WHQDP&index=3
        return [
            'id' => $this->id,
            'name' => $this->name,
            'created_at' => $this->created_at,
            'lists' => DeskListResource::collection($this->lists),
        ];
    }
}
