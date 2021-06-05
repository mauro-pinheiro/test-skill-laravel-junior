<template>
    <nav v-if="show" class="mt-3">
        <ul class="pagination d-inline justify-content-end">
            <li
                v-for="(link, index) in data.links"
                :key="index"
                class="page-item"
                v-bind:class="{ active: link.active }"
            >
                <inertia-link
                    :class="{ 'page-link': true, disabled: !link.url }"
                    :href="pageLink(index)"
                >
                    <span v-html="link.label"></span>
                </inertia-link>
            </li>
        </ul>
    </nav>
</template>

<script>
export default {
    props: ["data"],

    methods: {
        pageLink(index) {
            let page =
                index === 0                                     //Button Previous
                    ? 1
                    : index === this.data.links.length - 1      //Button Next
                    ? this.data.current_page + 1
                    : this.data.links[index].label;             //Any other page button
            let current = this.route().current();
            let params = this.route().params;
            params.page = page;
            return this.route(current, params);
        },
    },

    computed: {
        show() {
            return this.data.links.length > 3;
        },
    },
};
</script>

<style>
.pagination a {
    color: black;
    float: left;
    padding: 8px 16px;
    text-decoration: none;
    transition: background-color 0.3s;
    border: 1px solid #ddd;
    margin: 0 4px;
    border-radius: 5px;
}
.pagination a.active:not(.disabled) {
    background-color: dodgerblue;
    color: white;
}
.pagination a:hover:not(.active):not(.disabled) {
    background-color: lightskyblue;
}
.pagination a.active:not(.disabled) {
    border-radius: 5px;
}
.pagination a.disabled {
    pointer-events: none !important;
    cursor: default;
    color: Gray;
}
</style>
