<script setup>
import PageHeader from '@/components/PageHeader.vue';
import { onMounted } from "vue";

onMounted(() => {
  console.log('CustomerView mounted.');
});
</script>

<template>
  <PageHeader/>
  <main>
    <h1>Customer</h1>
  </main>
</template>
