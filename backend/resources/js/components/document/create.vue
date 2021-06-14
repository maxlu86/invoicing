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
                    <h1 class="h4 text-gray-900 mb-4">Create document</h1>
                  </div>
                  <img :src="'../'+company.logo" id="uc_logo">
                    <form class="user" @submit.prevent="documentIncert" enctype="multipart/form-data">
                          <div class="row">
                            <div class="col-lg-6">
                            <!-- Document header -->
                            <div class="card mb-4">
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">TO:</h6>
                                </div>
                                <div class="card-body">
                                    <form>
                                        <div class="form-group">                                   
                                            <label for="selectClient">Choose a client</label>
                                            <select class="form-control" id="selectClient" v-model="form.client_id" @click.prevent="addClient(form.client_id)">
                                                <option v-for="client in clients" :value="client.id" :key="client.id">{{ client.name }}</option>
                                            </select>                                   
                                        </div>

                                        <div class="form-group">                                   
                                            <template v-if="form.client_id">
                                                <h2>{{ client.name }}</h2>
                                                <p>VAT: {{ client.vat_number }}</p>
                                                <p>{{ client.street_1 }}</p>
                                                <p>{{ client.street_2 }}</p>
                                                <p>{{ client.zip_code }} {{ client.city }}</p>
                                                <p>{{ client.state }}</p> 
                                                <p>{{ client.country }}</p>
                                            </template>                                
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="inputEmail1">Email address</label>
                                            <input type="email" class="form-control" id="inputEmail1" aria-describedby="emailHelp" v-model="form.email"
                                                placeholder= "" >
                                            <small id="emailHelp" class="form-text text-muted">Please enter email to send a document</small>
                                        </div>
                                        
                                    </form>
                                </div>
                            </div>    
                            </div>
                            
                            <div class="col-lg-6">
                                <div class="card mb-4">
                                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                        <h6 class="m-0 font-weight-bold text-primary">FROM:</h6>
                                    </div>
                                    <div class="card-body">
                                        <form>
                                            <div class="form-group">                                   
                                                <label for="selectCompany">Choose a company</label>
                                                <select class="form-control" id="selectCompany" v-model="form.user_company_id" @click.prevent="addUserCompany(form.user_company_id)">
                                                    <option v-for="company in companies" :value="company.id" :key="company.id">{{ company.company_name }}</option>
                                                </select>                                   
                                            </div>
                                            <div class="form-group">                                   
                                                <template v-if="form.user_company_id">
                                                        <h2>{{ company.company_name }}</h2>
                                                        <p>VAT: {{ company.vat_number }}</p>
                                                        <p>{{ company.street_1 }}</p>
                                                        <p>{{ company.street_2 }}</p>
                                                        <p>{{ company.zip_code }} {{ company.city }}</p>
                                                        <p>{{ company.state }}</p> 
                                                        <p>{{ company.country }}</p>
                                                        <p>{{ company.web_page }}</p>
                                                    </template>                               
                                            </div>
                                        </form>
                                    </div>
                                </div>
                
                                
                            </div>
                        </div>
                                    
                        <div class="form-group form-row">
                            <div class="col-md-4">
                                <label for="type">Document type:</label>
                                <input type="text" class="form-control" id="type" 
                                    placeholder="Document type" v-model="form.type">
                                <small class="text-danger" v-if="errors.type"> {{ errors.type[0] }} </small>
                            </div>
                            <div class="col-md-4">
                                <label for="serial_number">Serial number:</label>
                                <input type="text" class="form-control" id="serial_number" 
                                    placeholder="Serial number" v-model="form.serial_number">
                                <small class="text-danger" v-if="errors.serial_number"> {{ errors.serial_number[0] }} </small>
                            </div>
                        </div>

                        <div class="form-group form-row">
                            <div class="col-md-4">
                                <label for="issue_date">Issue date:</label>
                                <input type="text" class="form-control" id="issue_date" 
                                    placeholder="Issue date" v-model="form.issue_date">
                                <small class="text-danger" v-if="errors.issue_date"> {{ errors.issue_date[0] }} </small>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group" id="simple-date2">
                                    <label for="expiring_date">Expiring date:</label>
                                    <div class="input-group date">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                        </div>
                                        <input type="text" class="form-control" value="01/06/2020" id="expiring_date" v-model="form.expiring_date">
                                        <small class="text-danger" v-if="errors.expiring_date"> {{ errors.expiring_date[0] }} </small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="payment_method">Payment method:</label>
                                <input type="text" class="form-control" id="payment_method" 
                                    placeholder="Payment method" v-model="form.payment_method">
                                <small class="text-danger" v-if="errors.payment_method"> {{ errors.payment_method[0] }} </small>
                            </div>
                        </div>

                        <!-- Invoice Example -->
                        <div class="col-xl-12 col-lg-7 mb-4">
                        <div class="card">
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Invoice</h6>
                            <a class="m-0 float-right btn btn-danger btn-sm" href="#">Add line<i
                                class="fas fa-chevron-right"></i></a>
                            </div>
                            <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                <tr>
                                    <th>Position</th>
                                    <th>Product</th>
                                    <th>Description</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Tax, %</th>
                                    <th>Total</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        <input type="text" class="form-control" id="position" 
                                        placeholder="" v-model="line.position">
                                    </td>
                                    
                                    <td>
                                        <div class="form-group">                                   
                                            <select class="form-control" id="selectProduct" v-model="form.client_id" @click.prevent="addProduct(form.client_id)">
                                                <option v-for="product in products" :value="product.id" :key="product.id">{{ product.name }}</option>
                                            </select>                                   
                                        </div>
                                    </td>
                                    <td>{{ product.description }}</td>
                                    <td>
                                        <input type="text" class="form-control" id="price" 
                                        :value= product.unit_price>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" id="quantity" 
                                        placeholder="0" v-model="line.quantity">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" id="sales_tax" 
                                        :value= product.sales_tax>
                                    </td>
                                    <td>Total price</td>
                                    <td><a href="#" class="btn btn-sm btn-primary">Detail</a></td>
                                </tr>
                                </tbody>
                            </table>
                            </div>
                            <div class="card-footer"></div>
                        </div>
                        </div>
      

                        <div class="form-group form-row">
                            <div class="col-md-8">
                                <label for="note">Note:</label>
                                <input type="text" class="form-control" id="note" 
                                    placeholder="Enter note here" v-model="form.note">
                                <small class="text-danger" v-if="errors.note"> {{ errors.note[0] }} </small>
                            </div>
                            
                        </div>

                                             
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Save Document</button>
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

                type:null,
                user_company_id:null,
                client_id:null,
                email:null,
                issue_date:null,
                expiring_date:null,
                serial_number:null,
                payment_method:null,
                note:null,
                subtotal:null,

                },
            errors:{},
            
            clients:{},
            client: {
                company_type: '',
                name: '',
                id_number: '',
                display_name: '',
                vat_number: '',
                email:'',
                phone:'',
                street_1: '',
                street_2: '',
                zip_code: '',
                city: '',
                state: '',
                country: '',
                internal_notes: '',
                web_page: '',
                payment_method: '',
                sales_account: '',
                purchase_account: '',
                reference: '',
                due_date: '',
                discount: '',
                payment_day: '',
                sales_tax: '',
                purchase_tax: '',
            },

            companies:{},
            company:{
                company_name: '',
                vat_number: '',
                id_number: '',
                display_name: '',
                email:'',
                phone:'',
                street_1: '',
                street_2: '',
                zip_code: '',
                city: '',
                state: '',
                country: '',
                web_page: '',
                logo: '',
            },

            products:{},
            product:{
                name:'',            
                sku:'',
                description:'',
                sales_account:'',
                sales_tax:'',
                unit_price:'',
                total:'',
                barcode:'',
                factory_code:'',
                weight:'',
                product_quantity:'',
                client_id:'',
                purchase_tax:'',
                unit_cost:'',
            },
            line:{
                position:null,
                description:null,
                product_id:null,
                quantity:null,
                price:null,
                tax:null,
                total:null,
            },
        }
    },
    methods:{
        documentIncert() {
            axios.post('/api/document', this.form)
            .then(() => {
                axios.post('/api/line', this.line)
                .then(()=>{
                // this.$router.push({ name: 'document'})
                Notification.success()
                })
            })
            .catch(error => this.errors = error.response.data.errors)
            
        },

        addProduct(id) {                  
        axios.get('/api/product/'+id)
            .then(({data}) =>(this.product = data))
            .catch(console.log('error'));
        },

        addClient(id) {                  
        axios.get('/api/client/'+id)
            .then(({data}) =>(this.client = data))
            .catch(console.log('error'));
        },

        addUserCompany(id) {                  
        axios.get('/api/user/company/'+id)
            .then(({data}) =>(this.company = data))
            .catch(console.log('error'));
        },

    },

    created(){
        axios.get('/api/client')
            .then(({data}) => (this.clients = data))
            .catch(error => this.errors = error.response.data.errors);  
        axios.get('/api/user/company')
            .then(({data}) => (this.companies = data))
            .catch(error => this.errors = error.response.data.errors); 
        axios.get('/api/product')
            .then(({data}) => (this.products = data))
            .catch(error => this.errors = error.response.data.errors);
    },
      
  }
</script>

<style type="text/css">

</style>