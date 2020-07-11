@extends('layouts.backend')

@section('title', $title)

@section('content')

{{ Breadcrumbs::render('manager', [
        'name' => trans('app.system_setting'),
        'url' => route('admin.setting')
    ]) }}

<div class="cui__utils__content">
    <form method="post" action="{{ route('admin.setting.save') }}" class="form-ajax">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h5 class="mb-0 card-title font-weight-bold">{{ $title }}</h5>
                    </div>

                    <div class="col-md-6">
                        <div class="btn-group float-right">
                            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> @lang('app.save')</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body">

                <div class="row">
                    <div class="col-md-8">
                        @include('backend.setting.system.form_left')
                    </div>

                    <div class="col-md-4">
                        @include('backend.setting.system.form_right')
                    </div>
                </div>


            </div>
        </div>
    </form>
</div>
@endsection
