<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;


class Post extends Model
{

    protected $fillable = ['title', 'content', 'image', 'category_id', 'user_id', 'upload_image'];

    public function getCreationTime($column, $format = 'd-m-Y H:i:s')
    {
        return  Carbon::create($this->$column)->format($format);
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }
}
