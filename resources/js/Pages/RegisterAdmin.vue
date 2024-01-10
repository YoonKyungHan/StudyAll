<script setup>
</script>
<template>
    <form @submit.prevent="submit">
        <div>
            <input type="hidden" name="is_admin" v-model="registerData.is_admin">
            아이디 : <input type="text" name="name" v-model="registerData.name">
            이메일 : <input type="email" name="email" v-model="registerData.email">
            패스워드 : <input type="password" name="password" v-model="registerData.password">
            패스워드 확인 : <input type="password" name="password_confirmation" v-model="registerData.password_confirmation">
        </div>
        <div>
            <button>Register</button>
        </div>
    </form>
</template>

<script>
import axios from "axios";

export default {
    data() {
        return {
            registerData:{
                is_admin: "admin",
                name: "",
                email: "",
                password: "",
                password_confirmation: ""
            }
        }
    },
    methods: {
        submit(){
            axios.post('registerAdmin/store', this.registerData)
            .then(response => {
                console.log(response);
            }).catch((error) => {
                console.log(error);
            })
        }
    }

}
</script>