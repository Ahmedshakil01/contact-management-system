import AllContactList from './components/AllContactList.vue';
import CreateContact from './components/CreateContact.vue';
import EditContact from './components/EditContact.vue';

export const routes = [
    {
        name: 'home',
        path: '/',
        component: AllContactList
    },
    {
        name: 'create',
        path: '/create',
        component: CreateContact
    },
    {
        name: 'edit',
        path: '/edit/:id',
        component: EditContact
    }
];
