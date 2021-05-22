<template>
    <breeze-authenticated-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Create Product
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <breeze-validation-errors class="mb-4" />

                        <div
                            v-if="status"
                            class="mb-4 font-medium text-sm text-green-600"
                        >
                            {{ status }}
                        </div>

                        <form @submit.prevent="submit">
                            <div>
                                <breeze-label for="name" value="Name" />
                                <breeze-input
                                    id="name"
                                    type="text"
                                    class="mt-1 block w-full"
                                    v-model="form.name"
                                    required
                                    autofocus
                                    autocomplete="name"
                                />
                            </div>

                            <div class="mt-4">
                                <breeze-label
                                    for="description"
                                    value="Description"
                                />
                                <breeze-input
                                    id="description"
                                    type="text"
                                    class="mt-1 block w-full"
                                    v-model="form.description"
                                    required
                                />
                            </div>

                            <div class="mt-4">
                                <breeze-label for="price" value="Price" />
                                <breeze-input
                                    id="price"
                                    type="number"
                                    step=".01"
                                    class="mt-1 block w-full"
                                    v-model="form.price"
                                    required
                                />
                            </div>

                            <div class="mt-4">
                                <breeze-label for="sku" value="SKU" />
                                <breeze-input
                                    id="sku"
                                    type="text"
                                    class="mt-1 block w-full"
                                    v-model="form.sku"
                                    required
                                />
                            </div>

                            <div class="mt-4">
                                <breeze-label
                                    for="stock_amount"
                                    value="Stock Amount"
                                />
                                <breeze-input
                                    id="stock_amount"
                                    type="number"
                                    class="mt-1 block w-full"
                                    v-model="form.stock_amount"
                                    required
                                    autocomplete="current-password"
                                />
                            </div>

                            <div class="mt-4 hidden">
                                <breeze-label
                                    for="client_id"
                                    value="Client ID"
                                />
                                <breeze-input
                                    id="client_id"
                                    type="number"
                                    class="mt-1 block w-full"
                                    v-model="form.client_id"
                                    required
                                    readonly
                                />
                            </div>
                            <div class="mt-4">
                                <breeze-label for="client" value="Client" />
                                <breeze-input
                                    id="client"
                                    type="text"
                                    class="mt-1 block w-full"
                                    v-model="form.client"
                                    required
                                    readonly
                                />
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <breeze-button
                                    class="ml-4"
                                    :class="{ 'opacity-25': form.processing }"
                                    :disabled="form.processing"
                                >
                                    Save
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
import BreezeButton from "@/Components/Button";
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated";
import BreezeInput from "@/Components/Input";
import BreezeCheckbox from "@/Components/Checkbox";
import BreezeLabel from "@/Components/Label";
import BreezeValidationErrors from "@/Components/ValidationErrors";

export default {
    layout: BreezeAuthenticatedLayout,

    components: {
        BreezeButton,
        BreezeInput,
        BreezeCheckbox,
        BreezeLabel,
        BreezeValidationErrors,
    },

    props: {
        auth: Object,
        product: Object,
        errors: Object,
        status: String,
        edit: Boolean,
    },

    data() {
        return {
            form: this.$inertia.form({
                name: this.product?.name || "",
                description: this.product?.description || "",
                price: this.product?.price || 0,
                sku: this.product?.sku || "",
                stock_amount: this.product?.stock_amount || 0,
                client_id: this.product?.client_id || this.auth.user.client.id,
                client: this.product?.client || this.auth.user.name,
            }),
        };
    },

    methods: {
        submit() {
            if (this.edit) {
                this.form.put(this.route("products.update", this.product), {
                    onFinish: () => this.form.reset(),
                })
            } else {
                this.form.post(this.route("products.store"), {
                    onFinish: () => this.form.reset(),
                })
            }
        },
    },
};
</script>
