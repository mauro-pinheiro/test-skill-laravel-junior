<template>
    <v-btn>
        <slot></slot>
    </v-btn>
</template>

<script>
import {VBtn} from 'vuetify'
export default {
    components:{
        VBtn,
    },
    props: {
        type: {
            type: String,
            default: "submit",
        },
    },
};
</script>
