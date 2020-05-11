<template>
  <div class="lg:max-w-v-1/2 max-w-v-9/10 xl:max-w-v-1/4 mx-auto">
    <div class="content">
      <form
        class="bg-white m-auto max-w-lg p-16 rounded-md w-full"
        @submit.prevent="onLogin"
      >
        <div class="w-full">
          <label
            for="grid-username"
            class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 text-left"
            >Användarnamn (E-post)</label
          >
          <BaseInputText
                  id="grid-username"
                  type="email"
                  placeholder="Användarnamn"
                  v-model="username"
                  :class="{ 'border-red-500': $v.username.$error }"
                  @blur="$v.username.$touch()" />
        </div>
        <div class="w-full">
          <label
            for="grid-password"
            class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 text-left"
            >Lösenord</label
          >
          <BaseInputText
                id="grid-password"
                type="password"
                placeholder="******************"
                v-model="password"
                :class="{ 'border-red-500': $v.password.$error }"
                @blur="$v.password.$touch()" />
        </div>

        <div class="flex justify-end items-center mt-5">
          <BaseButton @click.prevent="onLogin">Logga in</BaseButton>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import { required } from "vuelidate/lib/validators";
import { baseMessage } from "../helpers/FlashMessage"

export default {
  data() {
    return {
      username: "",
      password: "",
    };
  },
  methods: {
    onLogin() {
      this.$v.$touch();

      if (this.$v.$error) {
        window.VueGlobal.flashMessage.error(baseMessage({
          title: "Fyll i de obligatoriska fälten",
        }));

        return;
      }

      this.$store.dispatch("auth/login", {
        username: this.username,
        password: this.password,
      });
    },
  },
  validations: {
    username: {
      required,
    },
    password: {
      required,
    },
  },
};
</script>