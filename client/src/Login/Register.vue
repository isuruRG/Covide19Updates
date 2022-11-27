<template>
    <div class="back">
        <div class="div-center">
            <div class="content">
                <h3>Login</h3>
                <hr/>
                <form>
                    <div class="form-group">
                        <input
                            type="text"
                            class="form-control"
                            id="username"
                            placeholder="User Name"
                            v-model="username"
                        />

                        <div class="text-danger" v-if="res_errors.name">
                            <h6>{{ res_errors.name[0] }}</h6>
                        </div>
                    </div>

                    <div class="form-group">
                        <input
                            type="email"
                            class="form-control mt-2"
                            id="email"
                            placeholder="Email"
                            v-model="email"
                        />

                        <div class="text-danger" v-if="res_errors.email">
                            <h6>{{ res_errors.email[0] }}</h6>
                        </div>
                    </div>

                    <div class="form-group">
                        <input
                            type="password"
                            class="form-control mt-2"
                            id="password"
                            placeholder="Password"
                            v-model="password"
                        />

                        <div class="text-danger" v-if="res_errors.password">
                            <h6>{{ res_errors.password[0] }}</h6>
                        </div>
                    </div>

                    <div class="form-group">
                        <input
                            type="password"
                            class="form-control mt-2"
                            id="password2"
                            placeholder="Confirm Password"
                            v-model="confirm_password"
                        />

                        <div
                            class="text-danger"
                            v-if="res_errors.confirm_password"
                        >
                            <h6>{{ res_errors.confirm_password[0] }}</h6>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary mt-2" @click.prevent="submit()">Register</button>
                    <hr/>
                    <button type="button" class="btn btn-link" @click.prevent="signIn()">SignIn</button>
                    <button type="button" class="btn btn-link" @click.prevent="reset()">Reset</button>
                    <button type="button" class="btn btn-link" @click.prevent="backToDashboard()">Back To Dashboard</button>

                </form>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios'

export default {
    name: "HelpAndGuides",
    data() {
        return {
            username: "",
            email: "",
            password: "",
            confirm_password: "",
            res_errors: {}
        };
    },
    mounted() {
    },

    methods: {
        submit() {
            axios.post("api/auth/register", {
                name: this.username,
                email: this.email,
                password: this.password,
                confirm_password: this.confirm_password
            }).then(response => {
                if (response.data) {
                    if (response.data.user) {
                        alert()
                        this.$router.push({path: "/login"});
                    } else {
                        this.res_errors = response.data.data.errors.validations;
                    }
                }
            });
        },

        signIn() {
            this.$router.push({path: "/login"});
        },

        reset() {
            this.email = "";
            this.password = "";
            this.res_errors = {}
        },
        backToDashboard() {
            this.$router.push({path: "/"});
        },
    }
};
</script>

<style scoped>
.back {
    background: #e2e2e2;
    width: 100%;
    position: absolute;
    top: 0;
    bottom: 0;
}

.div-center {
    width: 400px;
    height: 400px;
    background-color: #fff;
    position: absolute;
    left: 0;
    right: 0;
    top: 0;
    bottom: 0;
    margin: auto;
    max-width: 100%;
    max-height: 100%;
    overflow: auto;
    padding: 1em 2em;
    border-bottom: 2px solid #ccc;
    display: table;
}

div.content {
    display: table-cell;
    vertical-align: middle;
}
</style>
