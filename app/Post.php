<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;


class Post extends Model
{

    protected $fillable = ['title', 'content', 'image'];

    public function getCreationTime($column, $format = 'd-m-Y H:i:s')
    {
        return  Carbon::create($this->$column)->format($format);
    }
}
