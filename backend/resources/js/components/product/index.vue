<template>
    <div>
    <div class="row">
        <router-link to="/client/create" class="btn btn-primary">Add Client</router-link>
    </div>
    <br>
    <input type="text" v-model="searchTerm" class="form-control" placeholder="Search..." style="width: 300px">
    <br>
        <div class="row">
            <div class="col-lg-12 mb-4">
              <!-- Simple Tables -->
              <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">User's clients list</h6>
                </div>
                <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th>Client ID</th>
                        <th>Client type</th>
                        <th>Client name</th>
                        <th>VAT</th>
                        <th>City</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="client in filtersearch" :key="client.id">
                        <td>{{ client.id }}</td>
                        <td>{{ client.company_type }}</td>
                        <td>{{ client.name }}</td>
                        <td>{{ client.vat_number }}</td>
                        <td>{{ client.city }}</td>
                        <td>
                            <router-link :to="{name:'clientedit',params:{id:client.id}}" class="btn btn-sm btn-primary">Edit</router-link>
                            <a @click="deleteClient(client.id)" class="btn btn-sm btn-danger"><font color="#ffffff">Delete</font></a>
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
            clients:[],
            searchTerm:''
            
        }
    },
    computed: {
        filtersearch() {
            return this.clients.filter(client => {
                return client.name.match(this.searchTerm)
            })
        }
    },

    methods:{
        allClients() {
            axios.get('/api/client')
            .then(({data}) => (this.clients = data))
            .catch(error => this.errors = error.response.data.errors)  
        },
        deleteClient(id) {
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
                    axios.delete('/api/client/'+id)
                    .then(() => {
                        this.clients = this.clients.filter(client => {
                        return client.id != id
                        })
                    })
                    .catch(() => {
                        this.$router.push({name: 'client'})
                    })

                    Swal.fire(
                    'Deleted!',
                    'Your record has been deleted.',
                    'success'
                    )
                }
            })
        }
    },

    created() {
        this.allClients();
    }
      
  }
</script>

<style type="text/css">
    #uc_logo{
        height: 50px;
    }
</style>