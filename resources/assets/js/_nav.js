let url = window.laravel.vueBaseUrl + 'admin/'
// let url = '/admin/'
export default {
  items: [
    {
      name: 'Dashboard',
      url: url,
      icon: 'fas fa-tachometer-alt',
      badge: {
        variant: 'primary',
        // text: 'NEW'
      }
    },
    {
      name: 'Enquiry Management',
      url: url + 'enquiries',
      icon: 'fas fa-book-open',
      badge: {
        variant: 'primary',
        // text: 'NEW'
      }
    },
    {
      name: 'Agent Management',
      url: url + 'agent_information',
      icon: 'fas fa-book-open',
      badge: {
        variant: 'primary',
        // text: 'NEW'
      }
    },
    {
      name: 'Student Management',
      url: url + 'students',
      icon: 'fas fa-book-open',
      badge: {
        variant: 'primary',
        // text: 'NEW'
      }
    },


    {
      name: 'CMS',
      url: '/cms',
      icon: 'fas fa-book-open',
      children: [{
         name: 'Menus',
           url: url + 'menus',
           icon: 'fas fa-book-open',
           badge: {
             variant: 'primary',
           }
        },
        {
         name: 'Pages',
           url: url + 'pages',
           icon: 'fas fa-book-open',
           badge: {
             variant: 'primary',
             // text: 'NEW'
           }
        },
         {
           name: 'Module & Contents',
           url: url + 'modules',
           icon: 'fas fa-book-open',
           badge: {
             variant: 'primary',
             // text: 'NEW'
           }
         },
        {
         name: 'News',
           url: url + 'news',
           icon: 'fas fa-book-open',
           badge: {
             variant: 'primary',
           }
        },
        {
         name: 'Gallery',
           url: url + 'gallery',
           icon: 'fas fa-book-open',
           badge: {
             variant: 'primary',
           }
        },
        {
         name: 'Slider',
           url: url + 'sliders',
           icon: 'fas fa-book-open',
           badge: {
             variant: 'primary',
           }
        },
        {
         name: 'Contents',
           url: url + 'cms',
           icon: 'fas fa-book-open',
           badge: {
             variant: 'primary',
           }
        },

      ]
    },
    {
      name: 'Course Management',
      url: '/coursemanagement',
      icon: 'fas fa-book-open',
      children: [
        {
          name: 'Unit Competences',
          url: url + 'course_unit_competences',
          icon: 'fas fa-book-open',
          badge: {
            variant: 'primary',
            // text: 'NEW'
          }
        },

        {
          name: 'Course & Categories',
          url: url + 'course_categories',
          icon: 'fas fa-book-open',
          badge: {
            variant: 'primary',
            // text: 'NEW'
          }
        },

      ]
    },

    // {
    //   name: 'Roles',
    //   url: url + 'roles',
    //   icon: 'fas fa-key',
    //   badge: {
    //     variant: 'primary',
    //     // text: 'NEW'
    //   }
    // },

    // {
    //   name: 'Unit Categories',
    //   url: url + 'course_unit_categories',
    //   icon: 'fas fa-book-open',
    //   badge: {
    //     variant: 'primary',
    //     // text: 'NEW'
    //   }
    // },
    // {
    //   name: 'Unit Relation',
    //   url: url + 'course_unit_relations',
    //   icon: 'fas fa-book-open',
    //   badge: {
    //     variant: 'primary',
    //     // text: 'NEW'
    //   }
    // },
    // {
    //   name: 'Courses',
    //   url: url + 'courses',
    //   icon: 'fas fa-book-open',
    //   badge: {
    //     variant: 'primary',
    //     // text: 'NEW'
    //   }
    // },

    // {
    //   name: 'Module Contents',
    //   url: url + 'module_contents',
    //   icon: 'fas fa-book-open',
    //   badge: {
    //     variant: 'primary',
    //     // text: 'NEW'
    //   }
    // },




    {
      name: 'Downloads',
      url: url + 'downloads',
      icon: 'fas fa-book-open',
      badge: {
        variant: 'primary',
        // text: 'NEW'
      }
    },
    {
      name: 'Settings',
      url: '/settings',
      icon: 'fas fa-book-open',
      children: [
        {
          name: 'Countries',
          url: url + 'countries',
          icon: 'fas fa-book-open',
          badge: {
            variant: 'primary',
            // text: 'NEW'
          }
        },
        {
          name: 'Branch Locations',
          url: url + 'branch_locations',
          icon: 'fas fa-book-open',
          badge: {
            variant: 'primary',
            // text: 'NEW'
          }
        },
        {
          name: 'Dates Of Intake',
          url: url + 'date_of_intakes',
          icon: 'fas fa-book-open',
          badge: {
            variant: 'primary',
            // text: 'NEW'
          }
        },

        {
          name: 'Payment Options',
          url: url + 'payment_options',
          icon: 'fas fa-book-open',
          badge: {
            variant: 'primary',
            // text: 'NEW'
          }
        },

      ]
    },

    // {
    //   name: 'Page Modules',
    //   url: url + 'page_modules',
    //   icon: 'fas fa-book-open',
    //   badge: {
    //     variant: 'primary',
    //     // text: 'NEW'
    //   }
    // },
    // {
    //   name: 'Career Outcomes',
    //   url: url + 'career_outcomes',
    //   icon: 'fas fa-book-open',
    //   badge: {
    //     variant: 'primary',
    //     // text: 'NEW'
    //   }
    // },
    // {
    //   name: 'Course Assessments',
    //   url: url + 'course_assessments',
    //   icon: 'fas fa-book-open',
    //   badge: {
    //     variant: 'primary',
    //     // text: 'NEW'
    //   }
    // },
    // {
    //   name: 'Course RPL',
    //   url: url + 'course_rpls',
    //   icon: 'fas fa-book-open',
    //   badge: {
    //     variant: 'primary',
    //     // text: 'NEW'
    //   }
    // },
    // {
    //   name: 'Entry Requirement',
    //   url: url + 'course_entry_requirement',
    //   icon: 'fas fa-book-open',
    //   badge: {
    //     variant: 'primary',
    //     // text: 'NEW'
    //   }
    // },
    // {
    //   name: 'Import / Export',
    //   url: url + 'import-export',
    //   icon: 'fas fa-cloud-download-alt',
    //   badge: {
    //     variant: 'primary',
    //     // text: 'NEW'
    //   }
    // },
    // {
    //   name: 'Url Shortner',
    //   url: url + 'url-shortner',
    //   icon: 'fas fa-link',
    //   badge: {
    //     variant: 'primary',
    //     // text: 'NEW'
    //   }
    // },

    /*{
      name: 'Buttons',
      url: '/buttons',
      icon: 'icon-cursor',
      children: [
        {
          name: 'Standard Buttons',
          url: '/buttons/standard-buttons',
          icon: 'icon-cursor'
        },
        {
          name: 'Button Groups',
          url: '/buttons/button-groups',
          icon: 'icon-cursor'
        },
        {
          name: 'Dropdowns',
          url: '/buttons/dropdowns',
          icon: 'icon-cursor'
        },
        {
          name: 'Social Buttons',
          url: '/buttons/social-buttons',
          icon: 'icon-cursor'
        }
      ]
    },

    {
      name: 'Charts',
      url: '/charts',
      icon: 'icon-pie-chart'
    },
    {
      name: 'Notifications',
      url: '/notifications',
      icon: 'icon-bell',
      children: [
        {
          name: 'Alerts',
          url: '/notifications/alerts',
          icon: 'icon-bell'
        },
        {
          name: 'Badges',
          url: '/notifications/badges',
          icon: 'icon-bell'
        },
        {
          name: 'Modals',
          url: '/notifications/modals',
          icon: 'icon-bell'
        }
      ]
    },
    {
      name: 'Widgets',
      url: '/widgets',
      icon: 'icon-calculator',
      badge: {
        variant: 'primary',
        text: 'NEW'
      }
    },
    {
      divider: true
    },
    {
      title: true,
      name: 'Extras'
    },
    {
      name: 'Pages',
      url: '/pages',
      icon: 'icon-star',
      children: [
        {
          name: 'Login',
          url: '/pages/login',
          icon: 'icon-star'
        },
        {
          name: 'Register',
          url: '/pages/register',
          icon: 'icon-star'
        },
        {
          name: 'Error 404',
          url: '/pages/404',
          icon: 'icon-star'
        },
        {
          name: 'Error 500',
          url: '/pages/500',
          icon: 'icon-star'
        }
      ]
    },
    {
      name: 'Download CoreUI',
      url: 'http://coreui.io/vue/',
      icon: 'icon-cloud-download',
      class: 'mt-auto',
      variant: 'success'
    },
    {
      name: 'Try CoreUI PRO',
      url: 'http://coreui.io/pro/vue/',
      icon: 'icon-layers',
      variant: 'danger'
    }*/
  ]
}
