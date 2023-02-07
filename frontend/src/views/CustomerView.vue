<script setup>
import { reactive, ref, watch } from "vue";
import axios from "axios";
import PageHeader from '@/components/PageHeader.vue';
import { URL as API_URL } from '@/api.js';
import RequestStatus from "@/classes/RequestStatus";
import RequestStatusIndicator from "@/components/misc/RequestStatusIndicator.vue";

const status = ref(RequestStatus.LOADING);
const state = reactive({
  customer: null,
});

axios.get(`${API_URL}/customers/1`)
  .then(response => {
    status.value = RequestStatus.SUCCESS;
    state.customer = response.data;
  })
  .catch(error => {
    status.value = RequestStatus.ERROR;
  });
</script>

<template>
  <PageHeader/>
  <main>
    <section class="container">
      <h1>Client</h1>
      <RequestStatusIndicator :status="status"></RequestStatusIndicator>
      <div v-text="state.customer"></div>
    </section>
  </main>
</template>