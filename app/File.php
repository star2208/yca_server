<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $table = 'files';

    /**
     * 所属用户
     */
    public function user()
    {
        return $this->morphTo();
    }
}
