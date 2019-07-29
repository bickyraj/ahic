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
      icon: 'far fa-hand-paper',
      badge: {
        variant: 'primary',
        // text: 'NEW'
      }
    },
    {
      name: 'Agent Management',
      url: url + 'agent_information',
      icon: 'fas fa-user-tie',
      badge: {
        variant: 'primary',
        // text: 'NEW'
      }
    },
    {
      name: 'Student Management',
      url: url + 'students',
      icon: 'fas fa-users',
      badge: {
        variant: 'primary',
        // text: 'NEW'
      }
    },
    {
      name: 'Course Management',
      url: '/coursemanagement',
      icon: 'fas fa-book',
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
    {
      name: 'Testimonials',
      url: url + 'testimonials',
      icon: 'fas fa-cloud-download-alt',
      badge: {
        variant: 'primary',
      }
    },
    {
      name: 'Downloads',
      url: url + 'downloads',
      icon: 'fas fa-cloud-download-alt',
      badge: {
        variant: 'primary',
        // text: 'NEW'
      }
    },
    {
      name: 'Messages',
      url: url + 'messages',
      icon: 'fas fa-book-open',
      badge: {
        variant: 'primary',
        // text: 'NEW'
      }
    },
    {
      name: 'Newsletters',
      url: url + 'newsletters',
      icon: 'fas fa-book-open',
      badge: {
        variant: 'primary',
        // text: 'NEW'
      }
    },
    {
      name: 'CMS',
      url: '/cms',
      icon: 'fab fa-microsoft',
      children: [{
         name: 'Menus',
           url: url + 'menus',
           icon: 'fas fa-list',
           badge: {
             variant: 'primary',
           }
        },
        {
         name: 'Pages',
           url: url + 'pages',
           icon: 'fas fa-file',
           badge: {
             variant: 'primary',
             // text: 'NEW'
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
        {
         name: 'Slider',
           url: url + 'sliders',
           icon: 'fas fa-book-open',
           badge: {
             variant: 'primary',
           }
        },
         {
           name: 'Module & Contents',
           url: url + 'modules',
           icon: 'fas fa-file-code',
           badge: {
             variant: 'primary',
             // text: 'NEW'
           }
         },
        {
         name: 'News',
           url: url + 'news',
           icon: 'fas fa-newspaper',
           badge: {
             variant: 'primary',
           }
        },
        {
         name: 'Gallery',
           url: url + 'gallery',
           icon: 'fas fa-images',
           badge: {
             variant: 'primary',
           }
        },
        
      ]
    },
    {
      name: 'Settings',
      url: '/settings',
      icon: 'fas fa-cog',
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
        {
          name: 'Contact',
          url: url + 'contact',
          icon: 'fas fa-book-open',
          badge: {
            variant: 'primary',
            // text: 'NEW'
          }
        },

      ]
    }
  ]
}
