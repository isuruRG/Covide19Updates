<template>
    <div class="col-lg-12 dashboard-body">
        <h4 class="main-heading">
            <strong>{{ "Local Covid19 Live Updates" }}</strong>
        </h4>

        <div>
            <liveUpdate :localUpdates="localUpdates" />
        </div>
        <div v-if="user">
            <addNewHelpAndGuide :user="user"/>
        </div>
    </div>
</template>

<script>
    import liveUpdate from "./partials/_liveUpdate.vue";
    import addNewHelpAndGuide from "./AddNewHelpAndGuid.vue";
    import axios from 'axios'

    export default {
        data() {
            return {
                helpAndGuides: [],
                localUpdates: {},
                user:null
            };
        },

        computed: {

        },

        components: {
            liveUpdate,
            addNewHelpAndGuide,
        },

        mounted() {
            this.user = localStorage.getItem('SET_USER')
            this.getAllHelpAndGuides();
            this.getLiveUpdateOfLocalCovid();
        },

        methods: {
            getAllHelpAndGuides() {
                axios.get("/api/help-and-guide/get-all-help-and-guides").then(response => {
                    if (response.data) {
                        this.helpAndGuides = response.data;
                    }
                });
            },

            getLiveUpdateOfLocalCovid() {
                axios.get("/api/covid/get-covid-updates").then(response => {
                    if (response.data) {
                        this.localUpdates = response.data;
                    }
                });
            },
        },
    };
</script>

<style></style>
