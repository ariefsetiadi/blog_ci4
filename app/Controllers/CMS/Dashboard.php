<?php

namespace App\Controllers\CMS;

use App\Controllers\BaseController;

use App\Models\ModelUser;

class Dashboard extends BaseController
{
    public function index()
    {
        return view('cms/dashboard');
    }
}
