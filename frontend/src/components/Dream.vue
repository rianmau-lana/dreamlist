<template>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="btn btn-lg">Dream List</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <router-link to="/dream/create" class="btn btn-success">Add Data</router-link>
                </div>
            </div>
        </div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Dream</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(dream, i) in dreamlist" :key="i">
                    <td>{{ i + 1 }}</td>
                    <td>{{ dream.items }}</td>
                    <td>{{ dream.status }}</td>
                    <td>
                        <router-link :to="'/dream/' + dream.id" class="btn btn-warning">Edit</router-link>
                        <button @click="deleteRow(dream.id)" class="btn btn-danger">Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    import { api } from '@/helper/api'

    export default {
        name: 'Dream',
        data() {
            return {
                dreamlist: []
            }
        },
        mounted() {
            this.get()
        },
        methods: {
            get() {
                api.get('dream').then(res => {
                    if (res.data.status === 'success') {
                        this.dreamlist = res.data.result
                    } else {
                        console.log(res.data.message)
                    }
                }).catch(err => {
                    console.log(err)
                })
            },
            deleteRow(id) {
                api.delete('dream/' + id).then(res => {
                    if (res.data.status === 'success') {
                        this.get()
                    } else {
                        console.log(res.data.message)
                    }
                }).catch(err => {
                    console.log(err)
                })
            }
        }
    }
</script>
<style scoped>
    .card {
        margin-top: 1cm;
        border-bottom: 5px solid #42b983;
    }

    .card-header {
        background-color: var(--info);
        color: white;
    }
</style>