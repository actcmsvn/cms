<?php

namespace App\Http\Controllers\Admin;

use ACT\CMS\API;
use ACT\CMS\Account;

class DashboardController extends API
{   
    public function __construct() {
        $this->M = new Account();
        $this->view = 'admin.pages.dashboard';
        $this->validator_msg = [];
    }
}

