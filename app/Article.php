<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Article extends Model
{
    protected $table = 'articles';
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    public function author()
    {
        return $this->morphTo();
    }
    public function topic()
    {
        return $this->morphTo();
    }
    protected $casts = [
        'content' => 'array',
    ];
}
