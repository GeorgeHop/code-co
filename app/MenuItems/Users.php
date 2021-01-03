<?php

namespace App\MenuItems;

class Users extends AbstractMenuItem
{
    public $href = 'admin.test';
    public $icon = 'fas fa-users';

    public function __construct() {
        parent::__construct();
        $this->title = __('Користувачі');
    }
}
