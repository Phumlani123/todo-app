<template>

    <div class="page-content page-container" id="page-content">
        <div class="padding">
            <div class="row container d-flex justify-content-center">
                <div class="col-md-10">
                    <div class="card px-3">
                        <div class="card-body">
                            <h2 class="card-title mb-4">Complete list</h2>
                            
                            <div class="list-wrapper">
                                <ul class=" flex-column-reverse todo-list">
                                    
                                    <li class=""  v-for="todo in todos" :key="todo.id" :class="{completed: todo.complete}">
                                        <div  class="form-check  mr-auto">
                                            <label class="form-check-label">
                                                <input v-model="todo.complete"  class="checkbox " type="checkbox"> 
                                                {{ todo.desc }} 
                                            </label>
                                        </div> 
                                        <i @click="editItem(todo.id)" class="edit-item mdi my-auto "></i>
                                        <i @click="deleteItem(todo.id)" class="remove mdi my-auto"></i>
                                    </li>
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
                fullPage: true
            }
        },
        created() {
            let loader = this.$loading.show();
            this.axios
                .get('http://localhost:8000/api/todos/')
                .then(response => {
                    console.log(response.data)
                    this.todos = response.data.filter(item => item.complete == true);
                    loader.hide()
                })
                .catch(err => {loader.hide(), this.$swal(err)});
        },
        methods: {
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
                    .catch(err => {loader.hide(), this.$swal(err)});
            },
             editItem(id) {
                this.$router.push(`/edit/${id}`);
            },
            
        }
    }
</script>