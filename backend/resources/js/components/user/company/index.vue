<template>
    <div>
    <div class="row">
        <router-link to="/user/company/create" class="btn btn-primary">Add Company</router-link>
    </div>
    <div class="row justify-content-center">
      <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="login-form">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">User's Companies Information</h1>
                  </div>
                  <hr>
                  <div class="text-center">
                    
                  </div>

                  <div class="text-center">
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
</template>

<script type="text/javascript">
  export default {
    created(){
        if (!User.loggedIn()) {
            this.$router.push({ name: '/'})
        }
    },

    data() {
        return {
            form:{
                company_name: null,
                vat_number: null,
                id_number: null,
                display_name: null,
                email:null,
                phone:null,
                street_1: null,
                street_2: null,
                zip_code: null,
                city: null,
                state: null,
                country: null,
                web_page: null,
                logo: null,
                },
            errors:{

            },
        }
    },
    methods:{
        userCompanyIncert() {
            axios.post('/api/auth/signup', this.form)
            .then(res => {
                User.responseAfterLogin(res)
                Toast.fire({
                    icon: 'success',
                    title: 'Signed in successfully'
                })
                this.$router.push({ name: 'home'})
            })
            .catch(error => this.errors = error.response.data.errors)
            
        }
    }
      
  }
</script>

<style type="text/css">

</style>