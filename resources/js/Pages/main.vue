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

        <form @submit.prevent="subupdate">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            <input type="text" name="id" v-model="formUpData.id">
            <input type="text" name="test" v-model="formUpData.test">
            <input type="text" name="test1" v-model="formUpData.test1">
            <button type="submit">update</button>
        </form>

        <form @submit.prevent="subdelete">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            <input type="text" name="id" v-model="formDelete.id">
            <button type="submit">deletes</button>
        </form>
        {{ formDelete.id }}
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
            formUpData: {
                id: '',
                test: '',
                test1: ''
            },
            formDelete: {
                id: ''
            },
            maindata: [],
            mainupdate: [],
            maindelete: []
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
        subupdate(evnet) {
            axios.post('main/update', this.formUpData)
            .then(response => {
                evnet.target.id.value = "";
                evnet.target.test.value = "";
                evnet.target.test1.value = "";
            }).catch((error) => {
                console.log(error);
            })
        },
        subdelete() {
            axios.delete(`/main/deletes/${this.formDelete.id}`)
            .then(response => {
                console.log(response.data);
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