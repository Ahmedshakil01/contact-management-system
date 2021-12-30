<template>
    <div>
        <h3 class="text-center">Create Contact</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="addContact">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" v-model="contact.name">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" v-model="contact.email">
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" class="form-control" v-model="contact.phone">
                    </div>
                    <div class="form-group">
                        <label>Group</label>
                        <input type="text" class="form-control" v-model="contact.group">
                    </div>
                    <div class="form-group">
                        <label>Select Favourite</label>
                        <select class='form-control' v-model='is_favourite' @change='addContact()'>
                            <option>Select Favourite</option>
                            <option :value='1'>Yes</option>
                            <option :value='0'>No</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            contact: {}
        }
    },
    methods: {
        addContact() {
            this.axios
                .post('http://127.0.0.1:8000/api/v1/contacts', this.contact)
                .then(response => (
                    this.$router.push({ name: 'home' })
                ))
                .catch(err => console.log(err))
                .finally(() => this.loading = false)
        }
    }
}
</script>
