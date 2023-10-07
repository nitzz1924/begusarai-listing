 <style>
     .zoom-on-hover {
         transition: transform 0.3s ease;
         /* Add a smooth transition effect */
     }

     .zoom-on-hover:hover {
         transform: scale(1.05);
         /* Zoom in slightly on hover */
     }
 </style>
<style>
     /* Custom color palette */
     :root {
         --primary-color: #23d3d3; /* Teal color */
         --secondary-color: #28A745; /* Green color */
         --sidebar-bg-color: #333; /* Dark background color */
         --text-color: #fff; /* White text color */
     }

     /* Sidebar styling */
     .app-sidebar {
         background-color: var(--sidebar-bg-color);
         color: var(--text-color);
          
     }

     /* Add padding and remove list-style-type from the menu items */
     .vertical-nav-menu ul {
         padding: 0;
         list-style-type: none;
     }

     /* Style the sidebar links */
     .vertical-nav-menu a {
         color: var(--text-color);
         text-decoration: none;
         padding: 10px 20px;
         display: block;
         transition: color 0.3s;
     }

     .vertical-nav-menu a:hover {
         color: var(--primary-color);
     }

     /* Style the icons */
     .vertical-nav-menu i {
         font-size: 18px;
         margin-right: 10px;
     }

     /* Add a subtle box shadow to the sidebar */
     .app-sidebar {
         box-shadow: 2px 0 5px rgba(0, 0, 0, 0.2);
     }

     /* Style the active and hover states */
     .vertical-nav-menu li.mm-active a,
     .vertical-nav-menu li.zoom-on-hover:hover a {
         color: var(--primary-color);
     }

     /* Style the sidebar toggles */
     .hamburger span.hamburger-inner,
     .mobile-toggle-nav span.hamburger-inner,
     .mobile-toggle-header-nav .btn-icon-wrapper {
         background-color: var(--primary-color);
     }
</style>

 <div class="app-sidebar sidebar-shadow">
     <div class="app-header__logo">
         <div class="header__pane ml-auto">
             <div>
                 <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                     <span class="hamburger-box">
                         <span class="hamburger-inner"></span>
                     </span>
                 </button>
             </div>
         </div>
     </div>
     <div class="app-header__mobile-menu">
         <div>
             <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                 <span class="hamburger-box">
                     <span class="hamburger-inner"></span>
                 </span>
             </button>
         </div>
     </div>
     <div class="app-header__menu">
         <span>
             <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                 <span class="btn-icon-wrapper">
                     <i class="fa fa-ellipsis-v fa-w-6"></i>
                 </span>
             </button>
         </span>
     </div>
     <div class="scrollbar-sidebar">
         <div class="app-sidebar__inner">
             <ul class="vertical-nav-menu">

                 <li class='zoom-on-hover'>
                     <a href="{{ URL::to('/admin/view') }}">
                         <i class="metismenu-icon  bi bi-house-fill"></i>
                         Dashboard
                     </a>
                 </li>
                 <!-- <li  class='zoom-on-hover'>
                     <a href="{{ URL::to('/admin/master') }}" Style="color:red">
                         <i class="metismenu-icon pe-7s-bookmarks"></i>
                         Master
                     </a>
                 </li> -->

                 <li  class='zoom-on-hover'>
                     <a href="{{ URL::to('/admin/setting') }} " >
                         <i class="metismenu-icon bi bi-gear-wide-connected"></i>
                        Settings
                     </a>
                 </li>
                  <li  class='zoom-on-hover'>
                     <a href="{{ URL::to('/admin/popupSetting') }} " >
                         <i class="metismenu-icon bi bi-gear-wide-connected"></i>
                       Ads Featured Settings
                     </a>
                 </li>

                 <li  class='zoom-on-hover'>
                     <a href="{{ URL::to('/admin/package') }}">
                         <i class="metismenu-icon fa-regular fa-credit-card"></i>
                         Packages
                     </a>
                 </li>
                 <li  class='zoom-on-hover'>
                     <a href="{{ URL::to('/admin/users') }}">
                         <i class="metismenu-icon bi bi-people"></i>
                         Users
                     </a>
                 </li>
                 <li  class='zoom-on-hover'>
                     <a href="{{ URL::to('/admin/blog') }}">
                         <i class="metismenu-icon  fa-regular fa-newspaper"></i>
                         Blogs
                     </a>
                 </li>
                  

                 <li  class='zoom-on-hover'>
                     <a href="{{ URL::to('/admin/testimonial') }}">
                         <i class="metismenu-icon fa-regular fa-comments"></i>
                         Testimonial
                     </a>
                 </li>

                 <li  class='zoom-on-hover'>
                     <a href="{{ URL::to('/admin/listing') }}">
                         <i class="metismenu-icon bi bi-shop"></i>
                         All Listing
                     </a>
                 </li>

                 <li  class='zoom-on-hover'>
                     <a href="{{ URL::to('/admin/lead') }}">
                         <i class="metismenu-icon  fa-regular fa-bell"></i>
                         All Leads
                     </a>
                 </li>

                 <li  class='zoom-on-hover'>
                     <a href="{{ URL::to('/admin/career') }}">
                         <i class="metismenu-icon bi bi-briefcase"></i>
                         Careers
                     </a>
                 </li>
                 <li  class='zoom-on-hover'>
                     <a href="{{ URL::to('/admin/contact') }}">
                         <i class="metismenu-icon  fa-regular fa-id-card"></i>
                         Contact
                     </a>
                 </li>

                 <li  class='zoom-on-hover'>
                     <a href="{{ URL::to('/admin_login/logout') }}">
                         <i class="metismenu-icon  bi bi-door-open"></i>
                         Logout
                     </a>
                 </li>
             </ul>
         </div>
     </div>
 </div>

 <!-- /.sidebar -->
 <script type="text/javascript">
     $(document).ready(function() {
         $('.app-sidebar__inner ul li').each(function() {
             if (window.location.href.indexOf($(this).find('a:first').attr('href')) > -1) {
                 $(this).closest('ul').closest('li').attr('class', 'mm-active');
                 $(this).addClass('mm-active').siblings().removeClass('mm-active');
             }
         });
     });
 </script>
