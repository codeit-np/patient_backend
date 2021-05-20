<div class="header pb-5 pt-3 pt-lg-5 d-flex align-items-center"
  style="background-image: url(../argon/img/theme/profile-cover.jpg); background-size: cover; background-position: center top;">
  <!-- Mask -->
  <span class="mask bg-gradient-default opacity-8"></span>
  <!-- Header container -->
  <div class="container-fluid d-flex align-items-center">
    <div class="row">
      <div class="col-md-12 {{ $class ?? '' }}">
        <h1 class="text-white">{{ $title }}</h1>
        @if (isset($description) && $description)
        <p class="text-white mt-0 mb-2">{{ $description }}</p>
        @endif
      </div>
    </div>
  </div>
</div>