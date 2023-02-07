<script setup>
import Icon from "@/components/ui/Icon.vue";
import { useFormatDate } from '@/composables/format.js';

defineProps(['product']);
</script>

<template>
	<div class="product-item">
		<Icon name="router" style="font-size: 4rem"/>

		<div class="product-item__type" v-text="product.productTypeName"></div>
		<div class="product-item__name" v-text="product.productName"></div>

		<div class="product-item__sold">
			<Icon name="shopping_cart"/>
			{{ useFormatDate(product.soldAt) }}
		</div>
		<div class="product-item__terminal">
			<Icon name="terminal"/>
			{{ product.numeracioTerminal }}
		</div>
	</div>
</template>