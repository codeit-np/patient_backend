<template>
  <footer class="footer mt-5 mb-3 pt-0">
      <div class="row align-items-center justify-content-lg-between">
        <div class="col-lg-8 offset-lg-2">
          <div class="copyright text-end text-xl-left text-muted">
            &copy; KHDC Nepal -  {{new Date().getFullYear()}}. Developed by <a href="https://lotussoft.com.np" class="font-weight-bold ml-1"
              target="_blank">LotusSoft &amp; YoungTech</a>
          </div>
        </div>
        
      </div>
    </footer>
</template>

<script>
export default {
name:'Footer'
}
</script>

<style>
/* .copyright{
  position:fixed;
  bottom: 2%;
  left:50%;
  margin:auto;
}
footer {
  position: relative;
  bottom: 2%;
  min-height: 25vh;
} */
</style>