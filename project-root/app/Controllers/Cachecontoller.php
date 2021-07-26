<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Cachecontoller extends BaseController
{
	public function genCache()
	{
        $cache = $this->cachePage(4);

        return view("welcome_message");
	}

    public function deleteCache()
    {

    }
}
