<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'articles';
    /**
     * 所属用户
     */
    public function author()
    {
        return $this->morphTo();
    }
}
