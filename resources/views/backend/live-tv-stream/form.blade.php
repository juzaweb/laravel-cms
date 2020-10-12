@extends('layouts.backend')

@section('title', $title)

@section('content')

{{ Breadcrumbs::render('manager', [
        'name' => trans('app.stream'),
        'url' => route('admin.live-tv.stream', [$live_tv->id])
    ], $model) }}

<div class="cui__utils__content">
    <form method="post" action="{{ route('admin.live-tv.stream.save') }}" class="form-ajax">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h5 class="mb-0 card-title font-weight-bold">{{ $title }}</h5>
                    </div>

                    <div class="col-md-6">
                        <div class="btn-group float-right">
                            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> @lang('app.save')</button>
                            <a href="{{ route('admin.live-tv.stream') }}" class="btn btn-warning"><i class="fa fa-times-circle"></i> @lang('app.cancel')</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body">

                <div class="row">
                    <div class="col-md-12">

                        <div class="form-group">
                            <label class="col-form-label" for="label">@lang('app.label')</label>
                            <input type="text" name="label" class="form-control" id="label" value="{{ $model->label }}" autocomplete="off" required>
                        </div>

                        <div class="form-group">
                            <label class="col-form-label" for="label">@lang('app.label')</label>
                            <input type="text" name="label" class="form-control" id="label" value="{{ $model->label }}" autocomplete="off" required>
                        </div>

                        <div class="form-group">
                            <label class="col-form-label" for="status">@lang('app.status')</label>
                            <select name="status" id="status" class="form-control">
                                <option value="1" @if($model->status == 1) selected @endif>@lang('app.enabled')</option>
                                <option value="0" @if($model->status == 0 && !is_null($model->status)) selected @endif>@lang('app.disabled')</option>
                            </select>
                        </div>

                    </div>



                </div>

                <input type="hidden" name="id" value="{{ $model->id }}">
            </div>
        </div>
    </form>

</div>
@endsection
