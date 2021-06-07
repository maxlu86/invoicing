<template>
    <div>
    <div class="row">
        <router-link to="/user/company" class="btn btn-primary">User's Companies</router-link>
    </div>
    <div class="row justify-content-center">
      <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="login-form">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Create User's Company</h1>
                  </div>
                    <form class="user" @submit.prevent="userCompanyIncert" enctype="multipart/form-data">

                        <div class="form-group form-row">
                            <div class="col-md-2">
                                <img :src="form.logo" style="height: 50px; width: auto;"> 
                                <small class="text-danger" v-if="errors.logo"> {{ errors.logo[0] }} </small>                
                            </div> 

                            <div class="col-md-4">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile" @change="onFileSelected">
                                    <label class="custom-file-label" for="customFile">Choose logo</label>
                                </div>                    
                            </div>      
                        </div>
                        
                        <div class="form-group form-row">
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="CompanyName" 
                                    placeholder="Enter your Company name" v-model="form.company_name">
                                <small class="text-danger" v-if="errors.company_name"> {{ errors.company_name[0] }} </small>
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
                                <input type="text" class="form-control" id="State" 
                                    placeholder="Currency" v-model="form.currency">
                                <small class="text-danger" v-if="errors.currency"> {{ errors.currency[0] }} </small>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="WebPage" 
                                    placeholder="Web Page" v-model="form.web_page">
                                <small class="text-danger" v-if="errors.web_page"> {{ errors.web_page[0] }} </small>
                            </div>
                        </div>   
                                             
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Add Company</button>
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
            axios.post('/api/user/company', this.form)
            .then(() => {
                this.$router.push({ name: 'usercompany'})
                Notification.success()
            })
            .catch(error => this.errors = error.response.data.errors)
            
        },
        
        onFileSelected(event) {
            let file = event.target.files[0];
            if (file.size > 1048770) {
                Notification.image_validation()
            }
            else {
                let reader = new FileReader();
                reader.onload = event =>{
                    this.form.logo = event.target.result
                    console.log(event.target.result)
                };
            reader.readAsDataURL(file);
            }
        },

    }
      
  }
</script>

<style type="text/css">

</style>