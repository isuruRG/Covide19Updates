<template>
    <div class="app">
        <div>
            <nav class="navbar navbar-expand-lg navbar-light navbar">
                <div
                    class="collapse navbar-collapse justify-content-end navbarNav"
                    id="navbarNav"
                >
                    <ul class="navbar-nav">
                        <template>
                            <h5 class="nav-link"  style="color: #e2e8f0" v-if="user">
                                Hi {{ user.name }}
                            </h5>
                            <li
                                class="nav-item"
                                v-if="this.$route.name != 'dashBoard'"
                            >
                                <router-link
                                    class="nav-link"
                                    :to="{ path: '/' }"
                                    style="color: #e2e8f0"
                                >Dashboard
                                </router-link>
                            </li>

                            <li
                                class="nav-item"
                                v-if="this.$route.name != 'help-and-guides'"
                            >
                                <router-link
                                    class="nav-link"
                                    :to="{ path: '/help-and-guides' }"
                                    style="color: #e2e8f0"
                                >Help & Guide
                                </router-link>
                            </li>

                            <li class="nav-item" v-if="user">
                                <a
                                    href="#"
                                    class="nav-link"
                                    style="color: #e2e8f0"
                                    @click.prevent="signOut"
                                >Logout</a
                                >
                            </li>
                        </template>
                        <template v-if="!user">
                            <li class="nav-item active">
                                <router-link
                                    class="nav-link"
                                    to="/login"
                                    style="color: #e2e8f0"
                                >Login</router-link
                                >
                            </li>
                            <li class="nav-item active">
                                <router-link
                                    class="nav-link"
                                    to="/register"
                                    style="color: #e2e8f0"
                                >Register</router-link
                                >
                            </li>
                        </template>
                    </ul>
                </div>
            </nav>
        </div>
        <router-view></router-view>
    </div>
</template>

<script>
import axios from "axios";

export default {
    name: "App",
    comments: {
    },
    data() {
        return {
            user: null,
        };
    },
    mounted() {
        this.user = JSON.parse(localStorage.getItem("SET_USER"));
    },
    methods: {
        signOut() {
            axios.get("api/auth/logout").then(() => {
                localStorage.removeItem("SET_TOKEN");
                localStorage.removeItem("SET_USER");
                location.reload();
                this.$router.push({path: "/"});
            });
        },
    },
};
</script>
<style scoped>
body {
    font-family: "Lato", sans-serif;
}

.navbarNav {
    height: 50px;
    background: #041f55;
    padding: 5px 10px;

}
.text-info{

}
.sidenav {
    height: 100%;
    background-color: #000;
    overflow-x: hidden;
    padding-top: 20px;
    margin-top: 56px;
}

.nav-item {
    padding: 0px 10px;
    font-family: "Lato", sans-serif;

}

@media screen and (max-height: 450px) {
    .sidenav {
        padding-top: 15px;
    }
}

@media screen and (max-width: 450px) {
    .login-form {
        margin-top: 10%;
    }

    .register-form {
        margin-top: 10%;
    }
}

@media screen and (min-width: 768px) {
    .main {
        margin-left: 40%;
    }

    .sidenav {
        width: 40%;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
    }

    .login-form {
        margin-top: 80%;
    }

    .register-form {
        margin-top: 20%;
    }
}

.login-main-text {
    margin-top: 20%;
    padding: 60px;
    color: #fff;
}

.login-main-text h2 {
    font-weight: 300;
}

</style>
