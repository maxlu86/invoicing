<template>
    <div>
    <div class="row">
        <router-link to="/product/create" class="btn btn-primary">Add Product</router-link>
    </div>
    <br>
    <input type="text" v-model="searchTerm" class="form-control" placeholder="Search..." style="width: 300px">
    <br>
        <div class="row">
            <div class="col-lg-12 mb-4">
              <!-- Simple Tables -->
              <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Product list</h6>
                </div>
                <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th>Product ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Unit price</th>
                        <th>Supplier</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="product in filtersearch" :key="product.id">
                        <td>{{ product.id }}</td>
                        <td>{{ product.name }}</td>
                        <td>{{ product.description }}</td>
                        <td>{{ product.unit_price }}</td>
                        <td>{{ product.client_name }}</td>
                        <td>
                            <router-link :to="{name:'productedit',params:{id:product.id}}" class="btn btn-sm btn-primary">Edit</router-link>
                            <a @click="deleteProduct(product.id)" class="btn btn-sm btn-danger"><font color="#ffffff">Delete</font></a>
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
            products:[],
            searchTerm:''
            
        }
    },
    computed: {
        filtersearch() {
            return this.products.filter(product => {
                return product.name.match(this.searchTerm)
            })
        }
    },

    methods:{
        allProducts() {
            axios.get('/api/product')
            .then(({data}) => (this.products = data))
            .catch(error => this.errors = error.response.data.errors)  
        },
        deleteProduct(id) {
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
                    axios.delete('/api/product/'+id)
                    .then(() => {
                        this.products = this.products.filter(product => {
                        return product.id != id
                        })
                    })
                    .catch(() => {
                        this.$router.push({name: 'product'})
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
        this.allProducts();
    }
      
  }
</script>

<style type="text/css">
    #uc_logo{
        height: 50px;
    }
</style>