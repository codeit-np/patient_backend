@extends('layouts.app')
@section('content')
@include('users.partials.header', ['title' => __('Users')])
<div class="container-fluid mt--5">
  <div class="row">
    <div class="col">
      <div class="card shadow">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col-8">
              <!-- <h3 class="mb-0">Users</h3> -->
              @if (session('status'))
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('status') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              @endif
              @if (session('error'))
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              @endif
            </div>
            <div class="col-4 text-right">
              @if (auth()->user()->user_type ===3)
              <a class="nav-link" href="{{ route('profile.add') }}"> <button
                  class="btn btn-sm btn-primary">{{ __('Add user') }}</button>
              </a>
              @endif
            </div>
          </div>
        </div>

        <div class="col-12">
        </div>

        <div class="table-responsive">
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone No</th>
                <th scope="col">Hospital</th>
                <th scope="col">User Type</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($users as $user)
              <tr>
                <td>{{ $user->name }}</td>
                <td>
                  <span href="mailto:{{ $user->email }}">{{ $user->email }}</span>
                </td>
                <td>{{ $user->phone }}</td>
                <td>
                  @if ($user->hospital_id)
                  {{ $user->hospital->name }}
                  @endif
                </td>
                <td>
                  @if ($user->user_type == 3)
                  {{ __('Super Admin') }}
                  @elseif ($user->user_type ==2)
                  {{ __('Admin') }}
                  @elseif ($user->user_type ==1)
                  {{ __('Doctor') }}
                  @elseif ($user->user_type ==0)
                  {{ __('Patient') }}
                  @endif
                </td>
                <td class="text-start">
                  <div class="">
                    @if (auth()->user()->user_type ===3 || auth()->user()->user_type ===2)
                    <a href="{{ ('users/'.$user->id.'/edit') }}" class="">
                      <button class="btn btn-primary text-orange">Edit</button>
                    </a>
                    <!-- <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                      <a class="dropdown-item" href="">Edit</a>
                    </div> -->
                    @endif
                  </div>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <div class="card-footer py-4">
          <nav class="d-flex justify-content-end" aria-label="...">

          </nav>
        </div>
      </div>
    </div>
  </div>

</div>

@endsection