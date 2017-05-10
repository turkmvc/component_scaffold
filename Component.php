<?php

return [
  'composer' => ['"Components\\\Category\\\": "components/Category/src/"'],
  'providers'=>['Components\Category\CategoryServiceProvider::class'],
  // 'aliases'=>["'Zipper'   => Chumper\Zipper\Facades\Zipper::class,"],
  'vendor'=>true,
  'migrate'=>true,
  'settings'=> [
    'name'=>'Kategoriler',
    'description'=>'Kategoriler',
    'folder'=>'components::category',
    'files'=>[
        [
            'name'=>'Kategoriler',
            'file'=>'index'
        ],
    ],
  ],
  'sidebar'=>[
    'title'=>'Kategoriler',
    'route'=>'admin.category.index',
    'path'=>'admin/category,admin/category/*',
  ],
  'sidebar_lang'=>[
    ['title'=>'Kategoriler',"lang"=>'tr'],
    ['title'=>'Categories',"lang"=>'en'],
  ],
  'pages'=>[
  'admin/category',
  'admin/category/*',
  ],
];
