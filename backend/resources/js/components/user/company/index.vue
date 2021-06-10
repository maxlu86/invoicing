<template>
    <div>
    <div class="row">
        <router-link to="/user/company/create" class="btn btn-primary">Add Company</router-link>
    </div>
    <br>
    <input type="text" v-model="searchTerm" class="form-control" placeholder="Search..." style="width: 300px">
    <br>
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
                      <tr v-for="user_company in filtersearch" :key="user_company.id">
                        <td>{{ user_company.id }}</td>
                        <td><img :src="'../'+user_company.logo" id="uc_logo"></td>
                        <td>{{ user_company.company_name }}</td>
                        <td>{{ user_company.vat_number }}</td>
                        <td>{{ user_company.city }}</td>
                        <td>
                            <router-link :to="{name:'usercompany-edit',params:{id:user_company.id}}" class="btn btn-sm btn-primary">Edit</router-link>
                            <a @click="deleteUserCompany(user_company.id)" class="btn btn-sm btn-danger"><font color="#ffffff">Delete</font></a>
                        </td>
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
            searchTerm:''
            
        }
    },
    computed: {
        filtersearch() {
            return this.user_companies.filter(user_company => {
                return user_company.company_name.match(this.searchTerm)
            })
        }
    },

    methods:{
        allUserCompanies() {
            axios.get('/api/user/company')
            .then(({data}) => (this.user_companies = data))
            .catch(error => this.errors = error.response.data.errors)  
        },
        deleteUserCompany(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                if (result.isConfirmed) {
                    axios.delete('/api/user/company/'+id)
                    .then(() => {
                        this.user_companies = this.user_companies.filter(user_company => {
                        return user_company.id != id
                        })
                    })
                    .catch(() => {
                        this.$router.push({company_name: 'company'})
                    })

                    Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                    )
                }
            })
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