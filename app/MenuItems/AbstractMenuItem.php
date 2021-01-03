<?php

namespace App\MenuItems;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\HtmlString;

abstract class AbstractMenuItem
{
    /**
     * Menu item's title.
     *
     * @var string
     */
    public $title;

    /**
     * Route's name.
     *
     * @var string
     */
    public $href;

    /**
     * Font awesome icon class
     *
     * @var string
     */
    public $icon = 'ellipsis-h';

    /**
     * Permission to check user's access.
     *
     * @var string|null
     */
    public $permission = null;

    /**
     * Array of menu item's children.
     *
     * @var array
     */
    public $children = [];

    /**
     * AbstractMenuItem constructor.
     */
    public function __construct() {
        foreach ($this->children as $key => $model)
            $this->children[$key] = new $model;
    }

    /**
     * Check whether to show menu item or not.
     *
     * Always true if has children or if permission is not set.
     *
     * @param  \App\User|null  $user
     *
     * @return bool
     */
    public function accessible(User $user = null) {
        if (!$this->permission)
            return true;

        if (count($this->children))
            return true;

        $user = $user ?? auth()->user();
        return $user->can($this->permission);
    }

    /**
     * Check if item should be active and return corresponding class.
     *
     * @param  \Illuminate\Http\Request|null  $request
     *
     * @return string
     */
    public function isActive(Request $request = null) {
        $request = $request ?? request();
        $href = ltrim($this->href(false), '/');
        return $request->is($href, $href . '/*') ? 'active' : '';
    }

    /**
     * Get icon HTML.
     *
     * @return \Illuminate\Support\HtmlString|null
     */
    public function icon() {
        if (!$this->icon)
            return null;

        return new HtmlString('<i class="fa-fw ' . $this->icon . '"></i>');
    }

    /**
     * Get href.
     *
     * @param  bool  $absolute
     * @param  array  $parameters
     *
     * @return string
     */
    public function href($absolute = true, $parameters = []) {
        return route($this->href, $parameters, $absolute);
    }
}
