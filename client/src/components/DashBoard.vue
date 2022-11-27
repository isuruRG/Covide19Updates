<template>
    <div class="col-lg-12 dashboard-body container">
        <h4 class="main-heading">
            <strong>{{ "Covid19 Status Live Updates" }}</strong>
        </h4>

        <div>
            <CovidUpdateDetails :localUpdates="localUpdates" />
        </div>
        <div v-if="user">
            <AddNewHelpAndGuide :user="user"/>
        </div>
    </div>
</template>

<script>
    import CovidUpdateDetails from "./subComponents/CovidliveUpdateSubComponents.vue";
    import AddNewHelpAndGuide from "./AddNewHelpAndGuid.vue";
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
            CovidUpdateDetails,
            AddNewHelpAndGuide,
        },

        mounted() {
            this.user = JSON.parse(localStorage.getItem('SET_USER'));
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
