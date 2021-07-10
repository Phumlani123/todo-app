<template>
    <!-- <div>
        <h3 class="text-center">Create Todo</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="addItem">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" v-model="product.name">
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </div> -->
    <div>test</div>
</template>
 
<script>
    export default {
        data() {
            return {
                todo: {}
            }
        },
        methods: {
            // addItem() {
            //     this.axios
            //         .post('http://localhost:8000/api/todo_items', this.todo)
            //         .then(response => (
            //             this.$router.push({ name: 'home' })
            //         ))
            //         .catch(err => console.log(err))
            //         .finally(() => this.loading = false)
            // }
        }
    }
</script>