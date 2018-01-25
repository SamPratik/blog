<?php

namespace App\Handlers;
use Auth;

class LfmConfigHandler extends \Unisharp\Laravelfilemanager\Handlers\ConfigHandler
{
    public function userField()
    {
        return parent::userField();
    }
}
