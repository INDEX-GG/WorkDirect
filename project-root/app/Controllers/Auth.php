<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Auth extends BaseController
{
	public function registration()
	{
        print_r($this->request->getVar());

	}

    public function login()
    {

    }
}
