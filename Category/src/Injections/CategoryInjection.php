<?php
/**
 * Created by PhpStorm.
 * User: Furkan
 * Date: 9.9.2015
 * Time: 03:18
 */

namespace Components\Category\Injections;
use Components\Category\Repositories\Category\CategoryRepository;

class CategoryInjection
{
    protected $category;

    public function __construct(CategoryRepository $category)
    {
        $this->category = $category;
    }

    public function get()
    {
		return $this->category->all();
    }
}
