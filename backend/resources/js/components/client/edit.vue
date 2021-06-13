<template>
    <div>
    <div class="row">
        <router-link to="/client" class="btn btn-primary">All clients</router-link>
    </div>
    <div class="row justify-content-center">
      <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="login-form">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Update client</h1>
                  </div>
                    <form class="user" @submit.prevent="clientUpdate" enctype="multipart/form-data">

                         <div class="form-group form-row">
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="CompanyType" 
                                    placeholder="Enter Company type*" v-model="form.company_type">
                                <small class="text-danger" v-if="errors.company_type"> {{ errors.company_type[0] }} </small>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="InternalNotes" 
                                    placeholder="Internal notes" v-model="form.internal_notes">
                                <small class="text-danger" v-if="errors.internal_notes"> {{ errors.internal_notes[0] }} </small>
                            </div>
                        </div>
                        
                        <div class="form-group form-row">
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="CompanyName" 
                                    placeholder="Enter Company name" v-model="form.name">
                                <small class="text-danger" v-if="errors.name"> {{ errors.name[0] }} </small>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="VatNumber" 
                                    placeholder="VAT number" v-model="form.vat_number">
                                <small class="text-danger" v-if="errors.vat_number"> {{ errors.vat_number[0] }} </small>
                            </div>
                        </div>

                        <div class="form-group form-row">
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="IdNumber" 
                                    placeholder="Internal ID number" v-model="form.id_number">
                                <small class="text-danger" v-if="errors.id_number"> {{ errors.id_number[0] }} </small>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="DisplayName" 
                                    placeholder="Display Name" v-model="form.display_name">
                                <small class="text-danger" v-if="errors.display_name"> {{ errors.display_name[0] }} </small>
                            </div>
                        </div>

                        <div class="form-group form-row">
                            <div class="col-md-6">
                                <input type="email" class="form-control" id="Email" 
                                    placeholder="Company Email address" v-model="form.email">
                                <small class="text-danger" v-if="errors.email"> {{ errors.email[0] }} </small>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="Phone" 
                                    placeholder="Phone number" v-model="form.phone">
                                <small class="text-danger" v-if="errors.phone"> {{ errors.phone[0] }} </small>
                            </div>
                        </div>

                        <div class="form-group form-row">
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="Street1" 
                                    placeholder="Street field 1" v-model="form.street_1">
                                <small class="text-danger" v-if="errors.street_1"> {{ errors.street_1[0] }} </small>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="Street2" 
                                    placeholder="Street field 2" v-model="form.street_2">
                                <small class="text-danger" v-if="errors.street_2"> {{ errors.street_2[0] }} </small>
                            </div>
                        </div>

                        <div class="form-group form-row">
                            <div class="col-md-4">
                                <input type="text" class="form-control" id="ZipCode" 
                                    placeholder="Zip code" v-model="form.zip_code">
                                <small class="text-danger" v-if="errors.zip_code"> {{ errors.zip_code[0] }} </small>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" id="City" 
                                    placeholder="City" v-model="form.city">
                                <small class="text-danger" v-if="errors.city"> {{ errors.city[0] }} </small>
                            </div>
                        </div>

                        <div class="form-group form-row">
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="State" 
                                    placeholder="State" v-model="form.state">
                                <small class="text-danger" v-if="errors.state"> {{ errors.state[0] }} </small>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="Country" 
                                    placeholder="Country" v-model="form.country">
                                <small class="text-danger" v-if="errors.country"> {{ errors.country[0] }} </small>
                            </div>
                        </div>

                        <div class="form-group form-row">
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="Discount" 
                                    placeholder="Discount" v-model="form.discount">
                                <small class="text-danger" v-if="errors.discount"> {{ errors.discount[0] }} </small>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="WebPage" 
                                    placeholder="Web Page" v-model="form.web_page">
                                <small class="text-danger" v-if="errors.web_page"> {{ errors.web_page[0] }} </small>
                            </div>
                        </div>   

                        <div class="form-group form-row">
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="PaymentMethod" 
                                    placeholder="Payment method" v-model="form.payment_method">
                                <small class="text-danger" v-if="errors.payment_method"> {{ errors.payment_method[0] }} </small>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="SalesAccount" 
                                    placeholder="Sales Account" v-model="form.sales_account">
                                <small class="text-danger" v-if="errors.sales_account"> {{ errors.sales_account[0] }} </small>
                            </div>
                        </div>

                        <div class="form-group form-row">
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="PurchaseAccount" 
                                    placeholder="Purchase account" v-model="form.purchase_account">
                                <small class="text-danger" v-if="errors.purchase_account"> {{ errors.purchase_account[0] }} </small>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="Reference" 
                                    placeholder="Reference" v-model="form.reference">
                                <small class="text-danger" v-if="errors.reference"> {{ errors.reference[0] }} </small>
                            </div>
                        </div>

                        <div class="form-group form-row">
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="DueDate" 
                                    placeholder="Due date" v-model="form.due_date">
                                <small class="text-danger" v-if="errors.due_date"> {{ errors.due_date[0] }} </small>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="PaymentDay" 
                                    placeholder="Payment day" v-model="form.payment_day">
                                <small class="text-danger" v-if="errors.payment_day"> {{ errors.payment_day[0] }} </small>
                            </div>
                        </div>

                        <div class="form-group form-row">
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="SalesTax" 
                                    placeholder="Sales tax" v-model="form.sales_tax">
                                <small class="text-danger" v-if="errors.sales_tax"> {{ errors.sales_tax[0] }} </small>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="PurchaseTax" 
                                    placeholder="Purchase Tax" v-model="form.purchase_tax">
                                <small class="text-danger" v-if="errors.purchase_tax"> {{ errors.purchase_tax[0] }} </small>
                            </div>
                        </div>
                                             
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Update Client</button>
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
            errors:{

            },
        }
    },
    created() {
        let id = this.$route.params.id
        axios.get('/api/client/'+id)
        .then(({data}) =>(this.form = data))
        .catch(console.log('error'))
    },
    methods:{
        clientUpdate() {
            let id = this.$route.params.id
            axios.patch('/api/client/'+id, this.form)
            .then(() => {
                this.$router.push({ name: 'client'})
                Notification.success()
            })
            .catch(error => this.errors = error.response.data.errors)
            
        },

    }
      
  }
</script>

<style type="text/css">

</style>