<script setup>
</script>
<template>
    <div>
        <h1>Hello, Inertia.js with Vue!</h1>
        <form @submit.prevent="submitForm">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            <input type="text" name="test" v-model="formData.test">
            <input type="text" name="test1" v-model="formData.test1">
            <button type="submit">Save</button>
        </form>
        
        <!-- <ul>
            <li v-for="(item, index) in maindata" :key="index">
                <p>list{{  }} Test: {{ item.test }} Test1: {{ item.test1 }}</p>
                <br>
            </li>
        </ul> -->
    </div>
</template>
<script>
import axios from 'axios';
export default {
    data() {
        return {
            formData: {
                test: '',
                test1: ''
            },
            maindata: []
        };
    },
    mounted() {
        this.fetchData();
    },
    methods: {
        submitForm() {
            //this.$inertia.post('main/store', this.formData);
            axios.post('main/store', this.formData)
            .then(response => {
                location.reload();
            }).catch((error) => {
                console.log(error);
            })
        },
        fetchData(){
        axios.get('/main/show-main')  
        .then(response => {
            this.maindata = response.data;
        })
        .catch(error => {
          console.error('Error fetching data:', error);
        });
        }


    }
};
</script>