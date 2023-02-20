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
    head: {
        title: "Edit Form"
    },
    data() {
        return {
            name: "",
            id: "",
            API_URL: "",
        }
    },
    mounted() {
        this.id = this.$route.params.id;
        this.name = this.$route.params.name;
    },
    methods: {
        async submitForm() {
            const response = await this.$axios.post(`updateItem/${this.id}`, {
                id: this.id,
                name: this.name
            });

            this.$toast.show(response.data.flash.message, {
                icon: response.data.flash.icon,
                type: response.data.flash.type,
                duration: 2000,
            })

            this.$router.push("/");
        },
    }
}
</script>