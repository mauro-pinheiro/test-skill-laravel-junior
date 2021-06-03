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

                <div class="row my-2">
                    <div class="col-md-2">
                        <select class="form-control" v-model="length" @change="search">
                            <option value="15">15</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                    </div>
                    <div class="col-md-8"></div>
                    <div class="col-md-2">
                        <!-- Search Field -->
                        <breeze-input
                            ref="input"
                            type="text"
                            v-model="term"
                            @input="search"
                            placeholder="Search"
                            class="right"
                            v-focus
                        />
                        <!-- ./Search Field -->
                    </div>
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
                        <tr v-if="!products.data">
                            <td colspan="7">Nenhum produto para mostrar</td>
                        </tr>
                        <tr v-for="product in products.data" :key="product.id">
                            <td>{{ product.name }}</td>
                            <td>{{ product.description }}</td>
                            <td>{{ product.price }}</td>
                            <td>{{ product.sku }}</td>
                            <td>{{ product.stock_amount }}</td>
                            <td>{{ product.client.user.name }}</td>
                            <td>
                                <div class="d-inline-flex">
                                    <inertia-link
                                        as="button"
                                        type="button"
                                        class="btn btn-dark"
                                        :href="
                                            route('products.update', product)
                                        "
                                        >Edit</inertia-link
                                    >
                                    <inertia-link
                                        method="delete"
                                        :href="
                                            route('products.destroy', product)
                                        "
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
                    <breeze-pagination
                        :links="products.links"
                    ></breeze-pagination>
                </nav>
            </div>
        </div>
    </breeze-authenticated-layout>
</template>

<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated";
import BreezeNavLink from "@/Components/NavLink";
import BreezeButton from "@/Components/Button";
import BreezeInput from "@/Components/Input";
import BreezePagination from "@/Components/Pagination";

export default {
    components: {
        BreezeAuthenticatedLayout,
        BreezeNavLink,
        BreezeButton,
        BreezeInput,
        BreezePagination,
    },

    created() {
        console.log(this.products.data);
    },

    props: {
        auth: Object,
        token: String,
        errors: Object,
        products: Object,
        term: String,
        length: String,
    },

    // Para fazer o autofocus de um componente apos reload da pagina
    directives: {
        focus: {
            mounted: function (el) {
                el.focus();
            },
        },
    },

    methods: {
        search() {
            this.$inertia.get(
                this.route("products.index"),
                { search: this.term, length: this.length },
                { preserveState: false }
            );
        },
    },
};
</script>
