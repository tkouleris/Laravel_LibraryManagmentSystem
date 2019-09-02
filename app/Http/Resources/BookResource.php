<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // Get the first author if exists
        if( isset($this->authors[0])) {
            $author_1 = $this->authors[0]->lastname.' '.
                        $this->authors[0]->firstname;
        }else{
            $author_1 = ' ';
        }

        // Get the second author if exists
        if( isset($this->authors[1])) {
            $author_2 = $this->authors[1]->lastname.' '.
                        $this->authors[1]->firstname;
        }else{
            $author_2 = ' ';
        }

        // Get the third author if exists
        if( isset($this->authors[2])) {
            $author_3 = $this->authors[2]->lastname.' '.
                        $this->authors[2]->firstname;
        }else{
            $author_3 = ' ';
        }

        return [
            'id' => $this->id,
            'title' => $this->title,
            'isbn10' => $this->isbn10,
            'isbn13' => $this->isbn13,
            'year' => $this->year,
            'edition' => $this->edition,
            'Author_1' => $author_1,
            'Author_2' => $author_2,
            'Author_3' => $author_3,
        ];
    }
}
