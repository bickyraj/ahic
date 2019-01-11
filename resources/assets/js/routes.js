let url = window.laravel.vueBaseUrl
let admin_url = url + 'admin/'
// let url = '/'
// let admin_url = '/admin/'
const routes = [
    {
        path: url + '404',
        name: '404',
        component: require('./components/Error/404'),
        abstract: true,
        meta: {
            layout: 'error'
        }
    },
    {
        path: url,
        name: 'home',
        component: require('./components/FrontEnd/Index'),
        abstract: true,
        meta: {
            layout: 'front'
        }
    },
    {
        path: "*",
        component: require('./components/Error/404'),
        meta: {
            layout: 'error'
        }
    },
        {
            path: admin_url + 'date_of_intakes',
            component: require('./components/Admin/DateOfIntakes/Index'),
            meta: {
                layout: 'admin',
                breadcrumb: [{
                        name: 'Home',
                        path: admin_url,
                    },
                    {
                        name: 'Date OF Intakes',
                        path: admin_url + 'date_of_intakes',
                    }
                ],
                middlewareAuth: true,
                roleId: 1
            },
        },
    {
        path: url + 'login',
        component: require('./components/Authentication/Login'),
        name: 'login',
        meta: {
            layout: 'login',
            middlewareAuth: false
        },
        beforeEnter(to, from, next) {
            if (auth.check()) {
                if (auth.roleId === 1) {
                    next({name: 'admin'});
                }
            } else {
                next();
            }
        },
    },
    {
    	path: admin_url,
    	component: require('./components/Admin/Index'),
        name: 'admin',
        meta: {
            layout: 'admin',
            breadcrumb: [
                {
                    name: 'Home',
                    path: admin_url
                }
            ],
            middlewareAuth: true,
            roleId: 1
        }
    },
    {
        path: admin_url + 'roles',
        component: require('./components/Admin/Role/Index'),
        meta: {
            layout: 'admin',
            breadcrumb: [
                {
                    name: 'Home',
                    path: admin_url,
                },
                {
                    name: 'Roles',
                    path: admin_url + 'roles',
                }
            ],
            middlewareAuth: true,
            roleId: 1
        },
    },
    {
        path: admin_url + 'menus',
        component: require('./components/Admin/Menu/Index'),
        meta: {
            layout: 'admin',
            breadcrumb: [
                {
                    name: 'Home',
                    path: admin_url,
                },
                {
                    name: 'Menus',
                    path: admin_url + 'menus',
                }
            ],
            middlewareAuth: true,
            roleId: 1
        },
    },
    {
        path: admin_url + 'news',
        component: require('./components/Admin/News/Index'),
        meta: {
            layout: 'admin',
            breadcrumb: [
                {
                    name: 'Home',
                    path: admin_url,
                },
                {
                    name: 'News',
                    path: admin_url + 'news',
                }
            ],
            middlewareAuth: true,
            roleId: 1
        },
    },
    {
        path: admin_url + 'enquiries',
        component: require('./components/Admin/Enquiry/Index'),
        meta: {
            layout: 'admin',
            breadcrumb: [
                {
                    name: 'Home',
                    path: admin_url,
                },
                {
                    name: 'Enquiries',
                    path: admin_url + 'enquiries',
                }
            ],
            middlewareAuth: true,
            roleId: 1
        },
    },
    {
        path: admin_url + 'contact',
        component: require('./components/Admin/Contact/Index'),
        meta: {
            layout: 'admin',
            breadcrumb: [
                {
                    name: 'Home',
                    path: admin_url,
                },
                {
                    name: 'Contact',
                    path: admin_url + 'contact',
                }
            ],
            middlewareAuth: true,
            roleId: 1
        },
    },
    {
        path: admin_url + 'downloads',
        component: require('./components/Admin/Download/Index'),
        meta: {
            layout: 'admin',
            breadcrumb: [
                {
                    name: 'Home',
                    path: admin_url,
                },
                {
                    name: 'Downloads',
                    path: admin_url + 'downloads',
                }
            ],
            middlewareAuth: true,
            roleId: 1
        },
    },
    {
        path: admin_url + 'testimonials',
        component: require('./components/Admin/Testimonial/Index'),
        meta: {
            layout: 'admin',
            breadcrumb: [
                {
                    name: 'Home',
                    path: admin_url,
                },
                {
                    name: 'Testimonials',
                    path: admin_url + 'testimonials',
                }
            ],
            middlewareAuth: true,
            roleId: 1
        },
    },
    {
        path: admin_url + 'Pages',
        component: require('./components/Admin/Page/Index'),
        meta: {
            layout: 'admin',
            breadcrumb: [
                {
                    name: 'Home',
                    path: admin_url,
                },
                {
                    name: 'Pages',
                    path: admin_url + 'pages',
                }
            ],
            middlewareAuth: true,
            roleId: 1
        },
    },
    {
        path: admin_url + 'newsletters',
        component: require('./components/Admin/Newsletter/Index'),
        meta: {
            layout: 'admin',
            breadcrumb: [
                {
                    name: 'Home',
                    path: admin_url,
                },
                {
                    name: 'Newsletter',
                    path: admin_url + 'newsletters',
                }
            ],
            middlewareAuth: true,
            roleId: 1
        },
    },
    {
        path: admin_url + 'messages',
        component: require('./components/Admin/Message/Index'),
        meta: {
            layout: 'admin',
            breadcrumb: [
                {
                    name: 'Home',
                    path: admin_url,
                },
                {
                    name: 'Message',
                    path: admin_url + 'messages',
                }
            ],
            middlewareAuth: true,
            roleId: 1
        },
    },
    {
        path: admin_url + 'page/:id',
        component: require('./components/Admin/Page/Detail'),
        meta: {
            layout: 'admin',
            breadcrumb: [
                {
                    name: 'Home',
                    path: admin_url,
                },
                {
                    name: 'Page',
                    path: admin_url + 'pages',
                },
                {
                    name: 'Detail'
                }
            ],
            middlewareAuth: true,
            roleId: 1
        },
    },
    {
        path: admin_url + 'form',
        component: require('./components/Admin/Form/Index'),
        meta: {
            layout: 'admin',
            breadcrumb: [
                {
                    name: 'Home',
                    path: admin_url,
                },
                {
                    name: 'form',
                    path: admin_url + 'form',
                }
            ],
            middlewareAuth: true,
            roleId: 1
        },
    },
    {
        path: admin_url + 'students',
        component: require('./components/Admin/Form/Home'),
        name:'allStudents',
        meta: {
            layout: 'admin',
            breadcrumb: [
                {
                    name: 'Home',
                    path: admin_url,
                },
                {
                    name: 'Students',
                    path: admin_url + 'students',
                }
            ],
            middlewareAuth: true,
            roleId: 1
        },
    },
    {
        path: admin_url + 'gallery',
        component: require('./components/Admin/Gallery/Index'),
        meta: {
            layout: 'admin',
            breadcrumb: [
                {
                    name: 'Home',
                    path: admin_url,
                },
                {
                    name: 'Gallery',
                    path: admin_url + 'gallery',
                }
            ],
            middlewareAuth: true,
            roleId: 1
        },
    },
    {
        path: admin_url + 'sliders',
        component: require('./components/Admin/Slider/Index'),
        meta: {
            layout: 'admin',
            breadcrumb: [
                {
                    name: 'Home',
                    path: admin_url,
                },
                {
                    name: 'Sliders',
                    path: admin_url + 'sliders',
                }
            ],
            middlewareAuth: true,
            roleId: 1
        },
    },
    {
        path: admin_url + 'cms',
        component: require('./components/Admin/CMS/Index'),
        meta: {
            layout: 'admin',
            breadcrumb: [
                {
                    name: 'Home',
                    path: admin_url,
                },
                {
                    name: 'Contents',
                    path: admin_url + 'cms',
                }
            ],
            middlewareAuth: true,
            roleId: 1
        },
    },
    {
        path: admin_url + 'student/:id',
        component: require('./components/Admin/Form/Detail'),
        meta: {
            layout: 'admin',
            breadcrumb: [
                {
                    name: 'Home',
                    path: admin_url,
                },
                {
                    name: 'Students',
                    path: admin_url + 'students',
                }
            ],
            middlewareAuth: true,
            roleId: 1
        },
    },
    {
        path: admin_url + 'course_unit_competences',
        component: require('./components/Admin/CourseUnitCompetences/Index'),
        meta: {
            layout: 'admin',
            breadcrumb: [
                {
                    name: 'Home',
                    path: admin_url,
                },
                {
                    name: 'Course Unit Competences',
                    path: admin_url + 'course_unit_competences',
                }
            ],
            middlewareAuth: true,
            roleId: 1
        },
    },
    {
        path: admin_url + 'course_unit_categories',
        component: require('./components/Admin/CourseUnitCategories/Index'),
        meta: {
            layout: 'admin',
            breadcrumb: [
                {
                    name: 'Home',
                    path: admin_url,
                },
                {
                    name: 'Course Unit Categories',
                    path: admin_url + 'course_unit_categories',
                }
            ],
            middlewareAuth: true,
            roleId: 1
        },
    },
    {
        path: admin_url + 'payment_options',
        component: require('./components/Admin/PaymentOptions/Index'),
        meta: {
            layout: 'admin',
            breadcrumb: [
                {
                    name: 'Home',
                    path: admin_url,
                },
                {
                    name: 'Payment Options',
                    path: admin_url + 'payment_options',
                }
            ],
            middlewareAuth: true,
            roleId: 1
        },
    },
    {
        path: admin_url + 'course_categories',
        component: require('./components/Admin/CourseCategories/Index'),
        meta: {
            layout: 'admin',
            breadcrumb: [
                {
                    name: 'Home',
                    path: admin_url,
                },
                {
                    name: 'Course Categories',
                    path: admin_url + 'course_categories',
                }
            ],
            middlewareAuth: true,
            roleId: 1
        },
    },

    {
        path: admin_url + 'course_category/:id',
        component: require('./components/Admin/CourseCategories/Detail'),
        meta: {
            layout: 'admin',
            breadcrumb: [
                {
                    name: 'Home',
                    path: admin_url,
                },
                {
                    name: 'Course Categories',
                    path: admin_url + 'course_categories',
                },
                {
                    name: 'Course',
                    path: admin_url + 'courses',
                }
            ],
            middlewareAuth: true,
            roleId: 1
        },
    },
    {
        path: admin_url + 'course_unit_relations',
        component: require('./components/Admin/CourseUnitRelations/Index'),
        meta: {
            layout: 'admin',
            breadcrumb: [
                {
                    name: 'Home',
                    path: admin_url,
                },
                {
                    name: 'Course Unit Relation',
                    path: admin_url + 'course_unit_relations',
                }
            ],
            middlewareAuth: true,
            roleId: 1
        },
    },
    // {
    //     path: admin_url + 'courses',
    //     component: require('./components/Admin/Course/Index'),
    //     name:'courses',
    //     meta: {
    //         layout: 'admin',
    //         breadcrumb: [
    //             {
    //                 name: 'Home',
    //                 path: admin_url,
    //             },
    //             {
    //                 name: 'Course',
    //                 path: admin_url + 'courses',
    //             }
    //         ],
    //         middlewareAuth: true,
    //         roleId: 1
    //     },
    // },
    {
        path: admin_url + 'course_category/:course_id/course/:id',
        component: require('./components/Admin/Course/Detail'),
        meta: {
            layout: 'admin',
            breadcrumb: [
                {
                    name: 'Home',
                    path: admin_url,
                }, {
                    name: 'Course Categories',
                    path: admin_url + 'course_categories',
                }, {
                    name: 'Courses',
                    path: admin_url + 'course_category/:course_id',
                }, {
                    name: 'Course',
                    path: admin_url + 'courses',
                }
            ],
            middlewareAuth: true,
            roleId: 1
        },
    },
    {
        path: admin_url + 'career_outcomes',
        component: require('./components/Admin/CareerOutcome/Index'),
        meta: {
            layout: 'admin',
            breadcrumb: [
                {
                    name: 'Home',
                    path: admin_url,
                },
                {
                    name: 'Career Outcomes',
                    path: admin_url + 'career_outcomes',
                }
            ],
            middlewareAuth: true,
            roleId: 1
        },
    },
    {
        path: admin_url + 'course_assessments',
        component: require('./components/Admin/CourseAssessments/Index'),
        meta: {
            layout: 'admin',
            breadcrumb: [
                {
                    name: 'Home',
                    path: admin_url,
                },
                {
                    name: 'Course Assessments',
                    path: admin_url + 'course_assessments',
                }
            ],
            middlewareAuth: true,
            roleId: 1
        },
    },
    {
        path: admin_url + 'course_rpls',
        component: require('./components/Admin/CourseRPL/Index'),
        meta: {
            layout: 'admin',
            breadcrumb: [
                {
                    name: 'Home',
                    path: admin_url,
                },
                {
                    name: 'Career RPLs',
                    path: admin_url + 'course_rpls',
                }
            ],
            middlewareAuth: true,
            roleId: 1
        },
    },
    {
        path: admin_url + 'course_entry_requirement',
        component: require('./components/Admin/CourseEntryRequirement/Index'),
        meta: {
            layout: 'admin',
            breadcrumb: [
                {
                    name: 'Home',
                    path: admin_url,
                },
                {
                    name: 'Course Entry Requirement',
                    path: admin_url + 'course_entry_requirement',
                }
            ],
            middlewareAuth: true,
            roleId: 1
        },
    },
    {
        path: admin_url + 'modules',
        component: require('./components/Admin/Module/Index'),
        meta: {
            layout: 'admin',
            breadcrumb: [
                {
                    name: 'Home',
                    path: admin_url,
                },
                {
                    name: 'Modules',
                    path: admin_url + 'modules',
                }
            ],
            middlewareAuth: true,
        roleId: 1
        },
    },
    {
        path: admin_url + 'module/:id',
        component: require('./components/Admin/Module/Detail'),
        meta: {
            layout: 'admin',
            breadcrumb: [
                {
                    name: 'Home',
                    path: admin_url,
                },
                {
                    name: 'Modules',
                    path: admin_url + 'modules',
                },
                {
                    name: 'Module',
                    path: admin_url + 'module/:id',
                }
            ],
            middlewareAuth: true,
            roleId: 1
        },
    },
    {
        path: admin_url + 'module_contents',
        component: require('./components/Admin/ModuleContent/Index'),
        meta: {
            layout: 'admin',
            breadcrumb: [
                {
                    name: 'Home',
                    path: admin_url,
                },
                {
                    name: 'Module Contents',
                    path: admin_url + 'module_contents',
                }
            ],
            middlewareAuth: true,
            roleId: 1
        },
    },
    {
        path: admin_url + 'page_modules',
        component: require('./components/Admin/PageModule/Index'),
        meta: {
            layout: 'admin',
            breadcrumb: [
                {
                    name: 'Home',
                    path: admin_url,
                },
                {
                    name: 'Page Module',
                    path: admin_url + 'page_modules',
                }
            ],
            middlewareAuth: true,
            roleId: 1
        },
    },
    {
        path: admin_url + 'agent_information',
        component: require('./components/Admin/AgentInformation/Index'),
        meta: {
            layout: 'admin',
            breadcrumb: [
                {
                    name: 'Home',
                    path: admin_url,
                },
                {
                    name: 'Agents',
                    path: admin_url + 'agent_information',
                }
            ],
            middlewareAuth: true,
            roleId: 1
        },
    },
    {
        path: admin_url + 'agent/:id',
        component: require('./components/Admin/AgentInformation/Detail'),
        meta: {
            layout: 'admin',
            breadcrumb: [
                {
                    name: 'Home',
                    path: admin_url,
                },
                {
                    name: 'Agents',
                    path: admin_url + 'agent_information',
                },
                {
                    name: 'Agent Detail',
                },

            ],
            middlewareAuth: true,
            roleId: 1
        },
    },
    {
        path: admin_url + 'agent_documents',
        component: require('./components/Admin/AgentDocument/Index'),
        meta: {
            layout: 'admin',
            breadcrumb: [
                {
                    name: 'Home',
                    path: admin_url,
                },
                {
                    name: 'Agent Document',
                    path: admin_url + 'agent_documents',
                }
            ],
            middlewareAuth: true,
            roleId: 1
        },
    },
    {
        path: admin_url + 'agent_agreement_process',
        component: require('./components/Admin/AgentAgreementProcess/Index'),
        meta: {
            layout: 'admin',
            breadcrumb: [
                {
                    name: 'Home',
                    path: admin_url,
                },
                {
                    name: 'Agent Agreement Process',
                    path: admin_url + 'agent_agreement_process',
                }
            ],
            middlewareAuth: true,
            roleId: 1
        },
    },
    {
        path: admin_url + 'import-export',
        component: require('./components/Admin/ImportExport/Index'),
        meta: {
            layout: 'admin',
            breadcrumb: [
                {
                    name: 'Home',
                    path: admin_url,
                },
                {
                    name: 'Import / Export',
                    path: admin_url + 'import-export',
                }
            ],
            middlewareAuth: true,
            roleId: 1
        },
    },
    {
        path: admin_url +'change-password',
        component: require('./components/Admin/Auth/ChangePassword'),
        name: 'admin-change-password',
        meta: {
            layout: 'admin',
            breadcrumb: [
                {
                    name: 'Home',
                    path: admin_url,
                },
                {
                    name: 'Change Password',
                }
            ],
            middlewareAuth: true,
            roleId: 1
        },
    },
    {
        path: admin_url + 'url-shortner',
        component: require('./components/Admin/UrlShortner/Index'),
        meta: {
            layout: 'admin',
            breadcrumb: [
                {
                    name: 'Home',
                    path: admin_url,
                },
                {
                    name: 'Url Shortner',
                    path: admin_url + 'url-shortner',
                }
            ],
            middlewareAuth: true,
            roleId: 1
        },
    },
    {
        path: admin_url + 'countries',
        component: require('./components/Admin/Country/Index'),
        meta: {
            layout: 'admin',
            breadcrumb: [
                {
                    name: 'Home',
                    path: admin_url,
                },
                {
                    name: 'Countries',
                    path: admin_url + 'countries',
                }
            ],
            middlewareAuth: true,
            roleId: 1
        },
    },
    {
        path: admin_url + 'branch_locations',
        component: require('./components/Admin/BranchLocation/Index'),
        meta: {
            layout: 'admin',
            breadcrumb: [
                {
                    name: 'Home',
                    path: admin_url,
                },
                {
                    name: 'Branch Locations',
                    path: admin_url + 'branch_location',
                }
            ],
            middlewareAuth: true,
            roleId: 1
        },
    },
];

export default routes;
