<template>
    <nav>
        <ul class="pagination justify-content-end">
            <li
                v-for="link in links"
                :key="link.label"
                class="page-item"
                v-bind:class="{ active: link.active }"
            >
                <inertia-link
                    class="page-link"
                    :href="link.url"
                    preserve-state
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
};
</script>
