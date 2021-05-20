<template>
<div class="container-fluid">
  <div class="row">

    <div class="col-xl-8 order-xl-1 offset-xl-2">
      <div class="card shadow">
        <div class="card-header bg-white border-0">
          <div class="row align-items-center">
            <h3 class="mb-0">Add New User</h3>            
          </div>
        </div>
        <div class="card-body">
          <form @submit.prevent="addUser">
            <h6 class="heading-small text-muted mb-4">User information</h6>
            
            <div v-if="isSuccess" class="alert alert-success alert-dismissible fade show" role="alert">
              successfully added
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
           

            <div class="pl-lg-4">
              <div class="form-group ">

                <label class="form-control-label">Name</label>
                <input type="text" name="name" v-model="user.name"
                  class="form-control form-control-alternative"
                  placeholder="Name" required >
                
                <!-- <span class="invalid-feedback" role="alert">
                  <strong></strong>
                </span> -->
                
              </div>
              <div class="form-group">
                <label class="form-control-label">Email</label>
                <input type="email" name="email" v-model="user.email"
                  class="form-control form-control-alternative"
                  placeholder="Email" required >

                
                <!-- <span class="invalid-feedback" role="alert">
                  <strong></strong>
                </span> -->
               
              </div>

              <div class="form-group">
                <label class="form-control-label">Phone</label>
                <input type="number" name="phone" v-model="user.phone"
                  class="form-control form-control-alternative"
                  placeholder="Phone" required >                
                <!-- <span class="invalid-feedback" role="alert">
                  <strong></strong>
                </span> -->
              </div>

              <div class="form-group">
                <label class="form-control-label">User Type</label>
                <select class="form-control form-control-alternative" v-model="user.user_type"
                  name="user_type" required >
                  <option value="" selected>Select User Type</option>
                  <option value="1">Doctor</option>
                  <option value="2">Admin</option>
                  <option value="3">Super Admin</option>
                </select>
                
                <!-- <span class="invalid-feedback" role="alert">
                  <strong></strong>
                </span> -->
                
              </div>
              <div class="form-group">
                <label class="form-control-label">Hospital</label>
                <select class="form-control form-control-alternative" v-model="user.hospital_id"
                  name="hospital_id" required >
                  <option value="" selected>Select Hospital</option>
                  <option v-for="hos in hospitals" :key="hos.id" :value="hos.id">{{ hos.name }}</option>
                </select>
                
                <!-- <span class="invalid-feedback" role="alert">
                  <strong></strong>
                </span> -->
                
              </div>

              <div class="form-group">
                <label class="form-control-label">New Password</label>
                <input type="password" name="password" v-model="user.password"
                  class="form-control form-control-alternative"
                  placeholder="New Password" >

               
                <!-- <span class="invalid-feedback" role="alert">
                  <strong></strong>
                </span> -->
              
              </div>
              <div class="form-group">
                <label class="form-control-label"
                  for="input-password-confirmation">Confirm Password</label>
                <input type="password" name="password_confirmation" v-model="user.password_confirmation"
                  class="form-control form-control-alternative" placeholder="Confirm New Password"
                  required>
              </div>

              <div class="text-center">
                <button type="submit" class="btn btn-success mt-4">Save User</button>
              </div>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>

</div>  
</template>

<script>
export default {
  data() {
    return {
     user: {},
     hospitals: {},
     isSuccess: false
    }
  },
  created() {
        this.$axios.get('/sanctum/csrf-cookie').then(response => {
            this.$axios.get('/api/users/getHospital')
                .then(response => {
                    this.hospitals = response.data;
                })
                .catch(function (error) {
                    console.error(error);
                });
        })
    },
  methods: {
     addUser() {
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                this.$axios.post('/api/users/add', this.user)
                    .then(response => {
                        this.$router.push({name: 'users'})
                        this.isSuccess=true
                    })
                    .catch(err => console.log(err.response));
                    // .catch(function (error) {
                    //     console.error(error);
                    // });
            })
        }
  },
  beforeRouteEnter(to, from, next) {
        if (!window.Laravel.isLoggedin) {
            window.location.href = "/lsyt/login";
        }
        next();
    }

}
</script>
