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
        path: admin_url + 'courses', 
        component: require('./components/Admin/Course/Index'),
        meta: {
            layout: 'admin',
            breadcrumb: [
                {
                    name: 'Home',
                    path: admin_url, 
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
];

export default routes;