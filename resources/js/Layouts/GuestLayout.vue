<script setup>
import Navbar from "@/Components/Navbar.vue";
</script>

<template>
    <Navbar/>
    <div class="bg-gray-100">
        <slot/>
    </div>
</template>
