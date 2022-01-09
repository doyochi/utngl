<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// --- GUEST ---
$route['home'] = 'guest/MainController';
$route['home/course_list'] = 'guest/MainController/course_list';
$route['home/course'] = 'guest/MainController/course';
// $route['home/eventList'] = 'guest/MainController/eventList';
$route['home/event'] = 'guest/MainController/event';
$route['home/pretest'] = 'guest/MainController/pretest';
$route['home/pretest/course'] = 'guest/MainController/pretestCourse';
$route['home/pretest/submit'] = 'guest/MainController/pretestSubmit';
$route['home/about'] = 'guest/MainController/about';
$route['profile'] = 'usr/ProfileController/index';
// $route['login'] = 'guest/AuthController';
// $route['register'] = 'guest/AuthController/register';

// --- ADMIN ---
// COURSE
$route['admin']                     = 'adm/AuthController/vLogin';
$route['admin/auth']                = 'adm/AuthController/auth';
$route['admin/logout']              = 'adm/AuthController/logout';
$route['admin/course']              = 'adm/CourseController';
$route['admin/course/add']          = 'adm/CourseController/vAdd';
$route['admin/course/edit/(:any)']  = 'adm/CourseController/vEdit/$1';
$route['admin/course/store']        = 'adm/CourseController/store';
$route['admin/course/update']       = 'adm/CourseController/update';
$route['admin/course/publish']      = 'adm/CourseController/publish';
$route['admin/course/destroy']      = 'adm/CourseController/destroy';

// KATEGORI COURSE
$route['admin/kategori-course']              = 'adm/KategoriCourseController';
$route['admin/kategori-course/add']          = 'adm/KategoriCourseController/vAdd';
$route['admin/kategori-course/edit/(:any)']  = 'adm/KategoriCourseController/vEdit/$1';
$route['admin/kategori-course/store']        = 'adm/KategoriCourseController/store';
$route['admin/kategori-course/update']       = 'adm/KategoriCourseController/update';
$route['admin/kategori-course/publish']      = 'adm/KategoriCourseController/publish';
$route['admin/kategori-course/destroy']      = 'adm/KategoriCourseController/destroy';

// MATERIAL
$route['admin/material/store']          = 'adm/MaterialController/store';
$route['admin/material/update']         = 'adm/MaterialController/update';
$route['admin/material/destroy-res']    = 'adm/MaterialController/destroyResource';
$route['admin/material/destroy']        = 'adm/MaterialController/destroy';
$route['admin/material/finish']         = 'adm/MaterialController/finish';
$route['admin/material/(:any)']         = 'adm/MaterialController/vMaterial/$1';
$route['admin/material/add/(:any)']     = 'adm/MaterialController/vAdd/$1';
$route['admin/material/edit/(:any)']    = 'adm/MaterialController/vEdit/$1';

// PRETEST
$route['admin/pretest']               = 'adm/PretestController';
$route['admin/pretest/add']           = 'adm/PretestController/vAdd';
$route['admin/pretest/edit/(:any)']   = 'adm/PretestController/vEdit/$1';
$route['admin/pretest/store']         = 'adm/PretestController/store';
$route['admin/pretest/update']        = 'adm/PretestController/update';
$route['admin/pretest/publish']       = 'adm/PretestController/publish';
$route['admin/pretest/destroy']       = 'adm/PretestController/destroy';

// EVENT
$route['admin/event']               = 'adm/EventController';
$route['admin/event/add']           = 'adm/EventController/vAdd';
$route['admin/event/edit/(:any)']   = 'adm/EventController/vEdit/$1';
$route['admin/event/store']         = 'adm/EventController/store';
$route['admin/event/update']        = 'adm/EventController/update';
$route['admin/event/publish']       = 'adm/EventController/publish';
$route['admin/event/destroy']       = 'adm/EventController/destroy';

// NEXT GEN LEADERS
$route['admin/ngl']                 = 'adm/NGLController';
$route['admin/ngl/course/(:any)']   = 'adm/NGLController/vCourse/$1';
$route['admin/ngl/pretest/(:any)']  = 'adm/NGLController/vPretest/$1';
$route['admin/ngl/detail/(:any)']   = 'adm/NGLController/vDetail/$1';
$route['admin/ngl/edit/(:any)']     = 'adm/NGLController/vEdit/$1';
$route['admin/ngl/review']          = 'adm/NGLController/review';

// PAYMENT
$route['admin/payment']         = 'adm/PaymentController';
$route['admin/paymentApprove']  = 'adm/NGLController/update';


// --- USER ---
// AUTH
$route['sign-in']   = 'usr/AuthController/vSignIn';
$route['sign-up']   = 'usr/AuthController/vSignUp';
$route['kebijakan'] = 'usr/AuthController/vKebijakan';
$route['register']  = 'usr/AuthController/register';
$route['login']     = 'usr/AuthController/login';
$route['logout']    = 'usr/AuthController/logout';

//PROFILE VIEW
$route['profile_view'] = 'usr/ProfileController/index';

// EVENT
$route['event-list']    = 'usr/EventController/vEventList';
$route['event/(:any)']  = 'usr/EventController/vEvent/$1';

// COURSE
$route['course/ajxGetMU']       = 'usr/CourseController/ajxGetMU';
$route['course/next-materi']    = 'usr/CourseController/nextMateri';
$route['course/finish-materi']  = 'usr/CourseController/finishMateri';
$route['course-list/(:any)']    = 'usr/CourseController/vCourseList/$1';
$route['course/(:any)']         = 'usr/CourseController/vCourse/$1';

// PRETEST
$route['pretest/collect']           = 'usr/PretestController/collect';
$route['pretest/(:any)']            = 'usr/PretestController/vPretest/$1';
$route['pretest/do/(:any)']         = 'usr/PretestController/vDo/$1';
$route['pretest/submit/(:any)']     = 'usr/PretestController/vSubmit/$1';
$route['pretest/start/(:any)']      = 'usr/PretestController/start/$1';


// UPGRADE
$route['upgrade']           = 'guest/MainController/upgrade';
$route['upgrade/payment']   = 'guest/MainController/upgradePayment';
$route['upgrade/bukti']    = 'usr/UpgradeController/store';
$route['upgrade/sukses']    = 'guest/MainController/upgradePaymentSuccess';