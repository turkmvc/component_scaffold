<?php
/**
 * Created by PhpStorm.
 * User: Furkan
 * Date: 10.8.2015
 * Time: 23:42
 */

namespace Components\Category\Repositories\Category;
use Whole\Core\Repositories\Repository;
use Components\Category\Models\Category;


class CategoryRepository extends Repository
{

    public function __construct(Category $category)
    {
        $this->model = $category;
    }

}
