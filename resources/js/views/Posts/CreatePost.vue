<template>
    <div class="bg-white content pb-8 pr-8 xxl:max-w-v-1/2 lg:max-w-v-9/10 mx-auto">
        <div
                class="border-top bg-white border-gray-400 flex lg:max-w-full max-w-sm rounded-lg overflow-hidden w-full"
        >
            <div class="p-4 text-left w-full">
                <div class="flex justify-between items-center">
                    <h1 class="m-0 pb-8 pt-6">Redigering av inlägg</h1>
                    <div>
                        <button
                                class="btn bg-green-400 text-white h-full"
                                @click="onSave"
                                v-text="'Publicera'"
                        ></button>
                        <button class="btn btn-gray h-full ml-4" @click="onCancel">Avbryt</button>
                    </div>
                </div>
                <div class="mb-6">
                    <label for="titleInput">
                        Typ av inlägg
                        <span class="text-red-500">*</span>
                    </label>
                    <div class="relative w-1/4">
                        <select
                                v-model="post.type"
                                class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="grid-state"
                                :class="{ 'border-red-500': $v.post.type.$error }"
                                @change="$v.post.type.$touch()"
                        >
                            <option value="1">Behöver hjälp med</option>
                            <option value="2">Kan hjälpa till med</option>
                        </select>
                        <p v-if="$v.post.type.$error" class="text-red-500 text-xs italic"></p>
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
                <div class="mb-6 form-group">
                    <label for="titleInput">
                        Rubrik
                        <span class="text-red-500">*</span>
                    </label>
                    <input
                            id="titleInput"
                            type="text"
                            placeholder="Rubrik"
                            v-model="post.title"
                            :class="{ 'border-red-500': $v.post.title.$error }"
                            @blur="$v.post.title.$touch()"
                            class="w-full appearance-none block bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    />
                    <small>Exempelvis namnet på ert företaget eller föreningen</small>
                </div>
                <div class="mb-6 form-group">
                    <label for="ingressInput">
                        Ingress
                        <span class="text-red-500">*</span>
                    </label>
                    <ckeditor
                            id="ingressInput"
                            :editor="editor"
                            placeholder="Ingress"
                            v-model="post.ingress"
                            :class="{ 'border-red-500': $v.post.ingress.$error }"
                            @blur="$v.post.ingress.$touch()"
                            :config="editorConfig"
                            class="w-full appearance-none block bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 h-24"
                    ></ckeditor>
                    <small>
                        Kort beskrivning som kommer synas vid förhandsvisningen. Max 200
                        tecken.
                    </small>
                    <p class="text-red-500" v-if="$v.post.ingress.$error">Max 200 tecken</p>
                </div>
                <div class="mb-6 form-group">
                    <label for="contentInput">
                        Innehåll
                        <span class="text-red-500">*</span>
                    </label>
                    <ckeditor
                            id="contentInput"
                            :editor="editor"
                            placeholder="Innehåll"
                            v-model="post.content"
                            @blur="$v.post.content.$touch()"
                            :config="editorConfig"
                            class="w-full appearance-none block bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 h-24"
                    ></ckeditor>
                    <small>
                        Fritext för vad ni behöver hjälp med, kan bidra med, och/eller
                        annan relevant information.
                    </small>
                    <p class="text-red-500" v-if="$v.post.content.$error">Innehållet får inte vara tomt.</p>
                </div>
                <div class="mb-6 form-group">
                    <label for="phoneInput">Telefonnummer</label>
                    <input
                            id="phoneInput"
                            type="text"
                            placeholder="Telefonnummer"
                            v-model="post.phone"
                            class="w-full appearance-none block bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    />
                </div>
                <div class="mb-6 form-group">
                    <label for="EmailInput">
                        E-post
                        <span class="text-red-500">*</span>
                    </label>
                    <input
                            id="EmailInput"
                            type="email"
                            placeholder="E-post"
                            v-model="post.email"
                            :class="{ 'border-red-500': $v.post.email.$error }"
                            @blur="$v.post.email.$touch()"
                            class="w-full appearance-none block bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    />
                </div>
                <div class="mb-6 form-group">
                    <label for="websiteInput">Hemsida</label>
                    <input
                            id="websiteInput"
                            type="text"
                            placeholder="Hemsida"
                            v-model="post.website"
                            class="w-full appearance-none block bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    />
                </div>
                <div class="flex justify-between items-center">
                    <span class="text-red-500">* = obligatoriska fält</span>
                    <div>
                        <button
                                class="btn bg-green-400 text-white h-full"
                                @click="onSave"
                                v-text="'Publicera'"
                        ></button>
                        <button class="btn btn-gray h-full ml-4" @click="onCancel">Avbryt</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {required, maxLength, email} from "vuelidate/lib/validators";
    import ClassicEditor from "@ckeditor/ckeditor5-build-classic";

    export default {
        data() {
            return {
                profile: {},
                post: {
                    title: "",
                    ingress: "",
                    content: "",
                    type: 1,
                    email: "",
                    phone: "",
                    website: ""
                },
                editor: ClassicEditor,
                editorConfig: {
                    toolbar: {
                        items: ["bold", "italic"]
                    }
                }
            };
        },
        methods: {
            async onSave() {
                this.$v.post.$touch();

                if (this.$v.post.$error) {
                    window.VueGlobal.flashMessage.error(baseMessage({
                        title: "Fyll i alla obligatoriska fält",
                    }));

                    return;
                }

                const response = await this.$store.dispatch("post/storePost", {
                    title: this.post.title,
                    ingress: this.post.ingress,
                    content: this.post.content,
                    type_id: this.post.type,
                    email: this.post.email,
                    phone: this.post.phone,
                    website: this.post.website,
                    published: true,
                });

                if (!response) {
                    window.VueGlobal.flashMessage.error(baseMessage({
                        title: "Något gick fel. Prova igen",
                    }));

                    return;
                }

                this.$router.push({name: 'Profile'});
            },
            onCancel() {
                this.$router.push({name: 'Profile'});
            }
        },
        validations: {
            post: {
                title: {
                    required
                },
                ingress: {
                    required,
                    maxLen: maxLength(200)
                },
                content: {
                    required
                },
                type: {
                    required
                },
                email: {
                    required,
                    email
                }
            }
        },
        created() {
            this.profile = this.$store.getters["profile/getProfile"];
            this.post = this.$store.getters["post/getPost"];
        }
    };
</script>
