<template>
    <AllClients :clients="clients" />
</template>

<script>
import AllClients from "../components/AllClients";
export default {
    name: "Clients",
    components: {
        AllClients,
    },
    data() {
        return {
            clients: [],
        };
    },
    computed: {
        getClients() {
            axios
                .get("api/clients")
                .then((response) => {
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
