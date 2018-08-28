<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Event extends Model
{

    use SearchableTrait;

    protected $searchable = [

        'columns' => [

            'events.title'=> 6,
            'events.venue' => 8,
            'events.description' => 10,
        ],

        'joins' => [

             'users' => ['user_id' , 'events.user_id'],

        ]

    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }



}
