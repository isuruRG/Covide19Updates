<template>
    <div>
        <div class="row">
            <div class="container post rounded p-4">
                <div class="header-section">
                    <div class="topic">
                        <strong>{{ helpAndGuide.user.name }}</strong><br>
                        Publish Date : <small class="ml-2" style="text-align: end; color: #718096 "> {{ helpAndGuide.created_at | moment("MMMM Do YYYY")}}</small>
                    </div>
                </div>

                <div class="post-body">
                    <p class="content-section">{{ helpAndGuide.description }}</p>
                    <a v-bind:href="helpAndGuide.link" style="width: fit-content"> {{helpAndGuide.link}} </a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

    export default {
        data() {
            return {
            }
        },
        props: {
            helpAndGuide: {
                type: Object
            },
            isProfile: {
                type: Boolean
            }
        },

        computed: {

        },

        methods: {}
    };
</script>

<style>

</style>
