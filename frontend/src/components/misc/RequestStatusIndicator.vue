<script setup>
import RequestStatus from "@/classes/RequestStatus";
import Spinner from "@/components/ui/Spinner.vue";
defineProps(['status']);
</script>

<template>
	<TransitionGroup>
		<div v-if="status === RequestStatus.LOADING">
			<Spinner show></Spinner>
		</div>

		<!-- <div v-else-if="status === RequestStatus.SUCCESS"></div> -->

		<div v-else-if="status === RequestStatus.ERROR">
			Error
		</div>
	</TransitionGroup>
</template>