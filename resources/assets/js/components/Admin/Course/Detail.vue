<style lang="" scoped>
  .no-m-p {
  padding: 0px !important;
  margin: 0px !important;
}

.caption {
  width: 100%;
}


</style>
<template>
  <div class="animated">
    <b-row>
      <div v-if="loading" class="col-md-12">
        <h6> loading...</h6>
      </div>
      <div v-else>
        <div class="col-md-12">
          <b-card class="trump-card ">
            <div class="card-title">
              <div class="caption">
                <h5><i class="fas fa-key"></i> {{course.name}} <small class="float-right"> <button class="btn btn-success" @click="showEditCourseModal"> Edit</button> </small></h5>
              </div>
            </div>
            <div>
              <h5> Course Description </h5>
              <img v-if="course.background_image" :src="$root.baseUrl+'/public/images/courses/'+course.background_image" class="img-fluid col-md-6" />
              <h5>
                <small v-if="course.category">
                  Category : {{course.category.name}}
                </small>
              </h5>
              <p class="pt-3" v-html="course.description"></p>
            </div>
            <hr>
            <div class="row">
              <div class="col-md-12 text-center">
                <div class="col-md-4 float-left">
                  <h5> Fees </h5>
                  <p> Onshore Fee : {{course.onshore_fee}} </p>
                  <p> Offshore Fee : {{course.offshore_fee}} </p>
                </div>
                <div class="col-md-4 float-left">
                  <h5> Duration </h5>
                  <p> {{course.duration}} </p>
                </div>
                <div class="col-md-4 float-left">
                  <h5> Study Method </h5>
                  <p> {{course.study_method}} </p>
                </div>
              </div>
            </div>
            <hr>
            <div class="col-md-12">
              <h5> Video Link </h5>
              <p> <a :href="course.video_link"> {{course.video_link}}</a> </p>
            </div>
            <hr>
            <div class="col-md-12">
            </div>
          </b-card>
          <b-card class="trump-card ">
            <div class="card-title">
              <div class="caption">
                <h5 > <i class="fas fa-key"></i>  Unit Of Competence
                    <small class="float-right">
                      <button class="btn btn-success" @click="showCompetenceModal"> Add </button>

                    </small>
                    </h5>
              </div>
            </div>
            <div class="col-md-12" v-for="category in ucategories" :key="category.id">
              <h5> {{category.name}} </h5>
              <ul class="">
                <li v-for="c in competences" :key="c.id" v-if="c.course_unit_category_id == category.id">
                   {{c.competence.description}}
                    <i class="fas fa-times-circle text-danger float-right " @click="remove($event,c.id)" type="course_unit_relation"></i>
                    <span class="ml-5 float-right mr-5">  {{c.competence.unit_code}} </span>
                  </li>
              </ul>
            </div>
          </b-card>
        </div>
        <div class="col-md-12">
          <b-card class="trump-card ">
            <div class="">
              <div class="card-title">
                <div class="caption">
                  <h5 ><i class="fas fa-key"></i>  Course Entry Requirements <small class="float-right"> <button class="btn btn-success" @click="showReqModal"> Add </button> <button class="btn" v-b-toggle.collapse1> <i class="far fa-eye" ></i></button></small></h5>
                </div>
              </div>
              <b-collapse visible id="collapse1">
                <div class="col-md-12">
                  <ul class="no-m-p">
                    <li v-for="require in course.requirements" :key="require.id">
                       {{require.description}}
                      <i class="fas fa-times-circle text-danger float-right " @click="remove($event,require.id)" type="course_entry_requirement"></i>
                     </li>
                  </ul>
                </div>
              </b-collapse>
            </div>
          </b-card>
          <b-card class="trump-card ">
            <div>
              <div class="card-title">
                <div class="caption">
                  <h5><i class="fas fa-key"></i> Career Outcomes
                    <small class="float-right">
                      <button class="btn btn-success" @click="showCareerModal"> Add </button>
                        <button class="btn" v-b-toggle.collapse2>
                        <i class="far fa-eye" ></i>
                             </button>
                    </small>
                  </h5>
                </div>
              </div>
              <div class="col-md-12">
                <b-collapse visible id="collapse2">
                  <div class="col-md-12">
                    <ul class="no-m-p">
                      <li v-for="outcome in course.outcomes" :key="outcome.id">
                        {{outcome.description}}
                        <i class="fas fa-times-circle text-danger float-right " @click="remove($event,outcome.id)" type="career_outcome"></i>
                      </li>
                    </ul>
                  </div>
                </b-collapse>
              </div>
            </div>
          </b-card>
          <b-card class="trump-card ">
            <div>
              <div class="card-title">
                <div class="caption">
                  <h5> <i class="fas fa-key"></i>  Course Assessments
                    <small class="float-right">
                      <button class="btn btn-primary" v-if="course.assessment" @click="showEditAssessmentModal"> Edit </button>
                      <button class="btn btn-success" v-else @click="showAssessmentModal"> Add </button>
                        <button class="btn " v-b-toggle.collapse3>
                          <i class="far fa-eye" ></i>
                        </button>
                    </small>
                  </h5>
                </div>
              </div>
              <b-collapse visible id="collapse3">
                <div class="col-md-12" v-if="course.assessment" v-html="course.assessment.description"></div>
              </b-collapse>
            </div>
          </b-card>

          <b-card class="trump-card ">
            <div >
              <div class="card-title">
                <div class="caption">
                  <h5> <i class="fas fa-key"></i>  Course RPL
                        <small class="float-right">
                          <button class="btn btn-primary" v-if="course.rpl" @click="showEditRplModal"> Edit </button>
                          <button class="btn btn-success" v-else @click="showRPLModal"> Add </button>
                            <button class="btn " v-b-toggle.collapse4>
                          <i class="far fa-eye" ></i>
                               </button>

                        </small></h5>
                </div>
              </div>
              <b-collapse visible id="collapse4">
                <div class="col-md-12" v-if="course.rpl" v-html="course.rpl.description"> </div>
              </b-collapse>
            </div>
          </b-card>
          <b-card class="trump-card ">
            <div>
              <div class="card-title">
                <div class="caption">
                  <h5> <i class="fas fa-key"></i>  Country Course Fees
                    <small class="float-right">
                      <button class="btn btn-success"  @click="showCCFModal"> Add </button>
                        <button class="btn " v-b-toggle.collapse9>
                          <i class="far fa-eye" ></i>
                        </button>
                    </small>
                  </h5>
                </div>
              </div>
              <b-collapse visible id="collapse9">
                <div class="col-md-12" v-if="ccf">
                  <table class="table trump-table">
                    <tr>
                      <th> Country </th>
                      <th> Price </th>
                      <th> Action </th>
                    </tr>

                    <tr v-for="c in ccf">
                      <td>{{c.country.name}}</td>
                      <td>{{c.fee}}</td>
                      <td>
                        <b-button size="sm" @click.stop="showCCF(c.id)" class="mr-1 btn-success">
                          Edit
                        </b-button>
                        <b-button size="sm" @click="deleteCCF(c.id)" class="mr-1 btn-danger">
                          Delete
                        </b-button></td>
                    </tr>
                  </table>
                </div>
              </b-collapse>
            </div>
          </b-card>

        </div>
      </div>
    </b-row>

    <b-modal class="ess-modal" ref="addccfModal" hide-footer title="Add Country Course Fee">
      <form @submit.prevent="addCCF" ref="addCCFForm">
        <div class="form-group">
          <label for=""> Country </label>
          <select class="form-control" name="country_id">
              <option value=""> SELECT A COUNTRY</option>
              <template v-for="country in countries" >
                <option v-if="country.name != 'Australia'" :value="country.id"> {{country.name}} </option>
              </template>
          </select>
        </div>
          <input type="hidden" name="course_id" class="form-control" :value="$route.params.id">
        <div class="form-group">
          <label for=""> Fee </label>
          <input type="text" name="fee" class="form-control">
        </div>

        <b-btn class="mt-3 pull-right" variant="primary" type="submit">Add Country Course Fee</b-btn>
        <b-btn class="mt-3 pull-right" style="margin-right:5px;" variant="default" @click="hideCCFModal">Cancel</b-btn>
      </form>
    </b-modal>

    <b-modal class="ess-modal" ref="editccfModal" hide-footer title="Edit Country Course Fee">
      <form @submit.prevent="editCCF" ref="editCCFForm">
        <input type="hidden" name="id" :value="editccf.id">
        <div class="form-group">
          <label for=""> Country </label>
          <select class="form-control" name="country_id" v-model="editccf.country_id">
              <option value=""> SELECT A COUNTRY</option>
              <option  v-for="country in countries" :value="country.id"> {{country.name}} </option>
          </select>
        </div>
          <input type="hidden" name="course_id" class="form-control" :value="$route.params.id">
        <div class="form-group">
          <label for=""> Fee </label>
          <input type="text" name="fee" class="form-control" :value="editccf.fee">
        </div>

        <b-btn class="mt-3 pull-right" variant="primary" type="submit">Edit Country Course Fee</b-btn>
        <b-btn class="mt-3 pull-right" style="margin-right:5px;" variant="default" @click="hideEditCCFModal">Cancel</b-btn>
      </form>
    </b-modal>

    <b-modal class="ess-modal" ref="courseModal" hide-footer title="Edit Course">
      <form @submit.prevent="editCourse" ref="editCourseForm">
        <input type="hidden" name="id" :value="course.id">
        <div class="form-group">
          <label for="">Name </label>
          <input type="text" name="name" class="form-control" v-model="course.name" placeholder="" required>
        </div>
        <div class="form-group">
          <label for="">Course code </label>
          <input type="text" name="code" class="form-control" v-model="course.code" placeholder="" required>
        </div>
        <div class="form-group">
          <label for=""> Course Category</label>
          <select name="course_category_id" class="form-control" v-model="course.course_category_id">
            <option value="">Select A Category</option>
            <option v-for="category in categories" :value="category.id" :key="category.id">{{category.name}}</option>
          </select>
        </div>
        <div class="form-group" v-if="course.background_image == null">
          <label for="">Image </label>
          <croppa v-model="myCroppa" :width="360" :height="220" placeholder="Choose an image" :placeholder-font-size="0" :disabled="false" :quality="5" :show-remove-button="true" :prevent-white-space="true"></croppa>
        </div>
        <div class="form-group" v-else>
          <label for="">Image </label> <br>
          <croppa v-model="myCroppa" :initial-image="img" :width="360" :height="220" placeholder="Choose an image" :placeholder-font-size="0" :disabled="false" :quality="5" :show-remove-button="true" :prevent-white-space="true"></croppa>
        </div>
        <div class="form-group">
          <label for="">Video Link </label>
          <input type="text" name="video_link" class="form-control" v-model="course.video_link" placeholder="" required>
        </div>
        <div class="form-group">
          <label for="">Duration </label>
          <input type="text" name="duration" class="form-control" v-model="course.duration" placeholder="" required>
        </div>
        <div class="form-group">
          <label for="">Study Method </label>
          <input type="text" name="study_method" class="form-control" v-model="course.study_method" placeholder="" required>
        </div>
        <div class="form-group">
          <label for="">Onshore Fee </label>
          <input type="text" name="onshore_fee" class="form-control" v-model="course.onshore_fee" placeholder="" required>
        </div>
        <div class="form-group">
          <label for="">Offshore Fee </label>
          <input type="text" name="offshore_fee" class="form-control" v-model="course.offshore_fee" placeholder="" required>
        </div>
        <div class="form-group">
          <label for="">Description</label>
          <editor name="description" v-model="course.description" :init="editor"></editor>
        </div>

        <div class="form-group">
          <label for="">Status</label>
          <select name="status" id="" v-model="course.status" class="form-control">
            <option value="0"> Disable</option>
            <option value="1"> Enable</option>
          </select>
        </div>
        <b-btn class="mt-3 pull-right" variant="primary" type="submit">Edit Course</b-btn>
        <b-btn class="mt-3 pull-right" style="margin-right:5px;" variant="default" @click="hideEditCourseModal">Cancel</b-btn>
      </form>
    </b-modal>
    <b-modal class="ess-modal" ref="careerModal" hide-footer title="Add Career Opportunity">
      <form @submit.prevent="addCareer" ref="addCareerForm">
        <input type="hidden" name="course_id" :value="course.id">
        <div class="form-group">
          <label for=""> Career Outcome</label>
          <input type="text" name="description" class="form-control">
        </div>
        <b-btn class="mt-3 pull-right" variant="primary" type="submit">Save Opportunity</b-btn>
        <b-btn class="mt-3 pull-right" style="margin-right:5px;" variant="default" @click="hideCareerModal">Cancel</b-btn>
      </form>
    </b-modal>
    <b-modal class="ess-modal" ref="reqModal" hide-footer title="Add Entry Requirement">
      <form @submit.prevent="addRequirement" ref="addReqForm">
        <input type="hidden" name="course_id" :value="course.id">
        <div class="form-group">
          <label for=""> Entry Requirement</label>
          <input type="text" name="description" class="form-control">
        </div>
        <div class="form-group">
          <label for=""> Order</label>
          <input type="text" name="order" class="form-control">
        </div>
        <b-btn class="mt-3 pull-right" variant="primary" type="submit">Add Requirement</b-btn>
        <b-btn class="mt-3 pull-right" style="margin-right:5px;" variant="default" @click="hideReqModal">Cancel</b-btn>
      </form>
    </b-modal>
    <b-modal class="ess-modal" ref="assessmentModal" hide-footer title="Add Assessment Method">
      <form @submit.prevent="addAssessment" ref="addAssessmentForm">
        <input type="hidden" name="course_id" :value="course.id">
        <div class="form-group">
          <label for=""> Assessment Method </label>
          <editor name="description" :init="editor"></editor>
        </div>
        <b-btn class="mt-3 pull-right" variant="primary" type="submit">Add Assessment Method</b-btn>
        <b-btn class="mt-3 pull-right" style="margin-right:5px;" variant="default" @click="hideAssessmentModal">Cancel</b-btn>
      </form>
    </b-modal>
    <b-modal class="ess-modal" ref="rplModal" hide-footer title="Add Recognition Of Prior Learning">
      <form @submit.prevent="addRPL" ref="addRplForm">
        <input type="hidden" name="course_id" :value="course.id">
        <div class="form-group">
          <label for=""> Recognition Of Prior Learning</label>
          <editor name="description" :init="editor"></editor>
        </div>
        <b-btn class="mt-3 pull-right" variant="primary" type="submit">Add RPL</b-btn>
        <b-btn class="mt-3 pull-right" style="margin-right:5px;" variant="default" @click="hideRPLModal">Cancel</b-btn>
      </form>
    </b-modal>
    <b-modal class="ess-modal" ref="editAssessmentModal" hide-footer title="Edit Assessment Method" v-if="course.assessment">
      <form @submit.prevent="editAssessment" ref="editAssessmentForm">
        <input type="hidden" name="course_id" :value="course.id">
        <div class="form-group">
          <label for=""> Assessment Method </label>
          <editor name="description" v-model="course.assessment.description" :init="editor"></editor>
        </div>
        <b-btn class="mt-3 pull-right" variant="primary" type="submit">Edit Assessment Method</b-btn>
        <b-btn class="mt-3 pull-right" style="margin-right:5px;" variant="default" @click="hideEditAssessmentModal">Cancel</b-btn>
      </form>
    </b-modal>
    <b-modal class="ess-modal" ref="editRplModal" hide-footer title="Edit RPL" v-if="course.rpl">
      <form @submit.prevent="editRPL" ref="editRplForm">
        <input type="hidden" name="course_id" :value="course.id">
        <div class="form-group">
          <label for=""> Recognition Of Prior Learning</label>
          <editor name="description" v-model="course.rpl.description" :init="editor"></editor>
        </div>
        <b-btn class="mt-3 pull-right" variant="primary" type="submit">Edit RPL</b-btn>
        <b-btn class="mt-3 pull-right" style="margin-right:5px;" variant="default" @click="hideEditRplModal">Cancel</b-btn>
      </form>
    </b-modal>
    <b-modal class="ess-modal" ref="competenceModal" hide-footer title="Add Unit Of Competence">
      <form @submit.prevent="addCompetence" ref="addCompetenceForm">
        <input type="hidden" name="course_id" :value="course.id">
        <div class="form-group">
          <label for=""> Category</label>
          <select name="course_unit_category_id" id="" class="form-control">
            <option v-for="c in ucategories" :value="c.id" :key="c.id"> {{c.name}} </option>
          </select>
        </div>
        <div class="form-group">
          <label for=""> Competence</label>
          <select name="course_unit_competence_id" id="" class="form-control">
            <option v-for="c in acompetences" :value="c.id" :key="c.id"> {{c.unit_code}} </option>
          </select>
        </div>
        <b-btn class="mt-3 pull-right" variant="primary" type="submit">Add Competence</b-btn>
        <b-btn class="mt-3 pull-right" style="margin-right:5px;" variant="default" @click="hideCompetenceModal">Cancel</b-btn>
      </form>
    </b-modal>
  </div>
</template>
<script>
  export default {
    data() {
      return {
        myCroppa:{},
        ucategories: '',
        categories: '',
        acompetences: '',
        competences: '',
        countries:'',
        ccf:'',
        editccf:'',
        course: {},
        requirements: '',
        outcomes: '',
        loading: true,
        editor: {
          plugins: ['table', 'link', 'image code'],
          toolbar: ['undo redo | link image |code'],
          setup: function(editor) {
            editor.on('change', function() {
              editor.save();
            });
          },
          image_title: true,
        }
      }
    },
    created() {
      this.fetchCourse();
      this.fetchCategories();
      this.fetchAllCompetences();
      this.fetchUCategories();
      this.fetchCompetences();
      this.fetchCountries();
      this.fetchCCF();

    },
    computed: {
      img() {
        if (this.course.background_image != null) {
          this.myCroppa.refresh()
          return this.$root.baseUrl+'/public/images/courses/' + this.course.background_image
        }
      }
    },
    methods: {
      fetchCCF(){
        let vm = this;
        let self = this;
        let id = parseInt(this.$route.params.id);
        let url = self.$root.baseUrl + '/api/admin/ccf/';
        axios.get(url + id).then(function(response) {
            vm.ccf = response.data.data;
            vm.loading = false;
          })
          .catch(function(error) {
            console.log(error);
            vm.loading = false;
          });
      },
      addCCF(){
        var self = this;
        var form = self.$refs.addCCFForm;
        var formData = new FormData(form);
        let url = self.$root.baseUrl + '/api/admin/ccf';
        axios.post(url, formData).then(function(response) {
            self.fetchCCF();
            $(form)[0].reset();
            self.hideCCFModal();
            self.$toastr.s("A country course fee has been added.");
          })
          .catch(function(error) {
            if (error.response.status === 422) {
              self.$toastr.e(error.response.data.errors.name);
            }
          });
      },
      showCCF(id){
        var self = this;
          let url = self.$root.baseUrl + '/api/admin/ccf/get/'+id;
        axios.get(url).then(function(response) {
          self.editccf= response.data.data
            self.showEditCCFModal();
          })
          .catch(function(error) {
            if (error.response.status === 422) {
              self.$toastr.e(error.response.data.errors.name);
            }
          });
      },
      editCCF(){
        var self = this;
        var form = self.$refs.editCCFForm;
        var formData = new FormData(form);
        let url = self.$root.baseUrl + '/api/admin/ccf/update';
        axios.post(url, formData).then(function(response) {
          self.fetchCCF();
            $(form)[0].reset();
            self.hideEditCCFModal();
            self.$toastr.s("A country course fee has been edited.");
          })
          .catch(function(error) {
            if (error.response.status === 422) {
              self.$toastr.e(error.response.data.errors.name);
            }
          });
      },
      deleteCCF(id){
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
            let url = self.$root.baseUrl + '/api/admin/ccf/';
            axios.delete(url +id).then(function(response) {
                if (response.status === 200) {
                  self.fetchCCF();
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
      remove(event, id) {
        console.log(id);
        let type = event.currentTarget.attributes['type'].value;
        let vm = this;
        let self = this;
        let url = self.$root.baseUrl + '/api/admin/' + type + '/';
        axios.delete(url + id).then(function(response) {
            if (type == 'course_unit_relation') {
              self.$toastr.s("A course unit relation has been removed.");
            }
            vm.fetchCourse();
            vm.fetchCategories();
            vm.fetchAllCompetences();
            vm.fetchUCategories();
            vm.fetchCompetences();
            this.fetchCountries();

          })
          .catch(function(error) {
            console.log(error);
            vm.loading = false;
          });
      },
      fetchCompetences() {
        let vm = this;
        let self = this;
        let id = parseInt(this.$route.params.id);
        let url = self.$root.baseUrl + '/api/admin/course_unit_relations/';
        axios.get(url + id).then(function(response) {
            vm.competences = response.data.data;
            vm.loading = false;
          })
          .catch(function(error) {
            console.log(error);
            vm.loading = false;
          });
      },
      fetchAllCompetences() {
        let vm = this;
        let self = this;
        let url = self.$root.baseUrl + '/api/admin/course_unit_competences/';
        axios.get(url).then(function(response) {
            vm.acompetences = response.data.data;
            vm.loading = false;
          })
          .catch(function(error) {
            console.log(error);
            vm.loading = false;
          });
      },
      fetchCategories() {
        let vm = this;
        let self = this;
        let url = self.$root.baseUrl + '/api/admin/course_categories';
        axios.get(url)
          .then(function(response) {
            vm.categories = response.data.data;
            vm.loading = false;
          })
          .catch(function(error) {
            console.log(error);
            vm.loading = false;
          });
      },
      fetchUCategories() {
        let vm = this;
        let self = this;
        let url = self.$root.baseUrl + '/api/admin/course_unit_categories';
        axios.get(url)
          .then(function(response) {
            vm.ucategories = response.data.data;
            vm.loading = false;
          })
          .catch(function(error) {
            console.log(error);
            vm.loading = false;
          });
      },
      fetchCourse() {
        var self = this;
        let id = parseInt(this.$route.params.id);
        let url = self.$root.baseUrl + '/api/admin/courses/';
        axios.get(url + id).then(function(response) {
            if (response.data == 'error') {
              self.$router.push('../courses');
            }
            self.course = response.data.data;
            self.loading = false;
          })
          .catch(function(error) {
            self.$toastr.e('Something went wrong please try again.');
          });
      },
      editCourse() {
        var self = this;
        var form = self.$refs.editCourseForm;
        var formData = new FormData(form);
        let url = self.$root.baseUrl + '/api/admin/course/update';
        formData.append('image', this.myCroppa.generateDataUrl())
        axios.post(url, formData).then(function(response) {
            self.fetchCourse();
            $(form)[0].reset();
            self.hideEditCourseModal();
            self.$toastr.s("A course has been edited.");
          })
          .catch(function(error) {
            if (error.response.status === 422) {
              self.$toastr.e(error.response.data.errors.name);
            }
          });
      },
      addCareer() {
        var self = this;
        var form = self.$refs.addCareerForm;
        var formData = new FormData(form);
        let url = self.$root.baseUrl + '/api/admin/career_outcome';
        axios.post(url, formData).then(function(response) {
            self.fetchCourse();
            $(form)[0].reset();
            self.hideCareerModal();
            self.$toastr.s("A course outcome has been added.");
          })
          .catch(function(error) {
            if (error.response.status === 422) {
              self.$toastr.e(error.response.data.errors.name);
            }
          });
      },
      addRequirement() {
        var self = this;
        var form = self.$refs.addReqForm;
        var formData = new FormData(form);
        let url = self.$root.baseUrl + '/api/admin/course_entry_requirement';
        axios.post(url, formData).then(function(response) {
            self.fetchCourse();
            $(form)[0].reset();
            self.hideReqModal();
            self.$toastr.s("A entry requirement has been added.");
          })
          .catch(function(error) {
            if (error.response.status === 422) {
              self.$toastr.e(error.response.data.errors.name);
            }
          });
      },
      addAssessment() {
        var self = this;
        var form = self.$refs.addAssessmentForm;
        var formData = new FormData(form);
        let url = self.$root.baseUrl + '/api/admin/course_assessment';
        axios.post(url, formData).then(function(response) {
            self.fetchCourse();
            $(form)[0].reset();
            self.hideAssessmentModal();
            self.$toastr.s("A course assessment has been added.");
          })
          .catch(function(error) {
            if (error.response.status === 422) {
              self.$toastr.e(error.response.data.errors.name);
            }
          });
      },
      addCompetence() {
        var self = this;
        var form = self.$refs.addCompetenceForm;
        var formData = new FormData(form);
        let url = self.$root.baseUrl + '/api/admin/course_unit_relation';
        axios.post(url, formData).then(function(response) {
            self.fetchCompetences();
            $(form)[0].reset();
            self.hideCompetenceModal();
            self.$toastr.s("A course unit competence has been added.");
          })
          .catch(function(error) {
            if (error.response.status === 422) {
              self.$toastr.e(error.response.data.errors.name);
            }
          });
      },
      addRPL() {
        var self = this;
        var form = self.$refs.addRplForm;
        console.log(form);
        var formData = new FormData(form);
        let url = self.$root.baseUrl + '/api/admin/course_rpl';
        axios.post(url, formData).then(function(response) {
            self.fetchCourse();
            $(form)[0].reset();
            self.hideRPLModal();
            self.$toastr.s("A course RPL has been added.");
          })
          .catch(function(error) {
            if (error.response.status === 422) {
              self.$toastr.e(error.response.data.errors.name);
            }
          });
      },
      editAssessment() {
        var self = this;
        var form = self.$refs.editAssessmentForm;
        console.log(form);
        var formData = new FormData(form);
        let url = self.$root.baseUrl + '/api/admin/course_assessment/update';
        axios.post(url, formData).then(function(response) {
            self.fetchCourse();
            $(form)[0].reset();
            self.hideEditAssessmentModal();
            self.$toastr.s("A course assessment has been edited.");
          })
          .catch(function(error) {
            if (error.response.status === 422) {
              self.$toastr.e(error.response.data.errors.name);
            }
          });
      },
      editRPL() {
        var self = this;
        var form = self.$refs.editRplForm;
        console.log(form);
        var formData = new FormData(form);
        let url = self.$root.baseUrl + '/api/admin/course_rpl/update';
        axios.post(url, formData).then(function(response) {
            self.fetchCourse();
            $(form)[0].reset();
            self.hideEditRplModal();
            self.$toastr.s("A course rpl has been edited.");
          })
          .catch(function(error) {
            if (error.response.status === 422) {
              self.$toastr.e(error.response.data.errors.name);
            }
          });
      },
      fetchCountries(){
        var self = this;
        let url = self.$root.baseUrl + '/api/admin/countries';
        axios.get(url).then(function(response) {
          self.countries = response.data.data;
          })
          .catch(function(error) {
            if (error.response.status === 422) {
              console.log(error);
            }
          });
      },
      showEditCourseModal() {
        this.$refs.courseModal.show()
      },
      hideEditCourseModal() {
        this.$refs.courseModal.hide()
      },
      showCareerModal() {
        this.$refs.careerModal.show()
      },
      hideCareerModal() {
        this.$refs.careerModal.hide()
      },
      showReqModal() {
        this.$refs.reqModal.show()
      },
      hideReqModal() {
        this.$refs.reqModal.hide()
      },
      showAssessmentModal() {
        this.$refs.assessmentModal.show()
      },
      hideAssessmentModal() {
        this.$refs.assessmentModal.hide()
      },
      showEditAssessmentModal() {
        this.$refs.editAssessmentModal.show()
      },
      hideEditAssessmentModal() {
        this.$refs.editAssessmentModal.hide()
      },
      showEditRplModal() {
        this.$refs.editRplModal.show()
      },
      hideEditRplModal() {
        this.$refs.editRplModal.hide()
      },
      showCompetenceModal() {
        this.$refs.competenceModal.show()
      },
      hideCompetenceModal() {
        this.$refs.competenceModal.hide()
      },
      showRPLModal() {
        this.$refs.rplModal.show()
      },
      showCCFModal() {
        this.$refs.addccfModal.show()
      },
      hideCCFModal() {
        this.$refs.addccfModal.hide()
      },
      showEditCCFModal() {
        this.$refs.editccfModal.show()
      },
      hideEditCCFModal() {
        this.$refs.editccfModal.hide()
      },
      hideRPLModal() {
        this.$refs.rplModal.hide()
      },
      hideMenuModal() {
        this.$refs.editModal.hide();
      },
    },
  }
</script>
