<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AuthorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        $author_full_name = $this->lastname.' '.$this->firstname;
        return [
            'id' => $this->id,
            'author_name' => $author_full_name,
            'dob' => $this->dob,
            'bio' => $this->bio
        ];
    }

    public function with( $request )
    {
        return [
            'Api Version' => '1.0',
            'author'=> 'Thodoris Kouleris',
            'emai' => 'tkouleris@gmail.com'
        ];
    }
}
