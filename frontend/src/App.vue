<script setup>
import { RouterLink, RouterView } from 'vue-router'
</script>

<template>
  <header>
    <img alt="Parlem logo" class="logo" src="@/assets/logo.svg" width="120" height="35" />
  </header>

  <RouterView/>
</template>