<template>
    <div class="w-1/2 mx-auto py-12">
        <h1 class="text-4xl font-bold text-center mb-8">Edit Item</h1>
        <form @submit.prevent="submitForm" class="flex flex-col mb-4">
            <label for="name" class="mb-2">Description</label>
            <input type="text" name="name" v-model="name"
                class="rounded-lg py-2 px-4 border text-white bg-gray-700 dark:bg-gray-900 dark:text-white dark:border-gray-600 placeholder-gray-500 placeholder-opacity-75 mb-4">
            <div class="flex">
                <button type="submit"
                    class="bg-indigo-600 hover:bg-indigo-500 rounded-md text-white px-4 py-2 mr-2">Submit</button>
                <NuxtLink to="/" class="bg-gray-600 hover:bg-gray-500 rounded-md text-white px-4 py-2">Cancel</NuxtLink>
            </div>
        </form>
</div>
</template>
<script>
export default {
    data() {
        return {
            name: '', // add the name property
            id: '' // add the id property
        }
    },
    mounted() {
        this.id = this.$route.params.id; // get the id from the route params
        this.name = this.$route.params.name; // get the name from the route params
    },
    methods: {
        async submitForm() {
            await this.$axios.post(`http://127.0.0.1:8000/api/updateItem/${this.id}`, {
                id: this.id,
                name: this.name
            });

            this.$router.push('/');
        },
    }
}
</script>