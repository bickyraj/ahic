<template>
  <div class="animated">
    <b-row>
      <b-col class="col-md-8">
        <b-card class="mb-2 trump-card">
          <div class="card-title">
            <div class="caption">
              <h5><i class="fas fa-key"></i> Testimonials </h5>
            </div>
            <div class="caption card-title-actions">
              <b-button @click="showModal" variant="primary" class="btn btn-sm green pull-right">Add New Testimonial</b-button>
              <select class="col-md-5 pull-right mr-4 form-control" name="" v-model="filterData">
                <option value="3"> All</option>
                <option value="1"> Published</option>
                <option value="0"> Un-Published</option>
              </select>
              <b-modal class="ess-modal" ref="myModalRef" hide-footer title="Add New Testimonial">
                <form @submit.prevent="addNews" ref="addNewsForm" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="">Name </label>
                    <input type="text" name="name" class="form-control" placeholder="">
                    <transition name="fade">
                      <p v-if="error.name" class="text-danger"> {{error.name[0]}}</p>
                    </transition>
                  </div>
                  <div class="form-group">
                    <label> Date </label>
                    <datepicker format="yyyy-MM-dd" name="testimonial_date" bootstrap-styling :initialView="'year'"></datepicker>
                    <transition name="fade">
                      <p v-if="error.testimonial_date" class="text-danger"> {{error.testimonial_date[0]}}</p>
                    </transition>
                  </div>
                  <div class="form-group">
                    <label for="">Image </label>
                    <div>
                      <croppa v-model="myCroppa" :width="200" :height="200" placeholder="click to choose an image" :placeholder-font-size="14" :disabled="false" :quality="1.5" :prevent-white-space="true">
                      </croppa>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Country </label>
                    <select class="form-control" name="country_id">
                      <option value="" selected> Select A Country</option>
                      <option v-for="country in countries" :value="country.id" :key="country.id">{{country.name}}</option>
                    </select>
                    <transition name="fade">
                      <p v-if="error.country_id" class="text-danger"> {{error.country_id[0]}}</p>
                    </transition>
                  </div>
                  <div class="form-group">
                    <label> Description </label>
                    <editor name="description" :init="editor"></editor>
                    <transition name="fade">
                      <p v-if="error.description" class="text-danger"> {{error.description[0]}}</p>
                    </transition>
                  </div>
                  <b-btn class="mt-3 pull-right" variant="primary" type="submit">Create Testimonial</b-btn>
                  <b-btn class="mt-3 pull-right" style="margin-right:5px;" variant="default" @click="hideModal">Cancel</b-btn>
                </form>
              </b-modal>
            </div>
          </div>
          <table class="table trump-table table-hover">
            <thead>
              <tr>
                <th>Name</th>
                <th>Date</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <!-- <draggable v-model="table_items" :element="'tbody'" v-if="table_items.length > 0" v-show="!loading"> -->
            <tbody v-if="filteredData.length > 0" v-show="!loading">
              <tr v-for="(news, index) in filteredData" :key="news.id">
                <td> {{ news.name}} </td>
                <td> {{ news.testimonial_date}} </td>
                <td v-if="news.status == 1">
                  <b-button size="sm" @click="updateStatus(news.id,0)" class="mr-1 btn-danger"> Unpublish </b-button>
                </td>
                <td v-else>
                  <b-button size="sm" @click="updateStatus(news.id,1)" class="mr-1 btn-success"> Publish </b-button>
                </td>
                <td>
                  <b-button size="sm" @click="view = news" class="mr-1 btn-primary">
                    View
                  </b-button>
                  <b-button size="sm" @click.stop="info(news, index, $event.target)" class="mr-1 btn-success">
                    Edit
                  </b-button>
                  <b-button size="sm" @click="deleteNews(news, index, $event.target)" class="mr-1 btn-danger">
                    Delete
                  </b-button>
                </td>
              </tr>
            </tbody>
            <tbody v-else>
              <tr>
                <td colspan="4">
                  <div v-if="!loading"> No Data.</div>
                  <div v-else> loading...</div>
                </td>
              </tr>
            </tbody>
          </table>
          <div class="row">
            <div class="col-md ml-auto mr-auto">
              <nav aria-label="Page navigation" class="ml-auto mr-auto">
                <ul class="pagination">
                  <li class="page-item">
                    <a class="page-link" @click="fetchPaginate(pagination.prev_page_url)" aria-label="Previous">
                      <span aria-hidden="true">&laquo;</span>
                      <span class="sr-only">Previous</span>
                    </a>
                  </li>
                  <li class="page-item"><a class="page-link" href="#">{{pagination.current_page}} </a></li>
                  <li class="page-item">
                    <a class="page-link" @click="fetchPaginate(pagination.next_page_url)" aria-label="Next">
                      <span aria-hidden="true">&raquo;</span>
                      <span class="sr-only">Next</span>
                    </a>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        </b-card>
      </b-col>
      <b-col md="4" v-if="view != null">
        <b-card class="mb-2 trump-card">
          <div class="card-title">
            <div class="caption">
              <h5><i class="fas fa-key"></i> Glance </h5>
            </div>
            <div class="caption card-title-actions">
              <b-button @click="view = null" variant="danger" class="btn btn-sm green pull-right">Close</b-button>
            </div>
          </div>
          <img v-if="view.image" :src="'../public/images/testimonials/'+view.image" class="col-md-12" alt="">
          <div class="col-md-12">
            <h4>{{view.name}}</h4>
            <h6>{{view.country.name}}</h6>
            <p v-html="view.description"></p>
            <b-button v-if="view.status == 1" size="sm" @click="updateStatus(view.id,0)" class="mr-1 btn-danger"> Unpublish </b-button>
            <b-button v-else size="sm" @click="updateStatus(view.id,1)" class="mr-1 btn-success"> Publish </b-button>
          </div>
        </b-card>
      </b-col>
    </b-row>
    <!-- Info modal -->
    <b-modal class="ess-modal" id="modalInfo" ref="editModal" hide-footer @hide="resetModal" :title="modalInfo.title">
      <form @submit.prevent="editNews" :row="modalInfo.row" ref="editNewsForm">
        <input type="hidden" name="id" :value="modalInfo.data.id">
        <div class="form-group">
          <label for="">Name </label>
          <input type="text" name="name" v-model="modalInfo.data.name" class="form-control" placeholder="" required>
        </div>
        <div class="form-group">
          <label> Date </label>
          <datepicker format="yyyy-MM-dd" name="testimonial_date" bootstrap-styling :initialView="'year'" :value="modalInfo.data.testimonial_date"></datepicker>
        </div>
        <div class="form-group" v-if="modalInfo.data.image == null">
          <label for="">Image </label>
          <input type="file" name="image" class="form-control">
        </div>
        <div class="form-group" v-else>
          <label for="">Image </label> <br>
          <div>
            <croppa v-model="myCroppa" :width="200" :initial-image="cropimage" :height="200" placeholder="click to choose an image" :placeholder-font-size="14" :disabled="false" :quality="1.5" :prevent-white-space="true">
            </croppa>
          </div>
        </div>
        <div class="form-group">
          <label>Country </label>
          <select class="form-control" name="country_id" v-model="modalInfo.data.country_id">
            <option value=""> Select A Country</option>
            <option v-for="country in countries" :value="country.id" :key="country.id">{{country.name}}</option>
          </select>
          <transition name="fade">
            <p v-if="error.country_id" class="text-danger"> {{error.country_id[0]}}</p>
          </transition>
        </div>
        <div class="form-group">
          <label> Description </label>
          <editor name="description" :init="editor" v-model="modalInfo.data.description"></editor>
        </div>
        <div class="form-group">
          <label for="">Status </label>
          <select name="status" :value="modalInfo.data.status" id="" class="form-control">
            <option value="0">Unpublish</option>
            <option value="1">Publish</option>
          </select>
        </div>
        <b-btn class="mt-3 pull-right" variant="primary" type="submit">Update</b-btn>
        <b-btn class="mt-3 pull-right" style="margin-right:5px;" variant="default" @click="hideNewsModal">Cancel</b-btn>
      </form>
    </b-modal>
  </div>
</template>
<script>
  export default {
    data() {
      return {
        pagination: [],
        error: '',
        url: '',
        myCroppa: null,
        view: null,
        loading: true,
        table_items: [],
        filterData: 3,
        modalInfo: {
          title: '',
          content: '',
          data: []
        },
        countries: '',
        editor: {
          plugins: ['table', 'link', 'image code'],
          toolbar: ['undo redo | link image |code'],
          setup: function(editor) {
            editor.on('change', function() {
              editor.save();
            });
            editor.on('load', function() {
              console.log('loaded');
              editor.save();
            });
          },
          image_title: true,
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
              reader.onload = function() {
                var id = 'blobid' + (new Date()).getTime();
                var blobCache = tinymce.activeEditor.editorUpload.blobCache;
                var base64 = reader.result.split(',')[1];
                var blobInfo = blobCache.create(id, file, base64);
                blobCache.add(blobInfo);
                cb(blobInfo.blobUri(), {
                  title: file.name
                });
              };
              reader.readAsDataURL(file);
            };
            input.click();
          }
        },
      }
    },
    computed: {
      baseUrl() {
        return this.$root.baseUrl
      },
      cols() {
        if (this.view == null) {
          return 6;
        } else {
          return 6;
        }
      },
      cropimage() {
        if (this.modalInfo.data.image != null) {
          this.myCroppa.refresh()
          return '../public/images/testimonials/' + this.modalInfo.data.image
        }
      },
      filteredData() {
        var fil = this.filterData;
        return this.table_items.filter(i => {
          if (fil == 3) {
            return i;
          } else {
            if (i.status == fil) {
              return i;
            }
          }
        })
      },
    },
    created() {
      this.fetchNews();
      this.fetchCountries();
    },
    methods: {
      fetchPaginate(url) {
        this.url = url
        this.fetchNews()
      },
      makePagination(data) {
        let pagination = {
          current_page: data.meta.current_page,
          last_page: data.meta.last_page,
          next_page_url: data.links.next,
          prev_page_url: data.links.prev,
        }
        this.pagination = pagination;
      },
      updateStatus(id, status) {
        var self = this;
        let url = self.$root.baseUrl + '/api/admin/testimonial/update';
        var formData = {
          id: id,
          status: status
        };
        axios.post(url, formData).then(function(response) {
            self.fetchNews();
            self.hideNewsModal();
            self.$swal({
              // position: 'top-end',
              type: 'success',
              title: 'Status updated successfully.',
              showConfirmButton: true,
              // timer: 1500,
              customClass: 'crm-swal',
              confirmButtonText: 'Thanks',
            })
          })
          .catch(function(error) {});
      },
      fetchCountries() {
        let vm = this;
        let url = vm.$root.baseUrl + '/api/admin/countries';
        axios.get(url)
          .then(function(response) {
            vm.countries = response.data.data;
            vm.loading = false;
          })
          .catch(function(error) {
            console.log(error);
            vm.loading = false;
          });
      },
      fetchNews() {
        let vm = this;
        // let url = vm.$root.baseUrl + '/api/admin/testimonials';
        axios.get(vm.url || vm.$root.baseUrl + '/api/admin/testimonials')
          .then(function(response) {
            vm.makePagination(response.data)
            vm.table_items = response.data.data;
            vm.loading = false;
          })
          .catch(function(error) {
            console.log(error);
            vm.loading = false;
          });
      },
      addNews() {
        var self = this;
        var form = self.$refs.addNewsForm;
        var formData = new FormData(form);
        let url = self.$root.baseUrl + '/api/admin/testimonial';
        formData.append('image', this.myCroppa.generateDataUrl())
        axios.post(url, formData).then(function(response) {
            self.fetchNews();
            $(form)[0].reset();
            self.hideModal();
            self.$toastr.s("A testimonial has been added.");
          })
          .catch(function(error) {
            self.error = '';
            self.error = error.response.data.errors;
            if (error.response.status === 422) {
              self.$toastr.e(error.response.data.errors.name);
            }
          });
      },
      resetModal() {
        this.modalInfo.title = 'Edit Testimonial'
        this.modalInfo.content = ''
      },
      info(menu, index, button) {
        let self = this;
        let url = self.$root.baseUrl + '/api/admin/testimonial/';
        axios.get(url + menu.id).then(function(response) {
            if (response.status === 200 || response.status === 201) {
              self.modalInfo.row = index
              self.modalInfo.title = `Edit Testimonial`
              self.modalInfo.data = response.data.data
              self.modalInfo.content = JSON.stringify(response.data.data, null, 2)
              self.$root.$emit('bv::show::modal', 'modalInfo', button)
            }
          })
          .catch(function(error) {
            self.$toastr.e('Something went wrong please try again.');
          });
      },
      editNews: function() {
        var self = this;
        var form = self.$refs.editNewsForm;
        var row_index = form.getAttribute('row');
        var formData = new FormData(form);
        let url = self.$root.baseUrl + '/api/admin/testimonial/edit';
        formData.append('image', this.myCroppa.generateDataUrl())
        axios.post(url, formData).then(function(response) {
            self.fetchNews();
            self.hideNewsModal();
            self.$swal({
              // position: 'top-end',
              type: 'success',
              title: 'Testimonial updated successfully.',
              showConfirmButton: true,
              // timer: 1500,
              customClass: 'crm-swal',
              confirmButtonText: 'Thanks',
            })
          })
          .catch(function(error) {});
      },
      deleteNews: function(news, row, event) {
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
            let url = self.$root.baseUrl + '/api/admin/testimonial/';
            axios.delete(url + news.id).then(function(response) {
                if (response.status === 200) {
                  self.fetchNews();
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
      showModal() {
        this.$refs.myModalRef.show()
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