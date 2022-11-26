<template>
    <div class="col-lg-12 dashboard-body">
        <h4 class="main-heading">
            <strong>{{ "Local Covid19 Live Updates" }}</strong>
        </h4>

        <div>
            <liveUpdate :localUpdates="localUpdates" />
        </div>
        <div v-if="authenticated">
<!--            <addNewHelpAndGuide />-->
        </div>
    </div>
</template>

<script>
    import liveUpdate from "./partials/_liveUpdate.vue";
    // import addNewHelpAndGuide from "./AddNewHelpAndGuid.vue";
    import axios from 'axios'

    export default {
        data() {
            return {
                helpAndGuides: [],
                localUpdates: {},
                authenticated:'a'
            };
        },

        computed: {

        },

        components: {
            liveUpdate,
            // addNewHelpAndGuide,
        },

        mounted() {
            let token = localStorage.getItem('SET_TOKEN')
            console.log(token);
            this.getAllHelpAndGuides(token);
            this.getLiveUpdateOfLocalCovid(token);
        },

        methods: {
            getAllHelpAndGuides(token) {
                axios.get("/api/help-and-guide/get-all-help-and-guides",{
                    headers: {
                        'Authorization': 'Bearer ' + token
                    }
                }).then(response => {
                    if (response.data) {
                        this.helpAndGuides = response.data;
                    }
                });
            },

            getLiveUpdateOfLocalCovid(token) {
                axios.get("/api/covid/get-covid-updates",{
                    headers: {
                        'Authorization': 'Bearer ' + token
                    }
                }).then(response => {
                    if (response.data) {
                        this.localUpdates = response.data;
                    }
                });
            },
        },
    };
</script>

<style></style>
