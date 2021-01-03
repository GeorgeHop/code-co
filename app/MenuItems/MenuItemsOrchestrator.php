<?php

namespace App\MenuItems;

use Illuminate\Support\HtmlString;

class MenuItemsOrchestrator
{
    private $menu_items = [
//        Homepage::class,
        Courses::class,
        Users::class,
    ];

    public function __construct() {
        foreach ($this->menu_items as $key => $model)
            $this->menu_items[$key] = new $model;
    }

    public function render() {
        return new HtmlString(view('components.admin.menu-items')->with([
            'menu_items' => $this->menu_items,
            'user' => auth()->user(),
            'request' => request(),
        ])->render());
    }
}
