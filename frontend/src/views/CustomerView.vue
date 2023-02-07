<script setup>
import { reactive, ref } from "vue";
import { useRoute } from "vue-router";

import axios from "axios";

import CustomerInfo from '@/components/customer/CustomerInfo.vue';
import PageHeader from '@/components/PageHeader.vue';
import RequestStatusIndicator from "@/components/misc/RequestStatusIndicator.vue";

import RequestStatus from "@/classes/RequestStatus";

import { URL as API_URL } from '@/api.js';

const status = ref(RequestStatus.LOADING);
const state = reactive({
  customer: null,
});

// FETCH CUSTOMER
axios.get(`${API_URL}/customers/${useRoute().params.id}`)
  .then(response => {
    state.customer = response.data;
    status.value = RequestStatus.SUCCESS;
  })
  .catch(error => {
    status.value = RequestStatus.ERROR;
  });


</script>

<template>
  <PageHeader />

  <main>
    <section class="container customer-view">
      <TransitionGroup>
        <CustomerInfo v-if="state.customer" :customer="state.customer"></CustomerInfo>

        <RequestStatusIndicator v-else :status="status" class="inset"></RequestStatusIndicator>
      </TransitionGroup>
    </section>
  </main>
</template>