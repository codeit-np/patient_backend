<template>
<div class="mt-2"></div>
<div  class="table-responsive">
<button v-if="auth_user_type==3" type="button" class="btn btn-info my-2" @click="this.$router.push({name:'addhospital'})">Add Hospital</button>
<table  class="table align-items-center table-flush table-bordered">
  <thead>
    <tr>
      <th>S.NO</th>
      <th>Name</th>
      <th>Address</th>
      <th>Phone</th>
      <th>Hospital type</th>
      <th>Action</th>
    </tr>
  </thead>
  
  <tbody v-if="hospitals">
    <tr v-for="(hospital, index) in hospitals" :key="hospital.id">
      <td>{{ index + 1 }}</td>      
      <td>{{ hospital.name }}</td>      
      <td>{{ hospital.address }}</td>      
      <td>{{ hospital.contact1 }}, {{ hospital.contact2 }}</td>      
      <td>
        {{ hospital.type }}
      </td>
      <td>
        <div class="d-flex justify-content-start">
            <router-link :to="{name: 'edithospital', params: { id: hospital.id }}" class="btn btn-primary" v-if="auth_user_type==2 || auth_user_type==3">Edit
            </router-link>
            <button v-if="auth_user_type==3" class="btn btn-danger ml-2" @click="deleteHospital(hospital.id)">Delete</button>
        </div>
      </td>      
    </tr>
  </tbody>
  <div v-else> <div><h3>Loading data</h3></div></div>
</table>
</div>  
</template>

<script>
export default {
    data() {
        return {
            hospitals: [],
            auth_user_type:''
        }
    },
    created() {
        this.$axios.get('/sanctum/csrf-cookie').then(response => {
            this.$axios.get('/api/hospitals')
                .then(response => {
                    this.hospitals = response.data;
                    this.auth_user_type = window.Laravel.user.user_type
                })
                .catch(function (error) {
                    console.error(error);
                });
        })
    },
    methods: {
        deleteHospital(id) {
            if(confirm('Are you sure to delete this record?'))
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                this.$axios.delete(`/api/hospitals/${id}`)
                    .then(response => {
                        let i = this.hospitals.map(item => item.id).indexOf(id); // find index of your object
                        this.hospitals.splice(i, 1)
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
