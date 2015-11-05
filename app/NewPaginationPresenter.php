<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/11/5
 * Time: 16:26
 */

namespace App;
use Illuminate\Pagination\BootstrapThreePresenter ;

class NewPaginationPresenter extends BootstrapThreePresenter
{
    public function render()
    {
        if ($this->hasPages()) {
            return sprintf(
                '<ul class="pagination pagination-sm no-margin pull-right">%s %s %s</ul>',
                $this->getPreviousButton(),
                $this->getLinks(),
                $this->getNextButton()
            );
        }
        return '';
    }
}