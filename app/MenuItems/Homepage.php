<?php

namespace App\MenuItems;

class Homepage extends AbstractMenuItem
{
    public $href = 'admin.homepage.edit';
    public $icon = 'fas fa-car';

    public function __construct() {
        parent::__construct();
        $this->title = __('Homepage');
    }
}
