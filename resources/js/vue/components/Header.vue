<template>
    <header>
        <h1>{{ title }}</h1>
        <Button
            @btn-click="$emit('toggle-add-client')"
            :text="showAddClient ? 'Close' : 'Open form'"
            :color="showAddClient ? 'maroon' : 'green'"
        />
    </header>
</template>

<script>
import Button from "./Button";
export default {
    name: "Header",
    props: {
        title: String,
        showAddClient: Boolean,
    },
    components: {
        Button,
    },

};
</script>

<style scoped>
header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}
</style>
