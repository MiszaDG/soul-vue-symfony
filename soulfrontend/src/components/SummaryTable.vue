<template>
  <div>
    <v-alert
        color="green"
        variant="outlined"
        class="ma-4"
    >
      Great!<br />Your message has been sent!<br />You can check sent details below.
    </v-alert>
    <v-table
      class="ma-2"
    >
      <thead>
      <tr>
        <th class="text-left">
          Name
        </th>
        <th class="text-left">
          Surname
        </th>
        <th class="text-left">
          Email
        </th>
        <th class="text-left">
          Message
        </th>
      </tr>
      </thead>
      <tbody>
      <tr
          v-for="item in items"
          :key="item.name"
      >
        <td>{{ item.name }}</td>
        <td>{{ item.surname }}</td>
        <td>{{ item.email }}</td>
        <td>{{ item.message }}</td>
      </tr>
      </tbody>
    </v-table>

    <v-btn
        block
        class="text-none ma-4"
        color="indigo-darken-3"
        variant="flat"
        @click="emit('showForm')"
    >
      Back to form
    </v-btn>
  </div>
</template>

<script setup lang="ts">
const emit = defineEmits(['showForm'])
defineProps({
  items: {
    type: Object,
    required: true
  }
})
</script>
