<template>
  <div class="animated">
    <b-row>
      <b-col>
        <b-card class="mb-2 trump-card">
          <div class="card-title">
            <div class="caption">
              <h5><i class="fas fa-key"></i> Menus</h5>
            </div>
            <div class="caption card-title-actions">
              <b-button @click="showModal" variant="primary" class="btn btn-sm green pull-right">Add New Menu</b-button>
              <b-modal class="ess-modal" ref="myModalRef" hide-footer title="Add Menu">
                <form @submit.prevent="addMenu" ref="addMenuForm">
                  <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name="name" class="form-control" placeholder="">
                    <transition name="fade">
                      <p v-if="error.name" class="text-danger"> {{error.name[0]}}</p>
                    </transition>
                  </div>
                  <div class="form-group">
                    <label for="">Parent Menu</label>
                    <select name="parent_id" class="form-control">
                      <option value="" selected> Choose Parent Menu </option>
                      <option v-for="menu in table_items" :value="menu.id" :key="menu.id"> {{menu.name}}</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="">Link Page</label>
                    <select name="page_id" class="form-control">
                      <option value="" selected> Choose A Page </option>
                      <option v-for="page in pages" :value="page.id" :key="page.id"> {{page.name}}</option>
                    </select>
                  </div>
                  <b-btn class="mt-3 pull-right" variant="primary" type="submit">Create Menu</b-btn>
                  <b-btn class="mt-3 pull-right" style="margin-right:5px;" variant="default" @click="hideModal">Cancel</b-btn>
                </form>
              </b-modal>
            </div>
          </div>
          <table class="table trump-table table-hover ">
            <thead>
              <tr>
                <th>Name</th>
                <th>Parent Menu</th>
                <th>Linked Page</th>
                <th>Action</th>
              </tr>
            </thead>
            <draggable v-model="table_items" :element="'tbody'" v-if="table_items.length > 0" v-show="!loading" @update="updateMenuOrder">
              <tr v-for="(menu, index) in table_items" :key="menu.id" class="table-drag">
                <td>{{ menu.name}}</td>
                <td v-if="menu.parent_menu">{{ menu.parent_menu.name }}</td>
                <td v-else>--</td>
                <td v-if="menu.parent_page">{{ menu.parent_page.name }}</td>
                <td v-else>--</td>
                <td>
                  <b-button size="sm" @click.stop="info(menu, index, $event.target)" class="mr-1 btn-success">
                    Edit
                  </b-button>
                  <b-button size="sm" @click="deleteMenu(menu, index, $event.target)" class="mr-1 btn-danger">
                    Delete
                  </b-button>
                </td>
              </tr>
            </draggable>
            <tbody v-else>
              <tr>
                <td colspan="4">
                  <div v-if="!loading"> No Data.</div>
                  <div v-else> loading...</div>
                </td>
              </tr>
            </tbody>
          </table>
        </b-card>
      </b-col>
    </b-row>
    <!-- Info modal -->
    <b-modal class="ess-modal" id="modalInfo" ref="editModal" hide-footer @hide="resetModal" :title="modalInfo.title">
      <form @submit.prevent="editMenu" :row="modalInfo.row" ref="editMenuForm">
        <input type="hidden" name="id" :value="modalInfo.data.id">
        <div class="form-group">
          <label for="">Name</label>
          <input type="text" name="name" v-bind:value="modalInfo.data.name" class="form-control" placeholder="" required>
        </div>
        <div class="form-group">
          <label for="">Parent Menu</label>
          <select v-bind:value="modalInfo.data.parent_id" name="parent_id" class="form-control">
            <option value="" selected> Choose Parent Menu </option>
            <option v-for="menu in table_items" :value="menu.id" :key="menu.id" v-if="menu.id != modalInfo.data.id"> {{menu.name}}</option>
          </select>
        </div>
        <label for="">Link Page</label>
        <select v-bind:value="modalInfo.data.page_id" name="page_id" class="form-control">
          <option value="" selected> Choose A Page </option>
          <option v-for="page in pages" :value="page.id" :key="page.id"> {{page.name}}</option>
        </select>
        <b-btn class="mt-3 pull-right" variant="primary" type="submit">Update</b-btn>
        <b-btn class="mt-3 pull-right" style="margin-right:5px;" variant="default" @click="hideMenuModal">Cancel</b-btn>
      </form>
    </b-modal>
  </div>
</template>

<style media="screen">
  .table_drag{
    cursor:move;
    cursor: -webkit-grab; /* Chrome 1-21, Safari 4+ */
 cursor:    -moz-grab; /* Firefox 1.5-26 */
 cursor:         grab; /* W3C standards syntax, should come least */
  }

  .table_drag:active {
    cursor: -webkit-grabbing;
    cursor:    -moz-grabbing;
    cursor:         grabbing;
}
</style>
<script>
  export default {
    data() {
      return {
        error: '',
        menus: [],
        loading: true,
        table_items: [],
        pages: [],
        menu_table_fields: ['name', 'parent_id', 'page_id', 'parent_menu'],
        modalInfo: {
          title: '',
          content: '',
          data: []
        },
      }
    },
    created() {
      this.fetchMenus();
      this.fetchPages();
    },
    computed: {},
    methods: {
      info(menu, index, button) {
        let self = this;
        let url = self.$root.baseUrl + '/api/admin/menu/';
        axios.get(url + menu.id).then(function(response) {
            if (response.status === 200 || response.status === 201) {
              self.modalInfo.row = index
              self.modalInfo.title = `Edit Menu`
              self.modalInfo.data = response.data.data
              self.modalInfo.content = JSON.stringify(response.data.data, null, 2)
              self.$root.$emit('bv::show::modal', 'modalInfo', button)
            }
          })
          .catch(function(error) {
            self.$toastr.e('Something went wrong please try again.');
          });
      },
      resetModal() {
        this.modalInfo.title = 'Edit Menu'
        this.modalInfo.content = ''
      },
      editMenu: function() {
        var self = this;
        var form = self.$refs.editMenuForm;
        var row_index = form.getAttribute('row');
        var formData = new FormData(form);
        let url = self.$root.baseUrl + '/api/admin/edit-menu';
        axios.post(url, formData).then(function(response) {
            if (response.status === 200) {
              var menu_items = response.data.data;
              self.table_items = menu_items.map(obj => {
                var rObj = {};
                rObj['id'] = obj.id;
                rObj['name'] = obj.name;
                rObj['page_id'] = obj.page_id;
                rObj['parent_id'] = obj.parent_id;
                rObj['parent_menu'] = obj.parent_menu;
                rObj['parent_page'] = obj.parent_page;
                return rObj;
              });
              self.hideMenuModal();
              self.$swal({
                // position: 'top-end',
                type: 'success',
                title: 'Menu updated successfully.',
                showConfirmButton: true,
                // timer: 1500,
                customClass: 'crm-swal',
                confirmButtonText: 'Thanks',
              })
            }
          })
          .catch(function(error) {});
      },
      deleteMenu: function(menu, row, event) {
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
            let url = self.$root.baseUrl + '/api/admin/menu/';
            axios.delete(url + menu.id).then(function(response) {
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
      addMenu: function() {
        var self = this;
        var form = self.$refs.addMenuForm;
        var formData = new FormData(form);
        let url = self.$root.baseUrl + '/api/admin/menu';
        axios.post(url, formData).then(function(response) {
            if ((response.status === 201) || (response.status === 200)) {
              var menu_items = response.data.data;
              self.table_items = menu_items.map(obj => {
                var rObj = {};
                rObj['id'] = obj.id;
                rObj['name'] = obj.name;
                rObj['page_id'] = obj.page_id;
                rObj['parent_id'] = obj.parent_id;
                rObj['parent_menu'] = obj.parent_menu;
                rObj['parent_page'] = obj.parent_page;
                return rObj;
              });
              $(form)[0].reset();
              self.hideModal();
              self.$toastr.s("A menu has been added.");
            }
          })
          .catch(function(error) {
            self.error = '';
            self.error = error.response.data.errors;
            if (error.response.status === 422) {
              self.$toastr.e(error.response.data.errors.name);
            }
          });
      },
      fetchPages() {
        let vm = this;
        let self = this;
        let url = self.$root.baseUrl + '/api/admin/pages';
        axios.get(url).then(function(response) {
          vm.pages = response.data.data;
        })
      },
      fetchMenus() {
        let vm = this;
        let self = this;
        let url = self.$root.baseUrl + '/api/admin/menus';
        axios.get(url)
          .then(function(response) {
            var menu_items = response.data.data;
            vm.table_items = menu_items.map(obj => {
              var rObj = {};
              rObj['id'] = obj.id;
              rObj['name'] = obj.name;
              rObj['page_id'] = obj.page_id;
              rObj['parent_id'] = obj.parent_id;
              rObj['parent_menu'] = obj.parent_menu;
              rObj['parent_page'] = obj.parent_page;
              return rObj;
            });
            vm.loading = false;
          })
          .catch(function(error) {
            console.log(error);
            vm.loading = false;
          });
      },
      updateMenuOrder() {
        var self = this;
        let url = self.$root.baseUrl + '/api/admin/menus/update-order';
        axios.post(url, self.table_items)
          .then(function(response) {
            if (response.data.status === 1) {
              self.$toastr.s("Updated");
            }
          })
      },
      showModal() {
        this.$refs.myModalRef.show()
      },
      hideModal() {
        this.$refs.myModalRef.hide()
      },
      hideMenuModal() {
        this.$refs.editModal.hide();
      },
    },
  }
</script>
