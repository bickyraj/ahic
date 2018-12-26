
<template>
  <div class="animated">
    <b-row>
      <b-col>
        <b-card class="mb-2 trump-card">
          <div class="card-title">
            <div class="caption">
              <h5><i class="fas fa-key"></i> Content Management </h5>
            </div>
            <div class="caption card-title-actions">
            </div>
          </div>
        </b-card>
      </b-col>
    </b-row>

    <div class="" v-if="!loading">
      <b-row>
        <b-col>
          <b-card class="mb-2 trump-card">
            <div class="card-title">
              <div class="caption">
                <h5><i class="fas fa-key"></i> Header </h5>
              </div>
              <div class="caption card-title-actions">
                <b-button v-if="header" @click="info('header',$event.target)" variant="success" class="btn btn-sm green pull-right">Edit Header</b-button>
                <b-button v-else @click="showModal('header')" variant="primary" class="btn btn-sm green pull-right">Add New Header</b-button>
              </div>
            </div>
            <b-row  v-if="header">
              <b-col md="3">
                <img :src="'../public/images/cms/'+header.image" alt="" class="img-fluid">
              </b-col>
              <b-col md="6">
                      {{header.title}}
                      <br>
                      {{header.sub_title}}
                      <br>
                      <span :html="header.description">
                      </span>
                      <br>
                      {{header.link}}
              </b-col>
            </b-row>
          </b-card>
        </b-col>
      </b-row>
      <b-row>
        <b-col md="6">
          <b-card class="mb-2 trump-card">
            <div class="card-title">
              <div class="caption">
                <h5><i class="fas fa-key"></i> Left Banner  </h5>
              </div>
              <div class="caption card-title-actions">
                <b-button v-if="lc" @click="info('lc',$event.target)" variant="success" class="btn btn-sm green pull-right">Edit Content</b-button>
                <b-button v-else @click="showModal('lc')" variant="primary" class="btn btn-sm green pull-right">Add Content</b-button>
              </div>

              <b-row  v-if="lc">
                <b-col md="6">
                  <img :src="'../public/images/cms/'+lc.image" alt="" class="img-fluid">
                </b-col>
                <b-col md="6">
                        {{lc.title}}
                        <br>
                        {{lc.sub_title}}
                        <br>
                        <span :html="lc.description">
                        </span>
                        <br>
                        {{lc.link}}
                </b-col>
              </b-row>
            </div>
          </b-card>
        </b-col>
        <b-col md="6">
          <b-card class="mb-2 trump-card">
            <div class="card-title">
              <div class="caption">
                <h5><i class="fas fa-key"></i> Right Banner </h5>
              </div>
              <div class="caption card-title-actions">
                <b-button v-if="rc" @click="info('rc',$event.target)" variant="success" class="btn btn-sm green pull-right">Edit Content</b-button>
                <b-button v-else @click="showModal('rc')" variant="primary" class="btn btn-sm green pull-right">Add Content</b-button>
              </div>
            </div>
            <b-row  v-if="rc">
              <b-col md="6">
                <img :src="'../public/images/cms/'+rc.image" alt="" class="img-fluid">
              </b-col>
              <b-col md="6">
                      {{rc.title}}
                      <br>
                      {{rc.sub_title}}
                      <br>
                      <span :html="rc.description">
                      </span>
                      <br>
                      {{rc.link}}
              </b-col>
            </b-row>
          </b-card>
        </b-col>
        <b-col md="12">
          <b-card class="mb-2 trump-card">
            <div class="card-title">
              <div class="caption">
                <h5><i class="fas fa-key"></i> Welcome </h5>
              </div>
              <div class="caption card-title-actions">
                <b-button v-if="welcome" @click="info('welcome',$event.target)" variant="success" class="btn btn-sm green pull-right">Edit Content</b-button>
                <b-button v-else @click="showModal('welcome')" variant="primary" class="btn btn-sm green pull-right">Add Content</b-button>
              </div>

            </div>
            <b-row  v-if="welcome">
              <b-col md="3">
                <img :src="'../public/images/cms/'+welcome.image" alt="" class="img-fluid">
              </b-col>
              <b-col md="9">
                      {{welcome.title}}
                      <br>
                      {{welcome.sub_title}}
                      <br>
                      <span :html="welcome.description">
                      </span>
                      <br>
                      {{welcome.link}}
              </b-col>
            </b-row>
          </b-card>
        </b-col>
      </b-row>

    </div>

    <b-modal class="ess-modal" ref="myModalRef" hide-footer :title="'Add New Content'">
      <form @submit.prevent="addData" ref="addNewsForm" enctype="multipart/form-data">
        <input type="hidden" name="slug"  ref="slug">
        <div class="form-group">
          <label for="">Title </label>
          <input type="text" name="title" class="form-control" placeholder="" required>
        </div>
        <div class="form-group">
          <label for="">Sub Title </label>
          <input type="text" name="sub_title" class="form-control" placeholder="" required>
        </div>
        <div class="form-group">
          <label for="">Image  </label>
          <croppa
           v-model="myCroppa"
           :width="crop.width"
           :height="crop.height"
           placeholder="Choose an image"
           :placeholder-font-size="0"
           :disabled="false"
           :quality="crop.scale"
           :prevent-white-space="true"
>
</croppa >
        </div>
        <div class="form-group">
              <label> Description </label>
         <editor name="description"  :init="editor"></editor>
        </div>
        <div class="form-group">
          <label for="">Link </label>
          <input type="text" name="link" class="form-control" placeholder="" >
        </div>
        <b-btn class="mt-3 pull-right" variant="primary" type="submit">Create Content</b-btn>
        <b-btn class="mt-3 pull-right" style="margin-right:5px;" variant="default" @click="hideModal">Cancel</b-btn>
      </form>
    </b-modal>

     <!-- Info modal -->
    <b-modal class="ess-modal" id="modalInfo" ref="editModal" hide-footer @hide="resetModal" :title="modalInfo.title">
      <form @submit.prevent="editNews" :row="modalInfo.row" ref="editNewsForm">
        <input type="hidden" name="id" :value="modalInfo.data.id">
        <input type="" name="slug" v-model="slug">
                  <div class="form-group">
                    <label for="">Title </label>
                    <input type="text" name="title" :value="modalInfo.data.title" class="form-control" placeholder="" required>
                  </div>
                  <div class="form-group">
                    <label for="">Sub Title </label>
                    <input type="text" name="sub_title" :value="modalInfo.data.sub_title" class="form-control" placeholder="" required>
                  </div>
                  <div class="form-group" v-if="modalInfo.data.image == null">
                    <label for="">Image  </label>
                    <input type="file" name="image" class="form-control">
                  </div>
                  <div class="form-group" v-else>
                    <label for="">Image  </label> <br>
               <croppa v-model="myCroppa"
        :width="crop.width"
        :height="crop.height"
        :initial-image="cropimage"
        placeholder="Choose an image"
        :placeholder-font-size="0"
        :disabled="false"
        :quality="crop.scale"
        :prevent-white-space="true"
>
</croppa >
                  </div>
                    <div class="form-group">
                        <label> Description </label>
                   <editor name="description"  :init="editor" :value="modalInfo.data.description"></editor>
                  </div>
                  <div class="form-group">
                    <label for="">Link </label>
                    <input type="text" name="sub_title" :value="modalInfo.data.link" class="form-control" placeholder="" >
                  </div>
        <b-btn class="mt-3 pull-right" variant="primary" type="submit">Update Content</b-btn>
        <b-btn class="mt-3 pull-right" style="margin-right:5px;" variant="default" @click="hideNewsModal">Cancel</b-btn>
      </form>
    </b-modal>

  </div>

</template>

<script>
    export default{
        data(){
            return{
              myCroppa:{},
              crop:{
              height:200,
              width:300,
              scale:1.2,
              },
              slug:'',
              header:'',
              lc:'',
              rc:'',
              welcome:'',
                loading: true,
                table_items: [],
                   modalInfo: {
                  title: '',
                  content: '',
                  data: []
                },
                   editor:{
                  plugins:['table','link','image code'],
                  toolbar:['undo redo | link image |code'],
                   setup: function (editor) {
                editor.on('change', function () {
                    editor.save();
                });

            },
          image_title:true,
          automatic_uploads: true,
          file_picker_types: 'image',
          // and here's our custom image picker
          file_picker_callback: function(cb, value, meta) {
            var input = document.createElement('input');
            input.setAttribute('type', 'file');
            input.setAttribute('accept', 'image/*');
                input.onchange = function() {
              var file = this.files[0];
              var reader = new FileReader();
              reader.onload = function () {
                var id = 'blobid' + (new Date()).getTime();
                var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                var base64 = reader.result.split(',')[1];
                var blobInfo = blobCache.create(id, file, base64);
                blobCache.add(blobInfo);
                cb(blobInfo.blobUri(), { title: file.name });
              };
              reader.readAsDataURL(file);
            };
            input.click();
          }
        },
            }
        },
        created(){
            this.fetchData();
        },
        computed:{
          cropimage(){
            if (this.modalInfo.data.image != null) {
              this.myCroppa.refresh()
              return '../public/images/cms/'+this.modalInfo.data.image
            }
          }
        },
        watch:{
          slug(){
            var self = this;
              if(self.slug == "lc" || self.slug=="rc"){
                self.crop.height = 224;
                self.crop.width = 384;
                self.crop.scale = 2.5;
              }
              else if(self.slug="welcome"){
                self.crop.height = 400;
                self.crop.width = 400;
                self.crop.scale = 2.5;

              }
              else if(self.slug="header"){
                self.crop.height = 400;
                self.crop.width = 400;
                self.crop.scale = 2.5;
              }
          },
            table_items(){
              var self = this;
              let data  = this.table_items;
              var result = self.find(data, { slug: "header" });
              if(result.length > 0 ){
                  self.header =result[0];
              }
              else{
                self.header = '';
              }

              var result = self.find(data, { slug: "lc" });
              if(result.length > 0 ){
                  self.lc = result[0];
              }
              else{
                self.lc = '';
              }

              var result = self.find(data, { slug: "rc" });
              if(result.length > 0 ){
                  self.rc = result[0];
              }
              else{
                self.rc = '';
              }
              var result = self.find(data, { slug: "welcome" });
              if(result.length > 0 ){
                  self.welcome = result[0];
              }
              else{
                self.welcome = '';
              }


            }
        },
        methods:{
           capitalizeString(string) {
            return string.charAt(0).toUpperCase() + string.slice(1);
          },

          info(slug,button) {
             let self = this;
             self.slug = slug;
             var s = self.capitalizeString(slug);
            let url = self.$root.baseUrl + '/api/admin/cms/'+slug;
            axios.get(url).then(function(response) {
                  self.modalInfo.row = response.data.data.id
                  self.modalInfo.title = 'Edit Content'
                  self.modalInfo.data = response.data.data
                  self.modalInfo.content = JSON.stringify(response.data.data, null, 2)
                  self.$root.$emit('bv::show::modal', 'modalInfo', button)
              })
              .catch(function(error) {
                console.log(error)
                self.$toastr.e('Something went wrong please try again.');
              });
          },
            fetchData(){
let vm = this;
        let self = this;
        let url = self.$root.baseUrl + '/api/admin/cms';
        axios.get(url)
          .then(function(response) {
            vm.table_items = response.data.data;
            vm.loading = false;
          })
          .catch(function(error) {
            console.log(error);
            vm.loading = false;
          });
            },
            find(set, properties) {
    return set.filter(function (entry) {
        return Object.keys(properties).every(function (key) {
            return entry[key] === properties[key];
        });
    });
},
          addData() {
        var self = this;
        var form = self.$refs.addNewsForm;
        var formData = new FormData(form);
        let url = self.$root.baseUrl + '/api/admin/cms';
                formData.append('image',this.myCroppa.generateDataUrl())
        axios.post(url, formData).then(function(response) {
              // self.table_items = response.data.data;
              console.log(response.data.data)
              $(form)[0].reset();
              self.hideModal();
              self.$toastr.s("Content has been added.");
          })
          .catch(function(error) {
            if (error.response.status === 422) {
              self.$toastr.e(error.response.data.errors.name);
            }
          });
      },
            resetModal() {
        this.modalInfo.title = 'Edit Content'
        this.modalInfo.content = ''
      },

            editNews: function() {
        var self = this;
        var form = self.$refs.editNewsForm;
        var row_index = form.getAttribute('row');
        var formData = new FormData(form);
        formData.append('image',this.myCroppa.generateDataUrl())
        let url = self.$root.baseUrl + '/api/admin/cms/edit';
        axios.post(url, formData).then(function(response) {
           self.table_items = response.data.data;
              self.hideNewsModal();
              self.$swal({
                // position: 'top-end',
                type: 'success',
                title: 'Content updated successfully.',
                showConfirmButton: true,
                // timer: 1500,
                customClass: 'crm-swal',
                confirmButtonText: 'Thanks',
              })
          })
          .catch(function(error) {});
      },





      deleteNews: function(cms, row, event) {
        var self = this;
        self.$swal({
          // position: 'top-end',
          type: 'info',
          title: 'Are you sure you want to delete this?',
          showConfirmButton: true,
          showCancelButton: true,
          // timer: 1500,
          customClass: 'crm-swal',
          confirmButtonText: 'Yes',
        }).then((result) => {
          if (result.value) {
            let url = self.$root.baseUrl + '/api/admin/cms/';
            axios.delete(url + cms.id).then(function(response) {
                if (response.status === 200) {
                  self.table_items.splice(row, 1);
                  self.$swal({
                    // position: 'top-end',
                    type: 'success',
                    title: 'Deleted',
                    showConfirmButton: true,
                    // timer: 1500,
                    customClass: 'crm-swal',
                    confirmButtonText: 'Ok',
                  }).then((result) => {
                    if (result.value) {}
                  })
                }
              })
              .catch(function(error) {});
          }
        })
      },

      showModal(slug) {
        var self  = this
        self.slug = slug
        self.$refs.slug.value=slug
        self.$refs.myModalRef.show()
      },
      hideModal() {
        this.$refs.myModalRef.hide()
      },
      hideNewsModal() {
        this.$refs.editModal.hide();
      },
        },
    }
</script>
