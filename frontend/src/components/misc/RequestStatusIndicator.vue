<script setup>
import RequestStatus from "@/classes/RequestStatus";
import Spinner from "@/components/ui/Spinner.vue";
import Alert from "@/components/ui/Alert.vue";
defineProps(['status']);
</script>

<template>
	<div style="min-height: 100px">
		<TransitionGroup>
			<div v-if="status === RequestStatus.LOADING">
				<Spinner show></Spinner>
			</div>

			<!-- <div v-else-if="status === RequestStatus.SUCCESS"></div> -->

			<div v-else-if="status === RequestStatus.ERROR">
				<Alert message="Ha ocurrido un error" type="error"></Alert>
			</div>
		</TransitionGroup>
	</div>
</template>