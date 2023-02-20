<template>
    <div>
        <form class="flex mb-4" @submit.prevent="createItem">
            <input
                class="flex-1 rounded-l-lg py-2 px-4 border-t mr-0 border-b border-l text-white bg-gray-700 dark:bg-gray-900 dark:text-white dark:border-gray-600 placeholder-gray-500 placeholder-opacity-75"
                type="text" v-model="newItemName" placeholder="Add a new item...">
            <button type="submit" class="bg-indigo-600 hover:bg-indigo-500 rounded-r-lg text-white px-4 py-2">Add</button>
        </form>

        <ul class="border-t border-l border-r border-b divide-y divide-gray-600">
            <li v-for="listItem in listItems" :key="listItem.id" class="py-4 px-2">
                <div class="flex items-center">
                    <span class="flex-1">{{ listItem.name }}</span>
                    <div class="flex">
                        <form @submit.prevent="markComplete(listItem.id)" class="mr-2">
                            <button type="submit" class="bg-green-600 hover:bg-green-500 px-4 py-2 rounded-md text-white">
                                Complete
                            </button>
                        </form>
                        <NuxtLink :to="{ name: 'edit', params: { id: listItem.id, name: listItem.name, API_URL: API_URL } }"
                            class="bg-yellow-500 hover:bg-yellow-400 px-4 py-2 rounded-md mr-2 text-white">
                            Edit
                        </NuxtLink>
                        <form @submit.prevent="deleteItem(listItem.id)">
                            <button type="submit" class="bg-red-600 hover:bg-red-500 px-4 py-2 rounded-md text-white">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    data() {
        return {
            listItems: [],
            newItemName: "",
            API_URL: "http://127.0.0.1:8000/api/",
        };
    },
    async fetch() {
        const response = await this.$axios.get(this.API_URL + "items");
        this.listItems = response.data;
    },
    methods: {
        async createItem() {
            const response = await this.$axios.post(this.API_URL + "createItem", {
                name: this.newItemName,
            });

            if (response.data.flash.type != "error") {
                this.listItems.push({
                    id: response.data.id,
                    name: response.data.name,
                });

                this.newItemName = "";
            }

            this.$toast.show(response.data.flash.message, {
                icon: response.data.flash.icon,
                type: response.data.flash.type,
                duration: 2000,
            })
        },
        async markComplete(id) {
            const response = await this.$axios.post(this.API_URL + `markComplete/${id}`);
            this.listItems = this.listItems.filter((listItem) => listItem.id !== id);

            this.$toast.show(response.data.flash.message, {
                icon: response.data.flash.icon,
                type: response.data.flash.type,
                duration: 2000,
            })
        },
        async deleteItem(id) {
            const response = await this.$axios.post(this.API_URL + `deleteItem/${id}`);
            this.listItems = this.listItems.filter((listItem) => listItem.id !== id);

            this.$toast.show(response.data.flash.message, {
                icon: response.data.flash.icon,
                type: response.data.flash.type,
                duration: 2000,
            })
        },
    },
};
</script>
  