<template>

    <div class="page-content page-container mb-5" id="page-content">
        <div class="padding">
            <div class="row container d-flex justify-content-center">
                <div class="col-md-10">
                    <div class="card px-3">
                        <div class="card-body">
                            <h2 class="card-title mb-4">Todo list</h2>
                            <div class="add-items "> 
                                <form @submit.prevent="addItem">
                                    <div class="input-group mb-3">
                                        <input type="hidden" class="form-control" v-model="todo.complete" >
                                        <input type="text" class="form-control" v-model="todo.desc" placeholder="Add item to list" aria-label="Add item to list" aria-describedby="button-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-info" type="submit" id="button-addon2">Add</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="list-wrapper">
                                <ul class=" flex-column-reverse todo-list">
                                    <div v-if="todos">
                                        <li class=""  v-for="todo in todos" :key="todo.id" :class="{completed: todo.complete}">
                                            <div  class="form-check  mr-auto">
                                                <label @click="editItemStatus(todo)" class="form-check-label">
                                                    <input v-model="todo.complete"  class="checkbox " type="checkbox"> 
                                                    {{ todo.desc }} 
                                                </label>
                                            </div> 
                                            <i @click="editItem(todo.id)" class="edit-item mdi my-auto "></i>
                                            <i @click="deleteItem(todo.id)" class="remove mdi my-auto"></i>
                                        </li>
                                    </div>
                                    <h3 v-else>No Todos in your list <br><small>please create them by completing the form above</small></h3>
                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
 
<script>
    export default {
        data() {
            return {
                todos: [],
                todo: { complete: false },
                fullPage: true
            }
        },
        created() {
            let loader = this.$loading.show();
            this.axios
                .get('http://localhost:8000/api/todos/')
                .then(response => {
                    this.todos = response.data;
                    loader.hide()
                })
                .catch(err => {loader.hide(), this.$swal('Something went wrong')});
        },
        methods: {
            addItem() {
                let loader = this.$loading.show();
                this.axios
                    .post('http://localhost:8000/api/todos', this.todo)
                    .then(response => (
                        loader.hide(),
                        this.$swal(response.data),
                        this.$router.go()
                    ))
                    .catch(err => {loader.hide(), this.$swal('Something went wrong')});
            },
            deleteItem(id) { 
                let loader = this.$loading.show();
                this.axios
                    .delete(`http://localhost:8000/api/todos/${id}`)
                    .then(response => {
                        loader.hide();
                        this.$swal(response.data);
                        let index = this.todos.map(data => data.id).indexOf(id);
                        this.todos.splice(index, 1);
                    })
                    .catch(err => {loader.hide(), this.$swal('Something went wrong')});
            },
            editItemStatus(item) {
                let loader = this.$loading.show();
                this.axios
                    .patch(`http://localhost:8000/api/todos/${item.id}`, {complete: !item.complete})
                    .then((response) => {
                        loader.hide();
                        this.$swal(response.data);
                    })
                    .catch(err => {loader.hide(), this.$swal('Something went wrong')});
            },
             editItem(id) {
                this.$router.push(`/edit/${id}`);
            },
            
        }
    }
</script>