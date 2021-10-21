<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;


class Post extends Model
{

    protected $fillable = ['title', 'content', 'image', 'category_id'];

    public function getCreationTime($column, $format = 'd-m-Y H:i:s')
    {
        return  Carbon::create($this->$column)->format($format);
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
