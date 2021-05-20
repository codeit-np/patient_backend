<template>
    <div>
        <h4 class="text-center">Add Hospital</h4>        
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <form @submit.prevent="addHospital">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" v-model="hospital.name" required>
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" name="address" class="form-control" v-model="hospital.address" required>
                    </div>

                    <div class="form-group">
                        <label>Contact 1</label>
                        <input type="text" name="contact1" class="form-control" v-model="hospital.contact1">
                    </div>
                    <div class="form-group">
                        <label>Contact 2</label>
                        <input type="text" name="contact2" class="form-control" v-model="hospital.contact2">
                    </div>
                    <div class="form-group">
                      <label>Hospital Type</label>
                      <select class="form-control form-control-alternative" v-model="hospital.type"
                        name="type" required >
                        <option value="" selected>Select Hospital Type</option>
                        <option value="Clinic">Clinic</option>
                        <option value="Help Post">Help Post</option>
                        <option value="Hospital">Hospital</option>
                      </select>
                    </div>
                    <div v-if="errors.length" class="alert alert-danger">
                      <p>
                      <b>Please correct the following error(s):</b>
                      <ul>
                        <li v-for="error in errors" :key="error">{{ error }}</li>
                      </ul>
                    </p>
                    </div>
                    
                    <button type="submit" class="btn btn-primary mb-3" @click="checkForm" >Add Hospital</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            hospital: {},
            errors: []

        }
    },
    methods: {
        checkForm: function () {
        if (this.hospital.name && this.hospital.address && this.hospital.type) {
            this.errors = [];
          return true;
        }
        this.errors = [];
        if (!this.hospital.name) {
        this.errors.push('Name required.');
        }
        if (!this.hospital.address) {
          this.errors.push('Address required.');
        }
        if (!this.hospital.type) {
          this.errors.push('Type required.');
        }
        },
        addHospital() {
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                this.$axios.post('/api/hospitals', this.hospital)
                    .then(response => {
                        console.log(response.data)
                        this.$router.push({name: 'hospitals'})
                    })
                    .catch(function (error) {
                        console.error(error);
                    });
            })
        }
    },
    beforeRouteEnter(to, from, next) {
        if (!window.Laravel.isLoggedin) {
            window.location.href = "/";
        }
        next();
    }
}
</script>