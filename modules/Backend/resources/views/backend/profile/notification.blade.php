@extends('cms::layouts.backend')

@section('content')
    <div class="row">
        <div class="col-xl-3 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-wrap flex-column align-items-center">
                        <div class="juzaweb__utils__avatar juzaweb__utils__avatar--size64 mb-3">
                            <img src="{{ $jw_user->getAvatar() }}" alt="Mary Stanform">
                        </div>
                        <div class="text-center">
                            <div class="text-dark font-weight-bold font-size-18">{{ $jw_user->name }}</div>

                            <div class="text-uppercase font-size-12 mb-3">
                                {{ $jw_user->is_admin ? 'Administrator' : 'User' }}
                            </div>

                            {{--<button class="btn btn-primary btn-with-addon">
                                <span class="btn-addon">
                                    <i class="btn-addon-icon fa fa-plus-circle"></i>
                                </span>
                                Request Access
                            </button>--}}
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header bg-primary">
                    <h4 class="card-title text-white">{{ trans('cms::profile.about_me') }}</h4>
                </div>

                <div class="card-body">
                    <strong>
                        <i class="fa fa-user mr-1"></i> {{ trans('cms::profile.full_name') }}
                    </strong>
                    <p class="text-muted">{{ $jw_user->name }}</p>

                    <hr>
                    <strong>
                        <i class="fa fa-envelope mr-1"></i> {{ trans('cms::profile.email') }}
                    </strong>
                    <p class="text-muted">{{ $jw_user->email }}</p>

                    <hr>
                    <strong><i class="fa fa-birthday-cake mr-1"></i> {{ trans('cms::profile.birthday') }}</strong>
                    <p class="text-muted">
                        {{ $jw_user->birthday ?? '_' }}
                    </p>
                    <hr>
                </div>

            </div>
        </div>

        <div class="col-xl-9 col-lg-12">
            <div class="card">
                <div class="card-header p-2">
                    <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link active" href="#notifications" data-toggle="tab">{{ trans('cms::app.notifications') }}</a></li>
                        <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
                        <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Timeline</a></li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="notifications">
                            {{ $notification->data['body'] }}
                        </div>

                        <div class="tab-pane" id="settings">
                            <form method="post" action="" class="form-horizontal">
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="inputName" placeholder="Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputName2" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputName2" placeholder="Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputExperience" class="col-sm-2 col-form-label">Experience</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputSkills" class="col-sm-2 col-form-label">Skills</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">
                                        <button type="submit" class="btn btn-danger">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="tab-pane" id="timeline">

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
