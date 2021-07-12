import Todos from './components/Todos.vue';
import EditTodo from './components/EditTodo.vue';
import ActiveTodos from './components/Active.vue';
import CompleteTodos from './components/Complete.vue';
 

export const routes = [
    {
        name: 'home',
        path: '/',
        component: Todos
    },
    {
        name: 'edit',
        path: '/edit/:id',
        component: EditTodo
    },
    {
        name: 'active',
        path: '/active',
        component: ActiveTodos
    },
    {
        name: 'complete',
        path: '/complete',
        component: CompleteTodos
    }
];