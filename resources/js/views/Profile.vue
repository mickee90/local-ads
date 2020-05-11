<template>
    <div class="lg:max-w-v-3/4 max-w-v-9/10 mx-auto">
        <div class="content">
            <div class="bg-white m-auto max-w-screen-xl p-8 rounded-md w-full flex">
                <div class="w-1/3 text-left">
                    <div class="pb-10 mb-10 border-b border-gray-300">
                        <div class="mb-10">
                            <label for="avatarFileInput" class="w-100">
                                <div
                                        class="m-auto flex justify-center"
                                        style="max-width: 200px;"
                                >
                                    <img
                                            id="avatar"
                                            :src="`/storage/${profile.avatar}`"
                                            :alt="profile.company_name"
                                            class="avatar max-w-full"
                                            v-if="
                      profile.avatar !== null && profile.avatar !== undefined
                    "
                                    />
                                    <font-awesome-icon icon="handshake" class="text-6xl" v-else/>
                                </div>
                                <div
                                        class="text-blue-500 cursor-pointer text-center hover:underline"
                                >
                                    <input
                                            class="hidden"
                                            type="file"
                                            ref="file"
                                            accept="image/*"
                                            id="avatarFileInput"
                                            @change="onChosenFile"
                                    />
                                    Byt logotyp
                                </div>
                            </label>
                            <div class="chosen-avatar-box" v-if="chosenAvatar !== ''">
                                <span>Välj logotyp: {{ chosenAvatar.name }}</span>
                                <span>
                  <BaseButton
                          @click.prevent="onAvatarUpload"
                          :disabled="
                      chosenAvatar === '' || chosenAvatar === undefined
                    "
                  >
                    Ladda upp
                  </BaseButton>
                </span>
                            </div>
                        </div>

                        <div class="mb-6">
                            <BaseInputText
                                    id="grid-company_name"
                                    placeholder="Företagsnamn"
                                    v-model="profile.company_name"
                                    :class="{ 'border-red-500': $v.profile.company_name.$error }"
                                    @blur="$v.profile.company_name.$touch()"/>
                        </div>
                        <div class="mb-6">
                            <BaseInputText
                                    id="grid-corporate_number"
                                    placeholder="Organisationsnummer"
                                    v-model="profile.corporate_number"
                                    :class="{ 'border-red-500': $v.profile.corporate_number.$error }"
                                    @blur="$v.profile.corporate_number.$touch()"/>
                        </div>
                        <div class="mb-6">
                            <BaseInputText
                                    id="grid-email"
                                    type="email"
                                    placeholder="E-post"
                                    v-model="profile.email"
                                    :class="{ 'border-red-500': $v.profile.email.$error }"
                                    @blur="$v.profile.email.$touch()"/>
                        </div>
                        <div class="flex justify-between items-center mb-6">
                            <div class="relative">
                                <select
                                        v-model="profile.city_id"
                                        class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                        id="grid-city"
                                        :class="{ 'border-red-500': $v.profile.city_id.$error }"
                                        @change="$v.profile.city_id.$touch()"
                                >
                                    <option value>Välj ort</option>
                                    <option value="3">Falkenberg</option>
                                    <option value="2">Halmstad</option>
                                    <option value="1">Varberg</option>
                                </select>
                                <div
                                        class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700"
                                >
                                    <svg
                                            class="fill-current h-4 w-4"
                                            xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20"
                                    >
                                        <path
                                                d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"
                                        />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-end">
                            <BaseButton @click.prevent="onUpdateProfile">
                                Uppdatera profil
                            </BaseButton>
                        </div>
                    </div>

                    <div class="pb-10 mb-10">
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full px-3">
                                <label
                                        for="grid-password"
                                        class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                >
                                    Lösenord
                                    <span class="required">*</span>
                                </label>
                                <BaseInputText
                                        id="grid-password"
                                        type="password"
                                        placeholder="******************"
                                        v-model="passwordForm.password"
                                        :class="{ 'border-red-500': $v.passwordForm.password.$error }"
                                        @blur="$v.passwordForm.password.$touch()"/>
                                <p class="text-gray-600 text-xs italic">
                                    Kräver minst
                                    {{ $v.passwordForm.password.$params.minLen.min }} tecken
                                </p>
                            </div>
                        </div>
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full px-3">
                                <label
                                        for="grid-confirm-password"
                                        class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                >
                                    Bekräfta lösenord
                                    <span class="required">*</span>
                                </label>
                                <BaseInputText
                                        id="grid-confirm-password"
                                        type="password"
                                        placeholder="******************"
                                        v-model="passwordForm.password_confirmation"
                                        :class="{
                    'border-red-500': $v.passwordForm.password_confirmation.$error,
                  }"
                                        @blur="$v.passwordForm.password_confirmation.$touch()"/>
                            </div>
                        </div>
                        <div class="flex justify-end">
                            <BaseButton @click.prevent="onUpdatePassword">
                                Uppdatera lösenord
                            </BaseButton>
                        </div>
                    </div>
                </div>
                <div class="w-2/3 pl-8">
                    <div v-if="!post.published">

                        <CardPlaceholder>
                            <router-link :to="{ name: 'CreatePost' }" class="btn btn-blue">
                                Skapa inlägg
                            </router-link>
                        </CardPlaceholder>
                    </div>
                    <div class="grid gap-4" v-else>
                        <Card :url="{ name: 'EditPost', params: { postId: post.id } }">
                            <template slot="logo">
                                <img
                                        :src="`/storage/${profile.avatar}`"
                                        :alt="profile.company_name"
                                        class="avatar max-w-full"
                                        v-if="profile.avatar !== null && profile.avatar !== undefined"
                                />
                                <font-awesome-icon icon="handshake" class="text-6xl" v-else/>
                            </template>
                            <template slot="header">
                                <div class="flex justify-between">
                                    <div v-text="post.title"></div>
                                    <button
                                            class="appearance-none text-base text-blue-500 hover:underline"
                                    >
                                        Redigera
                                    </button>
                                </div>
                            </template>
                            <template slot="ingress">
                                <div v-html="post.ingress"></div>
                            </template>
                        </Card>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {required, email, minLength, sameAs} from "vuelidate/lib/validators";
    import Card from "../components/Card";
    import CardPlaceholder from "../components/CardPlaceholder";
    import axios from "../axios/axios";
    import {baseMessage} from "../helpers/FlashMessage";

    export default {
        data() {
            return {
                profile: {
                    company_name: "",
                    corporate_number: "",
                    email: "",
                    city_id: "",
                    avatar: null,
                },
                chosenAvatar: "",
                passwordForm: {
                    password: null,
                    password_confirmation: null,
                },
                post: {},
            };
        },
        methods: {
            async onUpdateProfile() {
                this.$v.profile.$touch();

                if (this.$v.profile.$error) {
                    window.VueGlobal.flashMessage.error(baseMessage({
                        title: "Fyll i de obligatoriska fälten",
                    }));

                    return;
                }

                const response = await this.$store.dispatch("profile/editProfile", {
                    email: this.profile.email,
                    company_name: this.profile.company_name,
                    corporate_number: this.profile.corporate_number,
                    city_id: this.profile.city_id,
                });

                if (!response) {
                    window.VueGlobal.flashMessage.error(baseMessage({
                        title: "Något gick fel vid sparandet",
                    }));

                    return;
                }

                window.VueGlobal.flashMessage.success(baseMessage({
                    title: "Sparat",
                }));
            },
            async onUpdatePassword() {
                this.$v.passwordForm.$touch();

                if (this.$v.passwordForm.password.$error) {
                    window.VueGlobal.flashMessage.error(baseMessage({
                        title: "Lösenordet måste bestå av minst 8 tecken",
                    }));

                    return;
                }

                if (this.$v.passwordForm.password_confirmation.$error) {
                    window.VueGlobal.flashMessage.error(baseMessage({
                        title: "Lösenorden stämmer inte överens",
                    }));

                    return;
                }

                const response = await this.$store.dispatch(
                    "auth/changePassword", {
                        password: this.passwordForm.password,
                        password_confirmation: this.passwordForm.password_confirmation
                    }
                );

                if (!response) {
                    window.VueGlobal.flashMessage.error(baseMessage({
                        title: "Något gick fel vid sparandet",
                    }));

                    return;
                }

                this.$v.passwordForm.$reset();
                this.passwordForm.password = "";
                this.passwordForm.password_confirmation = "";

                window.VueGlobal.flashMessage.success(baseMessage({
                    title: "Sparat",
                }));
            },
            onChosenFile() {
                if (this.$refs.file.files[0] === undefined) {
                    return false;
                }
                this.chosenAvatar = this.$refs.file.files[0];
            },

            onAvatarUpload() {
                if (this.chosenAvatar === "") {
                    window.VueGlobal.flashMessage.error(baseMessage({
                        title: "Välj en bild",
                    }));

                    return;
                }

                this.uploadAvatar(this.chosenAvatar);
            },

            async uploadAvatar(avatar = null) {
                if (avatar === null) {
                    window.VueGlobal.flashMessage.error(baseMessage({
                        title: "Något gick fel. Prova igen",
                    }));

                    return;
                }

                let formData = new FormData();
                formData.append("avatar", avatar);

                const response = await axios
                    .post(`/api/v1/user/${this.profile.id}/updateAvatar`, formData, {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    })
                    .then((res) => res.data)
                    .catch((err) => console.log(err));

                this.$store.dispatch("profile/editAvatar", response);
                this.chosenAvatar = "";
                this.profile.avatar = response.avatar;
            },
        },
        validations: {
            profile: {
                company_name: {
                    required,
                },
                corporate_number: {
                    required,
                },
                city_id: {
                    required,
                },
                email: {
                    required,
                    email,
                },
            },
            passwordForm: {
                password: {
                    required,
                    minLen: minLength(8),
                },
                password_confirmation: {
                    sameAs: sameAs("password"),
                },
            },
        },
        async created() {
            this.profile = this.$store.getters["profile/getProfile"];
            this.post = this.$store.getters["post/getPost"];
            console.log(this.profile);
            console.log(this.post);
        },
        components: {
            Card,
            CardPlaceholder,
        },
    };
</script>

<style scoped>
    .form-check {
        position: relative;
        display: block;
        padding-left: 1.25rem;
    }

    input.invalid {
        border: 1px solid red;
        background-color: #ffc9aa;
    }

    span.required {
        color: red;
    }

    .chosen-avatar-box {
        display: grid;
        text-align: center;
    }

    .avatar-container {
        position: absolute;
        margin: 0 auto;
        right: 0;
        left: 0;
        top: -55px;
    }

    .form-control.light-weight {
        background: transparent;
        border: none;
        border-bottom: 1px solid #ccc;
        outline: none;
    }

    .avatar-box {
        height: 75px;
        width: 75px;
        margin: 0 auto;
        border-radius: 50%;
        background: blue;
        z-index: 9999;
        overflow: hidden;
    }

    .avatar-placeholder {
        font-size: 3rem;
        line-height: 75px;
        text-align: center;
        color: #fff;
    }

    .profile-information {
        padding-top: 60px;
    }
</style>
