<template>
    <div class="card">
        <div class="card-body">
            <form @submit.prevent="submitForm" class="form">
                <div class="row form-group">
                    <label class="col-md-2">Dream</label>
                    <input type="text" v-model="dreamlist.items" class="form-control col-md-10">
                </div>
                <div class="row form-group">
                    <label class="col-md-2">Status</label>
                    <select v-model="dreamlist.status" class="form-control col-md-10">
                        <option value="">Pilih Status</option>
                        <option value="tercapai">Tercapai</option>
                        <option value="belum_tercapai">Belum Tercapai</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-block btn-primary">Save</button>
            </form>
        </div>
    </div>
</template>

<script>
    import { api } from '@/helper/api'

    export default {
        name: 'DreamForm',
        data() {
            return {
                dreamlist: {
                    id: null,
                    items: '',
                    status: ''
                }
            }
        },
        mounted() {
            let id = this.$route.params.id

            if (id) {
                api.get('/dream/' + id).then(res => {
                    this.dream = res.data.result
                })
            }
        },
        methods: {
            submitForm() {
                let data = this.dreamlist
                let url = 'dream'

                if (this.dream.id) {
                    url += '/' + this.dream.id
                }

                api.post(url, data).then(res => {
                    if (res.data.status === 'success') {
                        this.$router.push('/')
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