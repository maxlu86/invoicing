<template>
    <div>
        <pre>{{ user }}</pre>
        <form @submit.prevent="login">
            <input v-model="form.email" type="email" placeholder="Email..." /> <br/>
            <input v-model="form.password" type="password" placeholder="Password ..." />
            <br />
            <button>Login</button>
        </form>
    </div>
</template>

<script>
    import axios from 'axios';
    export default {
        data: () => ({
            user: {},
            form: {
                email: "max@max.com",
                password: "12345678"
            }
        }),
        methods: {
            login() {
                axios.post('http://localhost:8002/login').then(res=>{
                    console.log(res);
                })
                console.log("Enviando login...", this.form);
            }
        },
    };
</script>

<style lang="sass" scoped>

</style>