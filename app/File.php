<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $table = 'files';

    protected $primaryKey = 'id';

    public $incrementing = false;

    /**
     * 缩略图列表
     */
    public function thumbnails()
    {
        return $this->hasMany('App\Thumbnail', 'file_id', 'id');
    }
    public function user()
    {
        return $this->morphTo();
    }
}
