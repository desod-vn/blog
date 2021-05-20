<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'content',
        'image',
    ];


    public function user()
    {
        $this->belongsTo('App\Models\User');
    }

    public function categories()
    {
        $this->belongsToMany('App\Models\Category');
    }

}
