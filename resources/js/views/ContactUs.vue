<template>
  <div class="lg:max-w-v-1/2 max-w-v-9/10 mx-auto">
    <div class="content">
      <div class="bg-white m-auto max-w-lg px-16 pb-16 pt-8 rounded-md w-full">
        <div class="pb-8">
          Om ni har några frågor eller förslag på förbättringar får ni gärna
          höra av er till oss.
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
          <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
            <label
              for="grid-company_name"
              class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
              >Förnamn</label
            >
            <input
              id="grid-company_name"
              type="text"
              placeholder="Företagsnamn"
              class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
            />
            <!-- class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" -->
            <!-- <p class="text-red-500 text-xs italic">
              Fältet är obligatoriskt
            </p>-->
          </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
          <div class="w-full px-3">
            <label
              for="grid-username"
              class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
              >E-post</label
            >
            <input
              id="grid-username"
              type="email"
              placeholder="E-post"
              class="appearance-none block w-full bg-gray-200 text-gray-700 mb-3 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
            />
          </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
          <div class="w-full px-3">
            <label
              class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
              for="grid-message"
              >Meddelande</label
            >
            <textarea
              class="no-resize appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 h-48 resize-none"
              id="grid-message"
            ></textarea>
          </div>
        </div>
        <div class="flex flex-wrap justify-end">
          <button class="btn btn-blue" @click="onSendForm">Skicka</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  methods: {
    onSendForm() {
      console.log("yo");
    },
  },
};
</script>
