<template>
  <div class="animated">
    <b-row>
      <b-col>
        <h6 v-if="loading"> loading...</h6>
        <div v-else>
          <div class="row">
            <div class="col-md-7 float-left">
              <b-card class="trump-card ">
                <div class="card-title">
                  <div class="caption">
                    <h5><i class="fas fa-key"></i> {{page.name}} page <small class="float-right"> <button class="btn btn-success" @click="showEditPageModal"> Edit</button> </small></h5>
                  </div>
                </div>
                <div class="col-md-12">
                </div>
                <div class="col-md-12">
                  <h5> {{page.sub_title}}</h5>
                  <!-- <img :src="'../../public/images/pages/'+page.image" class="img-fluid" /> -->
                  <h5>
                  </h5>
                  <p class="pt-3" v-html="page.description"></p>
                </div>
              </b-card>
            </div>
            <div class="col-md-5 float-left admin-right">
              <b-card class="trump-card ">
                <div>
                  <div class="card-title">
                    <div class="caption">
                      <h5 ><i class="fas fa-key"></i>  Page Modules <small class="float-right"> <button class="btn btn-success" @click="showModuleModal"> Add </button><button class="btn" v-b-toggle.collapse1> <i class="far fa-eye" ></i></button> </small></h5>
                    </div>
                  </div>
                  <b-collapse visible id="collapse1">
                    <div class="col-md-12">
                      <ul class="no-m-p">
                        <li v-for="mod in module" :key="mod.id"> {{mod.module.title}} <i class="fas fa-times-circle text-danger float-right " @click="remove($event,mod.id)" type="page_module"></i> </li>
                      </ul>
                    </div>
                  </b-collapse>
                </div>
              </b-card>
            </div>
          </div>
        </div>
      </b-col>
    </b-row>
    <b-modal class="ess-modal" ref="courseModal" hide-footer title="Edit Page">
      <form @submit.prevent="editPage" ref="editPageForm">
        <input type="hidden" name="id" :value="page.id">
        <div class="form-group">
          <label for="">Name</label>
          <input type="text" name="name" v-bind:value="page.name" class="form-control" placeholder="" required>
        </div>
        <div class="form-group" v-if="page.image == null">
          <label for="">Image </label>
          <croppa v-model="myCroppa" :initial-image="img" :width="384" :height="54" placeholder="Choose an image" :placeholder-font-size="0" :disabled="false" :quality="5" :show-remove-button="true" :prevent-white-space="true"></croppa>
          <input type="file" name="image" class="form-control">
        </div>
        <div class="form-group" v-else>
          <label for="">Image </label> <br>
          <croppa v-model="myCroppa" :initial-image="img" :width="384" :height="54" placeholder="Click to choose an image" :placeholder-font-size="14" :disabled="false" :quality="5" :show-remove-button="true" :prevent-white-space="true"></croppa>
        </div>
        <div class="form-group">
          <label for="">Parent page</label>
          <select v-bind:value="page.parent_id" name="parent_id" class="form-control">
            <option value=""> Select Parent Page </option>
            <option v-for="page in pages" :value="page.id" :key="page.id"> {{page.name}}</option>
          </select>
        </div>
        <div class="form-group">
          <label for="">Sub Title</label>
          <input type="text" name="sub_title" v-bind:value="page.sub_title" class="form-control" placeholder="">
        </div>
        <div class="form-group">
          <label for="">Description</label>
          <textarea name="description" id="" class="form-control" rows="5" v-bind:value="page.description"></textarea>
        </div>
        <b-btn class="mt-3 pull-right" variant="primary" type="submit">Edit Page</b-btn>
        <b-btn class="mt-3 pull-right" style="margin-right:5px;" variant="default" @click="hideEditPageModal">Cancel</b-btn>
      </form>
    </b-modal>
    <b-modal class="ess-modal" ref="moduleModal" hide-footer title="Add Module">
      <form @submit.prevent="addModule" ref="addModuleForm">
        <input type="hidden" name="page_id" :value="page.id">
        <div class="form-group">
          <label for=""> Module</label>
          <select name="module_id" class="form-control">
            <option value="">Select A Module</option>
            <option v-for="mod in allModules" :value="mod.id" :key="mod.id">{{mod.title}}</option>
          </select>
        </div>
        <div class="form-group">
          <label for=""> Order By</label>
          <input type="text" class="form-control" name="order_by">
        </div>
        <b-btn class="mt-3 pull-right" variant="primary" type="submit">Save Module</b-btn>
        <b-btn class="mt-3 pull-right" style="margin-right:5px;" variant="default" @click="hideModuleModal">Cancel</b-btn>
      </form>
    </b-modal>
  </div>
</template>
<style lang="" scoped>
  .no-m-p {
    padding: 0px !important;
    margin: 0px !important;
  }

  .caption {
    width: 100%;
  }
</style>
<script>
  export default {
    data() {
      return {
        myCroppa: null,
        module: '',
        allModules: '',
        page: '',
        pages: '',
        loading: true,
      }
    },
    created() {
      this.fetchPage();
      this.fetchPages();
      this.fetchModule();
      this.fetchModules();
    },
    computed: {
      img() {
        if (this.page.image != null) {
          this.myCroppa.refresh()
          return '../../public/images/pages/' + this.page.image
        }
      }
    },
    methods: {
      addModule() {
        var self = this;
        var form = self.$refs.addModuleForm;
        var formData = new FormData(form);
        let url = self.$root.baseUrl + '/api/admin/page_module';
        axios.post(url, formData).then(function(response) {
            if (response.status === 201) {
              self.fetchModule();
              self.hideModuleModal();
              self.$toastr.s("A module has been added.");
            }
          })
          .catch(function(error) {
            if (error.response.status === 422) {
              self.$toastr.e(error.response.data.errors.name);
            }
          });
      },
      remove(event, id) {
        console.log(id);
        let type = event.currentTarget.attributes['type'].value;
        let vm = this;
        let self = this;
        let url = self.$root.baseUrl + '/api/admin/' + type + '/';
        axios.delete(url + id).then(function(response) {
            vm.fetchModule();
            self.$toastr.s("A module has been removed.");
          })
          .catch(function(error) {
            console.log(error);
            vm.loading = false;
          });
      },
      fetchModule() {
        let vm = this;
        let self = this;
        let id = parseInt(this.$route.params.id);
        let url = self.$root.baseUrl + '/api/admin/page_modules/';
        axios.get(url + id).then(function(response) {
            if (response.data == 'error') {
              self.$router.push('../pages');
            }
            vm.module = response.data.data;
            vm.loading = false;
          })
          .catch(function(error) {
            console.log(error);
            vm.loading = false;
          });
      },
      fetchModules() {
        let vm = this;
        let self = this;
        let url = self.$root.baseUrl + '/api/admin/modules/';
        axios.get(url).then(function(response) {
            vm.allModules = response.data.data;
            vm.loading = false;
          })
          .catch(function(error) {
            console.log(error);
            vm.loading = false;
          });
      },
      fetchPage() {
        var self = this;
        let id = parseInt(this.$route.params.id);
        let url = self.$root.baseUrl + '/api/admin/pages/';
        axios.get(url + id).then(function(response) {
            if (response.data == 'error') {
              self.$router.push('../pages');
            }
            // console.log(response);
            self.page = response.data.data;
            self.loading = false;
          })
          .catch(function(error) {
            //  window.location =self.$root.baseUrl + '/admin/courses/';
            self.$toastr.e('Something went wrong please try again.');
          });
      },
      fetchPages() {
        var self = this;
        let id = parseInt(this.$route.params.id);
        let url = self.$root.baseUrl + '/api/admin/pages/';
        axios.get(url).then(function(response) {
            // console.log(response);
            self.pages = response.data.data;
            self.loading = false;
          })
          .catch(function(error) {
            //  window.location =self.$root.baseUrl + '/admin/courses/';
            self.$toastr.e('Something went wrong please try again.');
          });
      },
      editPage() {
        var self = this;
        var form = self.$refs.editPageForm;
        var formData = new FormData(form);
        let url = self.$root.baseUrl + '/api/admin/edit-page';
        formData.append('image', this.myCroppa.generateDataUrl())
        axios.post(url, formData).then(function(response) {
            console.log(response);
            self.fetchPage();
            $(form)[0].reset();
            self.hideEditPageModal();
            self.$toastr.s("A page has been edited.");
          })
          .catch(function(error) {
            if (error.response.status === 422) {
              self.$toastr.e(error.response.data.errors.name);
            }
          });
      },
      showEditPageModal() {
        this.$refs.courseModal.show()
      },
      hideEditPageModal() {
        this.$refs.courseModal.hide()
      },
      showModuleModal() {
        this.$refs.moduleModal.show()
      },
      hideModuleModal() {
        this.$refs.moduleModal.hide()
      },
    },
  }
</script>