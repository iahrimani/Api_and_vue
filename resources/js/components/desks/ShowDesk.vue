<template>
    <div class="container">
        <div class="form-group">
            <input type="text" @blur="saveName" v-model="name" class="form-control">
        </div>
        <div class="alert alert-danger" role="alert" v-if="errored">
            Ошибка загрузки данных !
        </div>
        <div class="spinner-border" role="status" v-if="loading">
            <span class="sr-only">Загрузка...</span>
        </div>
    </div>
</template>

<script>
export default {
    props: [
        'deskId'
    ],
    data() {
        return {
            name: null,
            errored: false,
            loading: true,
        }
    },
    methods: {
        // https://www.youtube.com/watch?v=VwQr6LLua_M&list=PLze7bMjv1CYtP6FSv6L60IpI3rynxAStr&index=9
        saveName() {
            axios.post('/api/V1/desks/' + this.deskId, {
                _method: 'PUT',
                name: this.name,
            })
                .then(response => {
                    this.desk = response.data.data
                })
                .catch(error => {
                    console.log(error)
                    this.errored = true
                })
                .finally(() => {
                    this.loading = false
                })
        }
    },
    mounted() {
        axios.get('/api/V1/desks/' + this.deskId)
            .then(response => {
                this.name = response.data.data.name
            })
            .catch(error => {
                console.log(error)
                this.errored = true
            })
            .finally(() => {
                this.loading = false
            })
    },


}
</script>

