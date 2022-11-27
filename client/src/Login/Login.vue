<template>
    <div class="back">
        <div class="div-center">
            <div class="content">
                <h3>Login</h3>
                <hr/>
                <form>
                    <div class="form-group">
                        <label for="username">Email</label>
                        <input
                            type="email"
                            class="form-control"
                            id="username"
                            placeholder="Email"
                            v-model="email"
                        />

                        <div class="text-danger" v-if="res_errors.email">
                            <h6>{{ res_errors.email[0] }}</h6>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input
                            type="password"
                            class="form-control mt-2"
                            id="exampleInputPassword1"
                            placeholder="Password"
                            v-model="password"
                        />

                        <div class="text-danger" v-if="res_errors.password">
                            <h6>{{ res_errors.password[0] }}</h6>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary mt-2" @click.prevent="submit()">Login</button>
                    <hr/>
                    <button type="button" class="btn btn-link" @click.prevent="signUp()">Signup</button>
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
            email: "",
            password: "",
            res_errors: {}
        };
    },

    mounted() {
    },

    computed: {},

    methods: {

        async submit() {
            await axios.post("api/auth/login", {
                email: this.email,
                password: this.password
            }).then(response => {

                if (response.data.data && response.data.data.errors) {
                    this.res_errors = response.data.data.errors.validations;
                } else {
                    if (response.data && !response.data.errors  && response.data.token != false) {
                        localStorage.setItem("SET_TOKEN", JSON.stringify(response.data.token));
                        this.user(response.data.token)
                        this.$router.push({path: "/"});
                    }else {
                        alert('User Name Or Password Invalid')
                    }
                }
            });
        },

        async user(token) {
            await axios.get("api/auth/user", {
                headers: {
                    'Authorization': 'Bearer ' + token
                }
            }).then(response => {
                console.log(response.data)
                if (response.data && !response.data.errors) {
                    localStorage.setItem("SET_USER", JSON.stringify(response.data.user));
                }
            });
        },

        signUp() {
            this.$router.push({path: "/register"});
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
