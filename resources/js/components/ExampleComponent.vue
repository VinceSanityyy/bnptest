<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="margin-top:100px">
                    <div class="card-header">Users List </div>

                    <div class="card-body">
                        <table id="mytableFeeds" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Latest Payment Amount</th>
                                    <th>Latest Payment Date</th>
                                    <th>Total Loan Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="user in users" :key="user.id">
                                    <td>{{user.name}}</td>
                                    <td>{{user.email}}</td>
                                    <td>{{user.latest_payment.toLocaleString()}}</td>
                                    <td>{{user.payment_date}}</td>
                                    <td>{{user.loan_amount.toLocaleString()}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import { useLoading } from 'vue3-loading-overlay';
    import 'vue3-loading-overlay/dist/vue3-loading-overlay.css';

    export default {
        data(){
            return{
                users:[]
            }
        },
        methods:{
            fetchUsers(){
                let loader = useLoading();
                loader.show({
                    canCancel: false,
                    loader: 'bars',
                    color: 'green'
                });
    
                setTimeout(() => {
                    axios.get('api/users').then((res)=>{
                        console.log(res)
                        this.users = res.data
                        loader.hide()
                    })
                },10000) 
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        created(){
            this.fetchUsers()
        },
    }
</script>
