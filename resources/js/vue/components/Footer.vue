<template>
    <footer>
        <router-link v-show="homePage" to="/clients">Clients</router-link>
        <p>Developed by &copy; Khairul Bashar</p>
    </footer>
</template>
<script>
export default {
    computed: {
        homePage() {
            return this.$route.path === "/" ? true : false;
        },
    },
};
</script>
<style scoped>
footer > p {
    margin-top: 30px;
    text-align: center;
}
</style>
