<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PhotoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $album = $this->whenLoaded(relationship:'album');
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'img' => $this->img,
            'date' => $this->date,
            'featured' =>  $this->featured,
        ];
    }
}
