<template>
    <AddClient v-show="showAddClient" />
</template>

<script>
import AddClient from "../components/AddClient";
export default {
    props: {
        showAddClient: Boolean,
    },
    name: "Home",
    components: {
        AddClient,
    },
};
</script>
