<script setup>
import Icon from "@/components/ui/Icon.vue";
import { computed } from "vue";

const props = defineProps(['message', 'type']);
const icon = computed(() => {
	switch(props.type) {
		case 'error':
			return 'error';

		case 'success':
			return 'done';
	}
});
</script>
<template>
	<div :class="`alert alert--${type}`">
		<Icon :name="icon"/>
		<div v-text="message"></div>
	</div>
</template>