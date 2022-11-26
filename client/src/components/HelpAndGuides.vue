<template>
    <div class="row help-and-guides">
        <div class="col-lg-12 container" v-if="helpAndGuides.length>0">
            <div v-for="helpAndGuide in helpAndGuides" :key="helpAndGuide.id">
                <helpAndGuide :helpAndGuide="helpAndGuide" :isProfile="false" />
            </div>
        </div>
        <div class="col-lg-12 container" v-else>
            <p class="text-center">No help and guides were added...</p>
        </div>
    </div>
</template>

<script>
    import helpAndGuide from "./partials/_helpAndGuid";
    import axios from 'axios'


    export default {
        name: "HelpAndGuides",

        data() {
            return {
                user: {},
                helpAndGuides: [],
            };
        },
        components: {
            helpAndGuide,
        },
        mounted() {
            let token = localStorage.getItem('SET_TOKEN')
            this.getAllHelpAndGuides(token);
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
        },
    };
</script>

<style></style>
