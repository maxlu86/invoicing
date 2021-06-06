<template>

	<div class="p-grid p-fluid">
		<div class="p-col-12 p-md-6">
			<div class="card p-fluid">
        <form @submit.prevent="login">
          <h5>Login</h5>
                  <br/>
          <span class="p-float-label">
            <InputText id="email" label="email" v-model="form.email" type="email"/>
            <label for="email">Email</label>
          </span>
                  <br/>
          <span class="p-float-label">
            <InputText id="password" v-model="form.password" type="password"	label="password"/>
            <label for="password">Password</label>
          </span>

          <Button type="submit" label="Submit" class="p-mr-2 p-mb-2"></Button>
        </form>
			</div>

    </div>

  </div>
</template>

<script>

export default {
  data() {
    return {
      form: {
        email: null,
        password: null
      }  
    }
  },

  methods: {
    login() {
      this.$store
        .dispatch("login", {
          email: this.email,
          password: this.password,
        })
        .then(() => {
          this.$router.push({ name: "dashboard" });
        })
        .catch((err) => {
          this.error = err.response.data.error;
        });
    },
  },
};
</script>