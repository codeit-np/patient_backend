<template>
  <Sidenav v-if="isLoggedIn" />
  <div class="main-content" id="panel">
  <Navbar v-if="isLoggedIn" />
  <div class="container-fluid mt--4">
  <div class="main-body">
  <router-view></router-view>
  </div>
  <Footer />
  </div>
  </div>
</template>

<script>

import Sidenav from './components/Sidenav';
import Footer from './components/Footer';
import Navbar from './components/Navbar';
export default {
  name: 'App',
  components: { Sidenav, Navbar, Footer },
  data() {
        return {
            isLoggedIn: false,
        }
    },
    created() {
        if (window.Laravel.isLoggedin) {
            this.isLoggedIn = true
        }
    },
}
</script>

<style>
.dash-ht{
  min-height: 80vh;
}
</style>