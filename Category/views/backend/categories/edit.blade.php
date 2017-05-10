@inject('settings', 'Whole\Core\Injections\SettingsInjection')
@extends('backend::_layouts.application')

@section('title'){{ trans('category::edit.title',['title'=>($settings->get()->admin_title!="") ? $settings->get()->admin_title : 'Whole CMS']) }}@endsection

@section('page_title')
    <h1>{{ trans('category::edit.page_title') }}</h1>
@endsection


@section('page_breadcrumb')
    <ul class="page-breadcrumb breadcrumb">
        <li>
            <a href="{{ route('admin.index') }}">{{ trans('category::edit.breadcrumb1') }}</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="{{ route('admin.category.index') }}">{{ trans('category::edit.breadcrumb2') }}</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="#">{{ trans('category::edit.breadcrumb3') }}</a>
        </li>
    </ul>
@endsection


@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet light">
                <div class="portlet-title">
                    <div class="caption font-green-haze">
                        <i class="fa fa-icon fa-pencil font-green-haze"></i>
                        <span class="caption-subject bold uppercase">{{ trans('category::edit.portlet_title') }}</span>
                    </div>
                </div>

                <div class="portlet-body form">
                    @include('backend::_errors.error')
                    {!! Form::model($category,['method' => 'put','route'=>['admin.category.update',$category->id],'class'=>'form-horizontal','role'=>'form']) !!}
                    <div class="form-body">
                        @include('backend::categories._form')
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-2 col-md-10">
                                {!! Form::submit(trans('category::edit.edit'),['class'=>'btn blue']) !!}
                                <a href="{{ URL::route('admin.category.index') }}" class="btn default">{{ trans('category::edit.cancel') }}</a>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
