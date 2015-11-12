<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HomePage extends Model
{
    protected $table = 'home_page';

    public function article()
    {
        return $this->morphTo();
    }
}
