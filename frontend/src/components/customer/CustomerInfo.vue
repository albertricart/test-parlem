<script setup>
import { computed } from "vue";

import ProductItem from '@/components/product/ProductItem.vue';
import Icon from "@/components/ui/Icon.vue";

const props = defineProps({
	customer: Object
});

const fullName = computed(() => {
	return `${props.customer.givenName} ${props.customer.familyName1}`;
});
</script>

<template>
	<div class="customer-info">
		<h1>Client</h1>
		<div class="customer-details">
			<div class="customer-details__group">
				<Icon name="person" />
				<h3 v-text="fullName"></h3>
			</div>

			<div class="customer-details__group">
				<Icon name="assignment_ind" />
				<p v-text="`${customer.docType}: ${customer.docNum}`"></p>
			</div>

			<div class="customer-details__group">
				<Icon name="email" />
				<p v-text="customer.email"></p>
			</div>

			<div class="customer-details__group">
				<Icon name="phone" />
				<p v-text="customer.phone"></p>
			</div>
		</div>

		<div class="customer-products">
			<h2>Productes</h2>
			<div class="customer-products__grid">
				<ProductItem v-for="(product, index) in customer.products" :key="index" :product="product"></ProductItem>
			</div>
		</div>
	</div>
</template>