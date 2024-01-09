<template>
    <div>
        <ul>
            <li v-for="(item, index) in maindate" :key="index">{{ `${index} = ${item.test} : ${item.test1}` }}</li>
        </ul>
        {{  }}
    </div>
</template>
<script>
    import axios from 'axios';

    export default{
        data(){
            return{
                maindate:[]
            }
        },
        mounted(){
            this.fetchData();
        },
        created() {
            const pusher = new Pusher('4639141d81a5abb6add7', {
                cluster: 'ap3',
                encrypted: true,
            });

            const channel = pusher.subscribe('channel-name');

            channel.bind('new-data', (data) => {
                console.log(data);
            });
        },
        methods:{
            fetchData(){
                axios.get('/checklist/show-checklist')
                .then(resopnse => {
                    this.maindate = resopnse.data;
                })
            }

        }
    }
</script>