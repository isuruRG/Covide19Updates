<template>
    <div>
        <div class="row" v-if="localUpdates">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">{{("Last Update")}}</th>
                    <th scope="col">{{("New Cases")}}</th>
                    <th scope="col">{{("Total Cases")}}</th>
                    <th scope="col">{{("Total Hospitalized")}}</th>
                    <th scope="col">{{("Total Deaths")}}</th>
                    <th scope="col">{{("Total Recovered")}}</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>{{ localUpdates.update_date_time | moment("MMMM Do YYYY")}}</td>
                    <td>{{ localUpdates.local_new_cases }}</td>
                    <td>{{ localUpdates.local_total_cases }}</td>
                    <td>{{ localUpdates.local_total_number_of_individuals_in_hospitals }}</td>
                    <td>{{ localUpdates.local_deaths }}</td>
                    <td>{{ localUpdates.local_recovered }}</td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="row" v-if="!localUpdates">
            <strong>{{ "No Record Found....." }}</strong>
        </div>
    </div>
</template>

<script>

export default {
    data() {
        return {}
    },
    props: {
        localUpdates: {
            type: Object
        },
    },
};
</script>

<style>

</style>
