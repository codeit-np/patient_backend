<template>
<div class="mt-2"></div>
<div class="table-responsive">
<button v-if="auth_user_type==3" type="button" class="btn btn-info my-2" @click="this.$router.push({name:'adduser'})">Add User</button>
<table  class="table align-items-center table-flush table-bordered">
  <thead>
    <tr>
      <th>S.NO</th>
      <th>Name</th>
      <th>Email</th>
      <th>Phone</th>
      <th>User type</th>
      <!-- <th>Hospital</th> -->
      <th>Action</th>
    </tr>
  </thead>
  <tbody  v-if="users">
    <tr v-for="(user, index) in users" :key="user.id">
      <td>{{ index + 1 }}</td>      
      <td>{{ user.name }}</td>      
      <td>{{ user.email }}</td>      
      <td>{{ user.phone }}</td>      
      <td>
        <span v-if="user.user_type==null">N/a</span>
        <span v-if="user.user_type==1">Doctor</span>
        <span v-if="user.user_type==2">Admin</span>
        <span v-if="user.user_type==3">Super Admin</span>
      </td>
      <!-- <td> <span v-if="user.hospital_id">{{ user.hospital.name }}</span> <span v-else></span></td>   -->
      <td>
        <div class="d-flex justify-content-start">
            <!-- <router-link :to="{name: 'edituser', params: { id: user.id }}" class="btn btn-primary" v-if="auth_user_type==2 || auth_user_type==3">Edit
            </router-link> -->
            <button v-if="auth_user_type==3" class="btn btn-danger ml-2" @click="deleteUser(user.id)">Delete</button>
        </div>
      </td>      
    </tr>
  </tbody>
<div v-else><div><h3>Loading data</h3></div></div>
</table>
</div>
  
</template>

<script>
export default {
    props: {
    },
    data() {
        return {
            users: [],
            auth_user_type:''
        }
    },
    created() {
        this.$axios.get('/sanctum/csrf-cookie').then(response => {
            this.$axios.get('/api/users')
                .then(response => {
                    this.users = response.data;
                    this.auth_user_type = window.Laravel.user.user_type
                })
                .catch(function (error) {
                    console.error(error);
                });
        })
    },
    methods: {
        deleteUser(id) {
            if(confirm('Are you sure to delete this record?'))
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                this.$axios.delete(`/api/users/delete/${id}`)
                    .then(response => {
                        let i = this.users.map(item => item.id).indexOf(id); // find index of your object
                        this.users.splice(i, 1)
                    })
                    .catch(function (error) {
                        console.error(error);
                    });
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
