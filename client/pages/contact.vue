<template>
  <div class="min-h-screen bg">
    <header>
      <nav class="bg-gray-900 text-white py-4">
        <div class="max-w-7xl mx-auto px-4 flex justify-between items-center">
          <nuxt-link to="/" class="text-2xl font-bold">Nuxt Website</nuxt-link>
          <div class="flex space-x-4">
            <nuxt-link to="/" class="hover:text-gray-300">Home</nuxt-link>
            <nuxt-link to="/about" class="hover:text-gray-300">About</nuxt-link>
            <nuxt-link to="/contact" class="hover:text-gray-300">Contact</nuxt-link>
          </div>
        </div>
      </nav>
    </header>
    <div class="max-w-7xl mx-auto py-8 px-4 justify-center flex text-white">
      <p class="text-3xl font-bold tracking-wide">Contact Us</p>
    </div>
</div>
</template>

<script>
export default {
  head: {
    title: "Contact Us",
  },
  name: "contact"
}
</script>
