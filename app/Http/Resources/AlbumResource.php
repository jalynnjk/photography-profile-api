<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AlbumResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $photographer = $this->whenLoaded(relationship: 'photographer');
        return [
            'id' => $this->id,
            'album_name' => $this->album_name,
            'photos' => PhotoResource::collection($this->whenLoaded(relationship: 'photos'))
        ];
    }
}
