<?php

namespace App\MenuItems;

class Courses extends AbstractMenuItem
{
    public $href = 'admin.test';
    public $icon = 'fas fa-paint-brush';

    public function __construct() {
        parent::__construct();
        $this->title = __('Courses');
    }
}
