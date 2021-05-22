<template>
    <breeze-authenticated-layout>
        <template #header>
            <h2 class="h4 font-weight-bold">Products</h2>
        </template>

        <div class="card my-4 shadow-sm">
            <div class="card-body">
                <div class="d-flex mb-4 justify-content-end">
                    <inertia-link
                        as="button"
                        type="button"
                        class="btn btn-dark text-uppercase"
                        :href="route('products.create')"
                        >Create
                    </inertia-link>
                </div>
                <table class="table table-striped table-bordered text-center">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>SKU</th>
                            <th>Stock Amount</th>
                            <th>Client</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr v-for="product in products.data" :key="product?.id">
                            <td>{{ product?.name }}</td>
                            <td>{{ product?.description }}</td>
                            <td>{{ product?.price }}</td>
                            <td>{{ product?.sku }}</td>
                            <td>{{ product?.stock_amount }}</td>
                            <td>{{ product?.client?.user?.name }}</td>
                            <td>
                                <div class="d-inline-flex">
                                    <inertia-link
                                        as="button"
                                        type="button"
                                        class="btn btn-dark"
                                        :href="route('products.update', product)"
                                        >Edit</inertia-link
                                    >
                                    <inertia-link
                                        method="delete"
                                        :href="route('products.destroy', product)"
                                        as="button"
                                        type="button"
                                        class="btn btn-danger ml-1"
                                        >Delete</inertia-link
                                    >
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <nav>
                    <ul class="pagination justify-content-end">
                        <li
                            v-for="link in products.links"
                            :key="link.label"
                            class="page-item"
                            v-bind:class="{ active: link.active }"
                        >
                            <inertia-link class="page-link" :href="link.url">
                                {{ link.label }}
                            </inertia-link>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </breeze-authenticated-layout>
</template>

<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated";
import BreezeNavLink from "@/Components/NavLink";
import BreezeButton from "@/Components/Button";

export default {
    components: {
        BreezeAuthenticatedLayout,
        BreezeNavLink,
        BreezeButton,
    },

    props: {
        auth: Object,
        token: String,
        errors: Object,
        products: Object,
    },
};
</script>
