<template>
<div class="mt-2"></div>
<div  class="table-responsive">
<button v-if="auth_user_type==3" type="button" class="btn btn-info my-2" @click="this.$router.push({name:'addpatient'})">Add Patient Screening</button>
<table  class="table align-items-center table-flush table-bordered">
  <thead>
    <tr>
      <th>S.NO</th>
      <th>Name</th>
      <th>Address</th>
      <th>Phone</th>
      <th>Sex</th>
      <th>Age</th>
      <th>Action</th>
    </tr>
  </thead>
  
  <tbody>
    <tr v-for="(patient, index) in patients" :key="patient.id">
      <td>{{ index + 1 }}</td>      
      <td>{{ patient.firstname }} &nbsp; {{ patient.lastname }}</td>      
      <td>{{ patient.address }}</td>
      <td>{{ patient.phone1 }} <span v-if="patient.phone2">, </span> {{ patient.phone2 }}</td>
      <td>{{ patient.sex }}</td>      
      <td>{{ patient.age }}</td>      
      <td>
        <div class="d-flex justify-content-start">
            <router-link :to="{name: 'editpatient', params: { id: patient.id }}" class="btn btn-primary" v-if="auth_user_type==2 || auth_user_type==3">Edit
            </router-link>
            <button v-if="auth_user_type==3" class="btn btn-danger ml-2" @click="deletePatient(patient.id)">Delete</button>
        </div>
      </td>      
    </tr>
  </tbody>
</table>
</div>  
</template>

<script>
export default {
    data() {
        return {
            patients: [],
            auth_user_type:''
        }
    },
    created() {
        this.$axios.get('/sanctum/csrf-cookie').then(response => {
            this.$axios.get('/api/patients')
                .then(response => {
                    this.patients = response.data;
                    this.auth_user_type = window.Laravel.user.user_type
                })
                .catch(function (error) {
                    console.error(error);
                });
        })
    },
    methods: {
        deletePatient(id) {
            if(confirm('Are you sure to delete this record?'))
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                this.$axios.delete(`/api/patients/${id}`)
                    .then(response => {
                        console.log(response.data)
                        let i = this.patients.map(item => item.id).indexOf(id); // find index of your object
                        this.patients.splice(i, 1)
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
