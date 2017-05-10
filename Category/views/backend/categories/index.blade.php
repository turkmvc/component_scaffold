@inject('settings', 'Whole\Core\Injections\SettingsInjection')
@extends('backend::_layouts.application')

@section('title'){{ trans('category::index.title',['title'=>($settings->get()->admin_title!="") ? $settings->get()->admin_title : 'Whole CMS']) }}@endsection

@section('page_title')
    <h1>{{ trans('category::index.page_title') }}</h1>
@endsection


@section('page_breadcrumb')
    <ul class="page-breadcrumb breadcrumb">
        <li>
            <a href="{{ route('admin.index') }}">{{ trans('category::index.breadcrumb1') }}</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="#">{{ trans('category::index.breadcrumb2') }}</a>
        </li>
    </ul>
@endsection


@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet light">
                <div class="portlet-title">
                    <div class="caption font-green-haze" style="width: 100%;">
                        <i class="fa fa-icon fa-pencil font-green-haze"></i>
                        <span class="caption-subject bold uppercase"> {{ trans('category::index.portlet_title') }}</span>
                        <a class="btn green pull-right" href="{{ route('admin.category.create') }}">
                            <i class="fa fa-plus"></i> {{ trans('category::index.add_new') }}
                        </a>
                    </div>
                </div>
                <div class="portlet-body">
                    @include('backend::_errors.error')
                    <table class="table table-striped table-bordered table-hover" id="sample_2">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ trans('category::index.tab_th1') }}</th>
				                    <th>{{ trans('category::index.tab_th2') }}</th>
                            <th>{{ trans('category::index.tab_th3') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                            <tr class="odd gradeX">
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->title }}</td>
								                <td>{{ $category->active }}</td>
                                <td>
                                    <a href="{{ route('admin.category.edit',$category->id) }}" class="btn btn-primary btn-sm"> <i class="fa fa-edit"></i> {{ trans('category::index.edit') }}</a>
                                    <a href="{{ route('admin.category.destroy',$category->id) }}" class="btn btn-danger btn-sm" data-method="delete"> <i class="fa fa-trash"></i> {{ trans('category::index.delete') }}</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('include_css')
    @include('backend::_layouts._table_css')
@endsection

@section('include_js')
    @include('backend::_layouts._table_js')
@endsection
