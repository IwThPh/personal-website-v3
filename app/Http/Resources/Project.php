<?php

namespace App\Http\Resources;

use Stevebauman\Purify\Facades\Purify;
use Illuminate\Http\Resources\Json\JsonResource;

class Project extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $data = parent::toArray($request);

        //HTML Sanitising.
        $data['brief'] = Purify::clean($data['brief']);
        $data['desc'] = Purify::clean($data['desc']);

        return $data;
    }
}
