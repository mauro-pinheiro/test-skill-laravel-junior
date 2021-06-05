<template>
    <nav v-if="links.length > 3" class="mt-3">
        <ul class="pagination d-inline justify-content-end">
            <li
                v-for="(link, index) in links"
                :key="index"
                class="page-item"
                v-bind:class="{ active: link.active }"
            >
                <inertia-link
                    :class="{'page-link': true, disabled: disabled === index}"
                    :href="link.url"
                    preserve-scroll
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
        disabled(){
            let index = this.links.findIndex((link) => link.active)
            return index === 1 ? 0 : index === this.links.length - 2 ? this.links.length - 1 : -1;
        }
    }
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
