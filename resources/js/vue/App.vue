<template>
    <div :class="homePage ? 'container' : ''">
        <Header
            v-show="homePage"
            @toggle-add-client="toggleAddClient"
            title="Add client"
            :showAddClient="showAddClient"
        />
        <router-view
            :showAddClient="showAddClient"
            :clients="clients"
        ></router-view>
        <Footer />
    </div>
</template>

<script>
import Header from "./components/Header";
import Footer from "./components/Footer";
export default {
    name: "App",
    components: {
        Header,
        Footer,
    },
    data() {
        return {
            showAddClient: false,
            clients: [],
        };
    },
    methods: {
        toggleAddClient() {
            this.showAddClient = !this.showAddClient;
        },
    },
    computed: {
        homePage() {
            return this.$route.path === "/" ? true : false;
        },
        getClients() {
            axios
                .get("api/clients")
                .then((response) => {
                    console.log(response.data);
                    this.clients = response.data;
                })
                .catch((error) => {
                    console.log(error);
                });
        },
    },
    created() {
        this.getClients;
    },
};
</script>

<style>
@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400&display=swap");
* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}
body {
    font-family: "Poppins", sans-serif;
}
.container {
    max-width: 500px;
    margin: 30px auto;
    overflow: auto;
    min-height: 300px;
    padding: 30px;
    border-radius: 5px;
}
.btn {
    display: inline-block;
    background: #000;
    color: #fff;
    border: none;
    padding: 10px 20px;
    margin: 5px;
    border-radius: 5px;
    cursor: pointer;
    text-decoration: none;
    font-size: 15px;
    font-family: inherit;
}
.btn:focus {
    outline: none;
}
.btn:active {
    transform: scale(0.98);
}
.btn-block {
    display: block;
    width: 100%;
}
</style>
