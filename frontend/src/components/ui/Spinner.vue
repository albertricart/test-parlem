<script setup>
defineProps({
	show: Boolean
});
</script>

<template>
	<div class="spinner" v-if="show"></div>
</template>