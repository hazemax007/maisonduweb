<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SignatureResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id ,
            'name'=>$this->name ,
            'job'=>$this->job ,
            'company'=>$this->company ,
            'email'=>$this->email ,
            'addess'=>$this->address ,
            'phone'=>$this->phone
        ];
        return parent::toArray($request);
    }
}
