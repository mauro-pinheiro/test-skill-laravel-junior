<template>
    <breeze-validation-errors class="mb-4" />

    <form @submit.prevent="submit">
        <div>
            <breeze-label for="display_name" value="Display Name" />
            <breeze-input id="display_name" type="text" class="mt-1 block w-full" v-model="form.display_name" required autofocus autocomplete="name" />
        </div>

        <div>
            <breeze-label for="full_name" value="Full Name" />
            <breeze-input id="full_name" type="text" class="mt-1 block w-full" v-model="form.full_name" required autofocus autocomplete="name" />
        </div>

        <div class="mt-4">
            <breeze-label for="email" value="Email" />
            <breeze-input id="email" type="email" class="mt-1 block w-full" v-model="form.email" required autocomplete="username" />
        </div>

        <div class="mt-4">
            <breeze-label for="password" value="Password" />
            <breeze-input id="password" type="password" class="mt-1 block w-full" v-model="form.password" required autocomplete="new-password" />
        </div>

        <div class="mt-4">
            <breeze-label for="password_confirmation" value="Confirm Password" />
            <breeze-input id="password_confirmation" type="password" class="mt-1 block w-full" v-model="form.password_confirmation" required autocomplete="new-password" />
        </div>

        <div>
            <breeze-label for="phone" value="Phone" />
            <breeze-input id="phone" type="text" class="mt-1 block w-full" v-model="form.phone" required />
        </div>

        <div>
            <breeze-label for="document" value="Document" />
            <breeze-input id="document" type="text" class="mt-1 block w-full" v-model="form.document" required />
        </div>

        <div>
            <breeze-label for="document_type" value="Tipo do Documento" />
            <breeze-input id="document_type" type="text" class="mt-1 block w-full" v-model="form.document_type" required />
        </div>

        <div class="flex items-center justify-end mt-4">
            <inertia-link :href="route('login')" class="underline text-sm text-gray-600 hover:text-gray-900">
                Already registered?
            </inertia-link>

            <breeze-button class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Register
            </breeze-button>
        </div>
    </form>
</template>

<script>
    import BreezeButton from '@/Components/Button'
    import BreezeGuestLayout from '@/Layouts/Guest'
    import BreezeInput from '@/Components/Input'
    import BreezeLabel from '@/Components/Label'
    import BreezeValidationErrors from '@/Components/ValidationErrors'

    export default {
        layout: BreezeGuestLayout,

        components: {
            BreezeButton,
            BreezeInput,
            BreezeLabel,
            BreezeValidationErrors,
        },

        props: {
            auth: Object,
            errors: Object,
        },

        data() {
            return {
                form: this.$inertia.form({
                    display_name: '',
                    full_name: '',
                    email: '',
                    phone: '',
                    password: '',
                    password_confirmation: '',
                    document: '',
                    document_type: '',
                    terms: false,
                })
            }
        },

        methods: {
            submit() {
                this.form.post(this.route('register'), {
                    onFinish: () => this.form.reset('password', 'password_confirmation'),
                })
            }
        }
    }
</script>
