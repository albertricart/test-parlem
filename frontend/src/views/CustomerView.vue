<script setup>
import { computed, reactive, ref, watch } from "vue";
import { useRoute } from "vue-router";

import axios from "axios";

import PageHeader from '@/components/PageHeader.vue';
import ProductItem from '@/components/product/ProductItem.vue';
import RequestStatusIndicator from "@/components/misc/RequestStatusIndicator.vue";
import Icon from "@/components/ui/Icon.vue";

import RequestStatus from "@/classes/RequestStatus";

import { URL as API_URL } from '@/api.js';

const status = ref(RequestStatus.LOADING);
const state = reactive({
  customer: null,
});

// FETCH CUSTOMER
axios.get(`${API_URL}/customers/${useRoute().params.id}`)
  .then(response => {
    status.value = RequestStatus.SUCCESS;
    state.customer = response.data;
  })
  .catch(error => {
    status.value = RequestStatus.ERROR;
  });


const fullName = computed(() => {
  return `${state.customer?.givenName} ${state.customer?.familyName1}`;
});

</script>

<template>
  <PageHeader />

  <main>
    <section class="container customer-view">
      <h1>Client</h1>

      <TransitionGroup>
        <div class="customer-info" v-if="state.customer">
          <div class="customer-details">
            <div class="customer-details__group">
              <Icon name="person" />
              <h3 v-text="fullName"></h3>
            </div>

            <div class="customer-details__group">
              <Icon name="assignment_ind" />
              <p v-text="`${state.customer.docType}: ${state.customer.docNum}`"></p>
            </div>

            <div class="customer-details__group">
              <Icon name="email" />
              <p v-text="state.customer.email"></p>
            </div>

            <div class="customer-details__group">
              <Icon name="phone" />
              <p v-text="state.customer.phone"></p>
            </div>
          </div>

          <div class="customer-products">
            <h2>Productes</h2>
            <div class="customer-products__grid">
              <ProductItem v-for="(product, index) in state.customer.products" :key="index" :product="product"></ProductItem>
            </div>
          </div>
        </div>

        <RequestStatusIndicator v-else :status="status"></RequestStatusIndicator>
      </TransitionGroup>
    </section>
  </main>
</template>