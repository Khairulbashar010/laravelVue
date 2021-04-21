<template>
    <div class="add-form">
        <div class="form-control">
            <label>Name</label>
            <input type="text" v-model="client.name" name="name" placeholder="Name" />
        </div>
        <div class="form-control">
            <label>Gender</label>
            <input type="text" v-model="client.gender" name="gender" placeholder="Gender" />
        </div>
        <div class="form-control">
            <label>Phone</label>
            <input type="text" v-model="client.phone" name="phone" placeholder="Phone No." />
        </div>
        <div class="form-control">
            <label>Email</label>
            <input type="email" v-model="client.email" name="email" placeholder="Email" />
        </div>
        <div class="form-control">
            <label>Address</label>
            <input type="text" v-model="client.address" name="address" placeholder="Address" />
        </div>
        <div class="form-control">
            <label>Nationality</label>
            <input type="text" v-model="client.nationality" name="nationality" placeholder="Nationality" />
        </div>
        <div class="form-control">
            <label>Date of Birth</label>
            <input type="text" v-model="client.dob" name="dob" placeholder="Birthday" />
        </div>
        <div class="form-control">
            <label>Education</label>
            <input type="text" v-model="client.education" name="education" placeholder="Education Level" />
        </div>
        <div class="form-control">
            <label>Preferred Contact Mode</label>
            <input type="text" v-model="client.contact_mode" name="contact_mode" placeholder="Preferred Contact" />
        </div>
        <button type="submit" @click="addClient()" class="btn btn-block">Save Client</button>
    </div>
</template>

<script>
import axios from 'axios'
import Button from "./Button";
export default {
    name: 'AddClient',
    components: {Button},
    data() {
        return {
            client:
                {
                    name: '',
                    gender: '',
                    phone: '',
                    email: '',
                    address: '',
                    nationality: '',
                    dob: '',
                    education: '',
                    contact_mode: ''
                }
        }
    },
    methods: {
        addClient() {
            axios.post('api/clients/store', {
                client: this.client
            })
                .then(response => {
                    if(response.status = 201) {
                        console.log("Client Created!")
                        this.client.name = ''
                        this.client.gender = ''
                        this.client.phone = ''
                        this.client.email = ''
                        this.client.address = ''
                        this.client.nationality = ''
                        this.client.dob = ''
                        this.client.education = ''
                        this.client.contact_mode = ''
                    }

                })
                .catch(error => {
                    console.log(error)
                })
        },
    },
}
</script>

<style scoped>
.add-form {
    margin-bottom: 40px;
}
.form-control {
    margin: 20px 0;
}
.form-control label {
    display: block;
}
.form-control input {
    width: 100%;
    height: 40px;
    margin: 5px;
    padding: 3px 7px;
    font-size: 17px;
}
.form-control-check {
    display: flex;
    align-items: center;
    justify-content: space-between;
}
.form-control-check label {
    flex: 1;
}
.form-control-check input {
    flex: 2;
    height: 20px;
}
</style>
