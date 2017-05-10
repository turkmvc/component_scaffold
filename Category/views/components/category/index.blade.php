@inject('categories', 'Components\Category\Injections\CategoryInjection')

<ul>
@foreach($categories->get() as $k=>$category)
  <li>{{$category}}</li>
@endforeach
</ul>
