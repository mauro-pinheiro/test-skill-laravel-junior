<template>
    <breeze-authenticated-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <form @submit.prevent="submit">
                            <div>
                                <breeze-label for="token_name" value="Token Name" />
                                <breeze-input id="token_name" type="text" class="mt-1 block w-full" v-model="form.token_name" required autofocus />
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <breeze-button class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                    Create
                                </breeze-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </breeze-authenticated-layout>
</template>

<script>
    import BreezeButton from '@/Components/Button'
    import BreezeInput from '@/Components/Input'
    import BreezeAuthenticatedLayout from '@/Layouts/Authenticated'
    import BreezeLabel from '@/Components/Label'
    import BreezeValidationErrors from '@/Components/ValidationErrors'

    export default {
        // layout: BreezeAuthenticatedLayout,

        components: {
            BreezeButton,
            BreezeInput,
            BreezeLabel,
            BreezeValidationErrors,
            BreezeAuthenticatedLayout
        },

        props: {
            auth: Object,
            errors: Object,
            status: String,
        },

        data() {
            return {
                form: this.$inertia.form({
                    token_name: '',
                })
            }
        },

        methods: {
            submit() {
                axios.get(this.route('token.create', {
                    'token_name': this.form.token_name
                },
                ))
                    .then(response => alert(response.data.token))
                    .catch(error => console.log(error.toJSON()))
            }
        }
    }
</script>
