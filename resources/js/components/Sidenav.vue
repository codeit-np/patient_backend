<template>
  <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  align-items-center">
        <a class="navbar-brand" href="javascript:void(0)">
          <img src="../imgs/logo-small.png" class="navbar-brand-img" alt="Logo">
        </a>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <router-link class="nav-link" :to="{ name:'dashboard' }">
                <i class="ni ni-tv-2 text-primary"></i> Dashboard
              </router-link>
            </li>
            <li class="nav-item">
              <a class="nav-link active collapse" href="#navbar-examples" data-toggle="collapse" role="button"
                aria-expanded="true" aria-controls="navbar-examples">
                <i class="fab fa-laravel" style="color: #f4645f;"></i>
                <span class="nav-link-text" style="color: #f4645f;">Users</span>
              </a>

              <div class="collapse show" id="navbar-examples">
                <ul class="nav nav-sm flex-column">
                  <!-- <li class="nav-item">
                    <router-link class="nav-link" :to="{name:'profile'}">
                      User profile
                    </router-link>
                  </li> -->
                  <li class="nav-item">
                    <router-link class="nav-link" :to="{name:'users'}">
                      User Management
                    </router-link>
                  </li>
                </ul>
              </div>
            </li>

            <li class="nav-item">
              <router-link class="nav-link" :to="{name:'hospitals'}">
                <i class="ni ni-bullet-list-67 text-default"></i>
                <span class="nav-link-text">Hospital</span>
              </router-link>
            </li>
            <li class="nav-item">
              <router-link class="nav-link" :to="{name:'patients'}">
                <i class="ni ni-bullet-list-67 text-default"></i>
                <span class="nav-link-text">Patient Screening</span>
              </router-link>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <i class="ni ni-bullet-list-67 text-default"></i>
                <span class="nav-link-text">Screening</span>
              </a>
            </li>

          </ul>
          <!-- Divider -->
          <hr class="my-3">
          <!-- Heading -->
          <h6 class="navbar-heading p-0 text-muted">
            <span class="docs-normal">Documentation</span>
          </h6>
          <!-- Navigation -->
          <ul class="navbar-nav mb-md-3">

          </ul>
        </div>
      </div>
    </div>
  </nav>
</template>

<script>
export default {
name:'Sidenav'
}
</script>
