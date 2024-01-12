<template>
  <main>
    <v-card
        title="Contact form"
        subtitle="Fill fields below to send message to the Soulab team!"
    >
      <ContactForm
          v-if="!formSubmitted"
          @submitted="onFormSubmitted"
      />
      <SummaryTable
          v-else
          :items="submittedData"
          @showForm="formSubmitted = false"
      />
    </v-card>
  </main>
</template>

<script setup lang="ts">
import ContactForm from '../components/ContactForm.vue';
import SummaryTable from '../components/SummaryTable.vue';
import { type UserFormType } from "../../types/userForm";

import {ref} from "vue";
const formSubmitted = ref<Boolean>(false);
const submittedData = ref<[UserFormType]>([{
  name: '',
  surname: '',
  email: '',
  message: ''
}]);

const onFormSubmitted = (data: UserFormType) => {
  submittedData.value = [data];
  formSubmitted.value = true;
}
</script>


