<template>
    <nav v-if="show" class="mt-3">
        <ul class="pagination d-inline justify-content-end">
            <li
                v-for="(link, index) in links"
                :key="index"
                class="page-item"
                v-bind:class="{ active: link.active }"
            >
                <inertia-link
                    :class="{ 'page-link': true, disabled: !link.url }"
                    :href="link.url ?? '#'"
                >
                    <span v-html="link.label"></span>
                </inertia-link>
            </li>
        </ul>
    </nav>
</template>

<script>
export default {
    props: ["links"],

    computed: {
        show() {
            return this.links.length > 3;
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
