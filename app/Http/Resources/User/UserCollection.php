<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class UserCollection extends ResourceCollection
{
    public $collects = UserResource::class;

    /**
     * Transform the resource collection into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
//        return parent::toArray($request);

        return [
            'data' => $this->collection,
            'meta' => [
                'total_users' => $this->collection->count(),
                'method' => 'UserCollection file',
                'custom_key' => 'custom_value'
            ]

        ];

    }
}
