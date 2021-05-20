@extends('layouts.app')

@section('content')
@include('users.partials.header', ['title' => __('Update user')])

<div class="container-fluid  mt--5">
  <div class="row">

    <div class="col-xl-8 order-xl-1">
      <div class="card shadow">
        <div class="card-header bg-white border-0">
          <div class="row align-items-center">
            <!-- <h3 class="mb-0">{{ __('Update User') }}</h3> -->
          </div>
        </div>
        <div class="card-body">
          <form method="post" action="{{ route('users.update', $user->id) }}" autocomplete="off">
            @csrf
            @method('put')
            <input type="hidden" name="id" value="{{ $user->id }}">
            <h6 class="heading-small text-muted mb-4">{{ __('User information') }}</h6>

            @if (session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{ session('status') }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            @endif

            <div class="pl-lg-4">
              <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                <label class="form-control-label" for="input-name">{{ __('Name') }}</label>
                <input type="text" name="name" id="input-name"
                  class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}"
                  placeholder="{{ __('Name') }}" value="{{ $user->name }}" required autofocus>

                @if ($errors->has('name'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('name') }}</strong>
                </span>
                @endif
              </div>
              <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                <label class="form-control-label" for="input-email">{{ __('Email') }}</label>
                <input type="email" name="email" id="input-email"
                  class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}"
                  placeholder="{{ __('Email') }}" value="{{ $user->email }}" required>

                @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
              </div>
              <div class="form-group{{ $errors->has('phone') ? ' has-danger' : '' }}">
                <label class="form-control-label" for="input-phone">{{ __('Phone No') }}</label>
                <input type="number" name="phone" id="input-phone"
                  class="form-control form-control-alternative{{ $errors->has('phone') ? ' is-invalid' : '' }}"
                  placeholder="{{ __('Phone No') }}" value="{{ $user->phone }}" required>

                @if ($errors->has('phone'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('phone') }}</strong>
                </span>
                @endif
              </div>

              <div class="form-group{{ $errors->has('user_type') ? ' has-danger' : '' }}">
                <label class="form-control-label" for="user_type">{{ __('User Type') }}</label>
                <select
                  class="form-control form-control-alternative{{ $errors->has('user_type') ? ' is-invalid' : '' }}"
                  name="user_type" id="user_type" required>
                  <option value="" {{ $user->user_type == '' ? 'selected' : '' }}>Select User Type</option>
                  <option value="1" {{ $user->user_type  == 1 ? 'selected' : '' }}>Doctor</option>
                  <option value="2" {{ $user->user_type  == 2 ? 'selected' : '' }}>Admin</option>
                  <option value="3" {{ $user->user_type  == 3 ? 'selected' : '' }}>Super Admin</option>
                </select>

                @if ($errors->has('user_type'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('user_type') }}</strong>
                </span>
                @endif
              </div>

              <div class="form-group{{ $errors->has('hospital_id') ? ' has-danger' : '' }}">
                <label class="form-control-label" for="hospital_id">{{ __('Hospital center') }}</label>
                <select
                  class="form-control form-control-alternative{{ $errors->has('hospital_id') ? ' is-invalid' : '' }}"
                  name="hospital_id" id="hospital_id">
                  <option value="">Select One</option>
                  @if (count($hospitals))
                  @foreach ($hospitals as $hospital)
                  <option value="{{ $hospital->id }}" {{ $user->hospital_id == ($hospital->id) ? 'selected' : '' }}>
                    {{ $hospital->name }}</option>
                  @endforeach
                  @endif
                </select>

                @if ($errors->has('hospital_id'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('hospital_id') }}</strong>
                </span>
                @endif
              </div>

              <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                <label class="form-control-label" for="input-password">{{ __('New Password') }} <small>Leave blank if
                    you do not want to update password</small></label>
                <input type="password" name="password" id="input-password"
                  class="form-control form-control-alternative{{ $errors->has('password') ? ' is-invalid' : '' }}"
                  placeholder="{{ __('New Password') }}" value="{{ old('password') }}">

                @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
              </div>
              <div class="form-group">
                <label class="form-control-label" for="input-password-confirmation">{{ __('Confirm New Password') }}
                  <small>Same as above</small></label>
                <input type="password" name="password_confirmation" id="input-password-confirmation"
                  class="form-control form-control-alternative" placeholder="{{ __('Confirm New Password') }}"
                  value="{{ old('password_confirmation') }}">
              </div>

              <div class="text-center">
                <button type="submit" class="btn btn-success mt-4">{{ __('Save User') }}</button>
              </div>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>

</div>
@endsection