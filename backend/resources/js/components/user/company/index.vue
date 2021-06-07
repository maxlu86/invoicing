<template>
    <div>
    <div class="row">
        <router-link to="/user/company/create" class="btn btn-primary">Add Company</router-link>
    </div>
    <br><br>
        <div class="row">
            <div class="col-lg-12 mb-4">
              <!-- Simple Tables -->
              <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">User's companies list</h6>
                </div>
                <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th>Company ID</th>
                        <th>Logo</th>
                        <th>Company name</th>
                        <th>VAT</th>
                        <th>City</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="user_company in user_companies" :key="user_company.id">
                        <td>{{ user_company.id }}</td>
                        <td><img :src="'../'+user_company.logo" id="uc_logo"></td>
                        <td>{{ user_company.company_name }}</td>
                        <td>{{ user_company.vat_number }}</td>
                        <td>{{ user_company.city }}</td>
                        <td><a href="#" class="btn btn-sm btn-primary">Detail</a></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="card-footer"></div>
              </div>
            </div>
          </div>
          <!--Row-->
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
            user_companies:[],
            
        }
    },
    methods:{
        allUserCompanies() {
            axios.get('/api/user/company')
            .then(({data}) => (this.user_companies = data))
            .catch(error => this.errors = error.response.data.errors)
            
        }
    },

    created() {
        this.allUserCompanies();
    }
      
  }
</script>

<style type="text/css">
    #uc_logo{
        height: 50px;
    }
</style>