<template>
    <div>
        <h2 class="text-center">Contact List</h2>

        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Group</th>
                <th>Favourite</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="contact in contacts" :key="contact.id">
                <td>{{ contact.id }}</td>
                <td>{{ contact.name }}</td>
                <td>{{ contact.email }}</td>
                <td>{{ contact.phone }}</td>
                <td>{{ contact.group }}</td>
                <td>{{ contact.is_favourite }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'edit', params: { id: contact.id }}" class="btn btn-success">Edit</router-link>
                        <button class="btn btn-danger" @click="deleteContact(contact.id)">Delete</button>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    data() {
        return {
            contact: []
        }
    },
    created() {
        this.axios
            .get('http://127.0.0.1:8000/api/v1/contacts')
            .then(response => {
                this.contacts = response.data;
            });
    },
    methods: {
        deleteContact(id) {
            this.axios
                .delete(`http://127.0.0.1:8000/api/v1/contacts/${id}`)
                .then(response => {
                    let i = this.contacts.map(data => data.id).indexOf(id);
                    this.contacts.splice(i, 1)
                });
        }
    }
}
</script>
