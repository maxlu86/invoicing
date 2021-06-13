<template>
    <div>
    <div class="row">
        <router-link to="/client-category" class="btn btn-primary">All client/contact categories</router-link>
    </div>
    <div class="row justify-content-center">
      <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="login-form">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Update category</h1>
                  </div>
                    <form class="user" @submit.prevent="clientCategoryUpdate" enctype="multipart/form-data">

                         <div class="form-group form-row">
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="CategoryName" 
                                    placeholder="Category name" v-model="form.category_name">
                                <small class="text-danger" v-if="errors.category_name"> {{ errors.category_name[0] }} </small>
                            </div>
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary btn-block">Update Category</button>
                            </div>
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
               category_name: '',
                },
            errors:{

            },
        }
    },
    created() {
        let id = this.$route.params.id
        axios.get('/api/client-category/'+id)
        .then(({data}) =>(this.form = data))
        .catch(console.log('error'))
    },
    methods:{
        clientCategoryUpdate() {
            let id = this.$route.params.id
            axios.patch('/api/client-category/'+id, this.form)
            .then(() => {
                this.$router.push({ name: 'clientcategory'})
                Notification.success()
            })
            .catch(error => this.errors = error.response.data.errors)
            
        },

    }
      
  }
</script>

<style type="text/css">

</style>