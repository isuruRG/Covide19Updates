<template>
    <div class="app">
        <NavBar></NavBar>
        <router-view></router-view>
    </div>
</template>

<script>
import NavBar from "./Login/Nav";
export default {
    name: "App",
    comments:{
        NavBar
    }
}
</script>
