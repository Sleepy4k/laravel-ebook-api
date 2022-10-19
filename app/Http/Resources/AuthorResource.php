<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AuthorResource extends JsonResource
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
            'ID' => $this->id,
            'Nama' => $this->nama,
            'Tempat, Tanggal lahir' => $this->tempat_lahir . ', '. $this->tanggal_lahir->format('d-m-Y'),
            'Jenis Kelamin' => $this->kelamin,
            'Email' => $this->email,
            'Nomor Handphone' => $this->nomor_hp
        ];
    }
}
