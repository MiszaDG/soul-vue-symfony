<template>
  <v-form v-model="valid">
    <v-container>
      <v-text-field
          v-model="userForm.name"
          :rules="stringRules"
          :counter="10"
          label="First name"
          required
          variant="underlined"
      ></v-text-field>

      <v-text-field
          v-model="userForm.surname"
          :rules="stringRules"
          :counter="10"
          label="Last name"
          required
          variant="underlined"
      ></v-text-field>

      <v-text-field
          v-model="userForm.email"
          :rules="emailRules"
          label="E-mail"
          required
          variant="underlined"
      ></v-text-field>

      <v-textarea
          label="Message"
          :rules="stringRules"
          variant="underlined"
          v-model="userForm.message"
          required
      />

      <v-alert
          v-if="errorMessageVisible"
          color="red"
          variant="outlined"
      >
        Oops! Something went wrong. <br />Please check all fields or try again later.
      </v-alert>

      <v-btn
          :disabled="!valid"
          :loading="loading"
          block
          class="text-none mb-4 mt-4"
          color="indigo-darken-3"
          variant="flat"
          @click="submitForm"
      >
        Send message
      </v-btn>
    </v-container>
  </v-form>
</template>

<script setup lang="ts">
import {ref} from "vue";
import { type UserFormType } from "../../types/userForm";
import { ContactFormApiService } from "../../api/contactForm";
const emit = defineEmits(['submitted', 'errorOnSubmit'])

const loading = ref<boolean | string | undefined>(false);
const formSubmitted = ref<Boolean>(false);
const errorMessageVisible = ref<Boolean>(false);

const userForm = ref<UserFormType>({
  name: '',
  surname: '',
  email: '',
  message: ''
})

const submitForm = () => {
  loading.value = true;
  const contactFormApiService = new ContactFormApiService();
  contactFormApiService.submitForm(userForm.value)
      .then(() => {
        errorMessageVisible.value = false;
        formSubmitted.value = true;
        emit('submitted', userForm.value)
        loading.value = false;
      })
      .catch(() => {
        errorMessageVisible.value = true;
        loading.value = false;
      });
}

// Validation
const valid = ref<boolean | null | undefined>(false);

const stringRules: ((value: string | undefined) => boolean | string)[] = [
  value => {
    if (value) return true

    return 'This field is required.'
  }
]

const emailRules: ((value: string | undefined) => boolean | string)[] = [
  value => {
    if (value) return true

    return 'This field is required.'
  },
  value => {
    if (value && /.+@.+\..+/.test(value)) return true

    return 'E-mail must be valid.'
  },
]
</script>
