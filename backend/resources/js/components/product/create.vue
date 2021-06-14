<template>
    <div>
    <div class="row">
        <router-link to="/product" class="btn btn-primary">All products</router-link>
    </div>
    <div class="row justify-content-center">
      <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="login-form">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Create product</h1>
                  </div>
                    <form class="user" @submit.prevent="productIncert" enctype="multipart/form-data">
                        
                        <div class="form-group form-row">
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="name" 
                                    placeholder="Name" v-model="form.name">
                                <small class="text-danger" v-if="errors.name"> {{ errors.name[0] }} </small>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="sku" 
                                    placeholder="SKU" v-model="form.sku">
                                <small class="text-danger" v-if="errors.sku"> {{ errors.sku[0] }} </small>
                            </div>
                        </div>
                        
                        <div class="form-group form-row">
                            <div class="col-md-12">
                                <input type="text" class="form-control" id="description" 
                                    placeholder="Description" v-model="form.description">
                                <small class="text-danger" v-if="errors.description"> {{ errors.description[0] }} </small>
                            </div>
                        </div>

                        <div class="form-group form-row">
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="sales_account" 
                                    placeholder="Sales Account" v-model="form.sales_account">
                                <small class="text-danger" v-if="errors.sales_account"> {{ errors.sales_account[0] }} </small>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="sales_tax" 
                                    placeholder="Sales tax" v-model="form.sales_tax">
                                <small class="text-danger" v-if="errors.sales_tax"> {{ errors.sales_tax[0] }} </small>
                            </div>
                        </div>

                        <div class="form-group form-row">
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="unit_price" 
                                    placeholder="Unit price" v-model="form.unit_price">
                                <small class="text-danger" v-if="errors.unit_price"> {{ errors.unit_price[0] }} </small>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="total" 
                                    placeholder="Total" v-model="form.total">
                                <small class="text-danger" v-if="errors.total"> {{ errors.total[0] }} </small>
                            </div>
                        </div>

                        <div class="form-group form-row">
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="barcode" 
                                    placeholder="barcode" v-model="form.barcode">
                                <small class="text-danger" v-if="errors.barcode"> {{ errors.barcode[0] }} </small>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="factory_code" 
                                    placeholder="Factory code" v-model="form.factory_code">
                                <small class="text-danger" v-if="errors.factory_code"> {{ errors.factory_code[0] }} </small>
                            </div>
                        </div>

                        <div class="form-group form-row">
                            <div class="col-md-4">
                                <input type="text" class="form-control" id="weight" 
                                    placeholder="Weight" v-model="form.weight">
                                <small class="text-danger" v-if="errors.weight"> {{ errors.weight[0] }} </small>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" id="product_quantity" 
                                    placeholder="Product quantity" v-model="form.product_quantity">
                                <small class="text-danger" v-if="errors.product_quantity"> {{ errors.product_quantity[0] }} </small>
                            </div>
                        </div>

                        <div class="form-group form-row">
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="unit_cost" 
                                    placeholder="Unit cost" v-model="form.unit_cost">
                                <small class="text-danger" v-if="errors.unit_cost"> {{ errors.unit_cost[0] }} </small>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="purchase_tax" 
                                    placeholder="Purchase tax" v-model="form.purchase_tax">
                                <small class="text-danger" v-if="errors.purchase_tax"> {{ errors.purchase_tax[0] }} </small>
                            </div>
                        </div>

                        <div class="form-group form-row">
                            <div class="col-md-8">
                                <label for="selectSupplier">Supplier</label>
                                <select class="form-control" id="selectSupplier" v-model="form.client_id">
                                    <option v-for="supplier in suppliers" :value="supplier.id" :key="supplier.id">{{ supplier.name }}</option>
                                </select>
                            </div>
                          
                        </div>   
                                             
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Add Product</button>
                        </div>
                        <hr>
                       
                    </form>
                  
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

                name: null,
                sku: null,
                description: null,
                sales_account: null,
                sales_tax:null,
                unit_price: null,
                total:null,
                barcode: null,
                factory_code: null,
                weight: null,
                product_quantity: null,
                client_id: null,
                purchase_tax: null,
                unit_cost: null,

                },

            errors:{},
            suppliers:{},
        }
    },
    methods:{
        productIncert() {
            axios.post('/api/product', this.form)
            .then(() => {
                this.$router.push({ name: 'product'})
                Notification.success()
            })
            .catch(error => this.errors = error.response.data.errors)
            
        },

    },

    created(){
         axios.get('/api/client')
            .then(({data}) => (this.suppliers = data))
            .catch(error => this.errors = error.response.data.errors)  
    },
      
  }
</script>

<style type="text/css">

</style>