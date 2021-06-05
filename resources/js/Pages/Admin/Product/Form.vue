<template>
    <breeze-authenticated-layout>
        <template #header>
            <h2 class="h4 font-weight-bold">Create Product</h2>
        </template>

        <div class="card my-4 shadow-sm">
            <div class="card-body">
                <breeze-validation-errors class="mb-4" />

                <div
                    v-if="status"
                    class="mb-4 font-medium text-sm text-green-600"
                >
                    {{ status }}
                </div>

                <form @submit.prevent="submit">
                    <div class="form-group">
                        <breeze-label for="name" value="Name" />
                        <breeze-input
                            id="name"
                            type="text"
                            v-model="form.name"
                            required
                            autofocus
                            autocomplete="name"
                        />
                    </div>

                    <div class="form-group">
                        <breeze-label for="description" value="Description" />
                        <breeze-input
                            id="description"
                            type="text"
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
                            v-model="form.price"
                            required
                        />
                    </div>

                    <div class="form-group">
                        <breeze-label for="sku" value="SKU" />
                        <breeze-input
                            id="sku"
                            type="text"
                            v-model="form.sku"
                            required
                        />
                    </div>

                    <div class="form-group">
                        <breeze-label for="stock_amount" value="Stock Amount" />
                        <breeze-input
                            id="stock_amount"
                            type="number"
                            v-model="form.stock_amount"
                            required
                            autocomplete="current-password"
                        />
                    </div>

                    <div class="form-group d-none">
                        <breeze-label for="client_id" value="Client ID" />
                        <breeze-input
                            id="client_id"
                            type="number"
                            v-model="form.client_id"
                            required
                            readonly
                        />
                    </div>
                    <div class="form-group">
                        <breeze-label for="client" value="Client" />
                        <breeze-input
                            id="client"
                            type="text"
                            v-model="form.client"
                            required
                            readonly
                        />
                    </div>
                    <div class="mb-0">
                        <div
                            class="
                                d-flex
                                justify-content-end
                                align-items-baseline
                            "
                        >
                            <breeze-button
                                class="ml-4"
                                :class="{ 'opacity-25': form.processing }"
                                :disabled="form.processing"
                            >
                                Save
                            </breeze-button>
                        </div>
                    </div>
                </form>
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
import vSelect from 'vue-select'

export default {
    layout: BreezeAuthenticatedLayout,

    components: {
        BreezeButton,
        BreezeInput,
        BreezeCheckbox,
        BreezeLabel,
        BreezeValidationErrors,
        vSelect,
    },

    props: {
        auth: Object,
        product: Object,
        errors: Object,
        status: String,
        edit: Boolean,
    },

    computed: {
        options() {
            return [{country: 'Canada', code: 'CA'},];
        }
    },

    data() {
        return {
            form: this.$inertia.form({
                name: this.product?.name ?? "",
                description: this.product?.description ?? "",
                price: this.product?.price ?? 0,
                sku: this.product?.sku ?? "",
                stock_amount: this.product?.stock_amount ?? 0,
                client_id: this.product?.client_id ?? this.auth.user.client.id,
                client: this.product?.client ?? this.auth.user.name,
            }),
        };
    },

    methods: {
        submit() {
            if (this.edit) {
                this.form.put(this.route("products.update", this.product), {
                    onFinish: () => this.form.reset(),
                });
            } else {
                this.form.post(this.route("products.store"), {
                    onFinish: () => this.form.reset(),
                });
            }
        },
    },
};
</script>
