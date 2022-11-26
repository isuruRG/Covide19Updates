import Vue from "vue";
import VueRouter from "vue-router";
import DashBoard from "./components/DashBoard";
import Login from "./Login/Login";
import Register from "./Login/Register";
import Logout from "./Login/logout";
import AddNewHelpAndGuid from "./components/AddNewHelpAndGuid";
// import NotFound from "./components/NotFound";
import HelpAndGuides from "./components/HelpAndGuides.vue"

Vue.use(VueRouter);
export default new VueRouter({
    routes: [
        {
            name: "dashBoard",
            path: "/",
            component: DashBoard
        },
        {
            name: "Login",
            path: "/login",
            component: Login
        },
        {
            name: "register",
            path: "/register",
            component: Register
        },
        {
            name: "Logout",
            path: "/logout",
            component: Logout
        },
        {
            name: "add-new-help-and-guid",
            path: "/add-new-help-and-guid",
            component: AddNewHelpAndGuid
        },
        // {
        //     name: "404",
        //     path: "/not-found",
        //     component: NotFound
        // },
        {
            name: "help-and-guides",
            path: "/help-and-guides",
            component: HelpAndGuides
        }
    ],
    mode: "history"
});
