<template>
    <div class="container">
        <h1>All Clients</h1>
        <div>
            <table
                id="dtBasicExample"
                class="table table-striped table-bordered table-sm"
                cellspacing="5"
                width="100%"
            >
                <thead>
                    <tr>
                        <th class="th-sm">Name</th>
                        <th class="th-sm">Gender</th>
                        <th class="th-sm">Phone</th>
                        <th class="th-sm">Email</th>
                        <th class="th-sm">Address</th>
                        <th class="th-sm">Nationality</th>
                        <th class="th-sm">Date of Birth</th>
                        <th class="th-sm">Education</th>
                        <th class="th-sm">Preferred Contact Mode</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="client in clients" :key="client.id">
                        <td>{{ client.name }}</td>
                        <td>{{ client.gender }}</td>
                        <td>{{ client.phone }}</td>
                        <td>{{ client.email }}</td>
                        <td>{{ client.address }}</td>
                        <td>{{ client.nationality }}</td>
                        <td>{{ client.dob }}</td>
                        <td>{{ client.education }}</td>
                        <td>{{ client.contact_mode }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <router-link to="/" :class="'btn'">Back</router-link>
    </div>
</template>

<script>
export default {
    props:{
        clients: Array
    },
};
</script>

<style scoped>
.container {
    max-width: 95%;
    margin: 30px auto;
    overflow: auto;
    min-height: 300px;
    padding: 30px;
    border-radius: 5px;
}
table {
    text-align: center;
}
.client {
    background: #e6e6e6;
    padding: 5px;
    margin-top: 5px;
}
.btn {
    background: purple;
}
</style>
