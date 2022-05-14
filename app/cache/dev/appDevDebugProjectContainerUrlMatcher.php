<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevDebugProjectContainerUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($rawPathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($rawPathinfo);
        $context = $this->context;
        $request = $this->request ?: $this->createRequest($pathinfo);

        if (0 === strpos($pathinfo, '/_')) {
            // _wdt
            if (0 === strpos($pathinfo, '/_wdt') && preg_match('#^/_wdt/(?P<token>[^/]++)$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_wdt')), array (  '_controller' => 'web_profiler.controller.profiler:toolbarAction',));
            }

            if (0 === strpos($pathinfo, '/_profiler')) {
                // _profiler_home
                if ('/_profiler' === rtrim($pathinfo, '/')) {
                    if ('/' === substr($pathinfo, -1)) {
                        // no-op
                    } elseif (!in_array($this->context->getMethod(), array('HEAD', 'GET'))) {
                        goto not__profiler_home;
                    } else {
                        return $this->redirect($rawPathinfo.'/', '_profiler_home');
                    }

                    return array (  '_controller' => 'web_profiler.controller.profiler:homeAction',  '_route' => '_profiler_home',);
                }
                not__profiler_home:

                if (0 === strpos($pathinfo, '/_profiler/search')) {
                    // _profiler_search
                    if ('/_profiler/search' === $pathinfo) {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchAction',  '_route' => '_profiler_search',);
                    }

                    // _profiler_search_bar
                    if ('/_profiler/search_bar' === $pathinfo) {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchBarAction',  '_route' => '_profiler_search_bar',);
                    }

                }

                // _profiler_purge
                if ('/_profiler/purge' === $pathinfo) {
                    return array (  '_controller' => 'web_profiler.controller.profiler:purgeAction',  '_route' => '_profiler_purge',);
                }

                // _profiler_info
                if (0 === strpos($pathinfo, '/_profiler/info') && preg_match('#^/_profiler/info/(?P<about>[^/]++)$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_info')), array (  '_controller' => 'web_profiler.controller.profiler:infoAction',));
                }

                // _profiler_phpinfo
                if ('/_profiler/phpinfo' === $pathinfo) {
                    return array (  '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  '_route' => '_profiler_phpinfo',);
                }

                // _profiler_search_results
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/search/results$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_search_results')), array (  '_controller' => 'web_profiler.controller.profiler:searchResultsAction',));
                }

                // _profiler
                if (preg_match('#^/_profiler/(?P<token>[^/]++)$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler')), array (  '_controller' => 'web_profiler.controller.profiler:panelAction',));
                }

                // _profiler_router
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/router$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_router')), array (  '_controller' => 'web_profiler.controller.router:panelAction',));
                }

                // _profiler_exception
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception')), array (  '_controller' => 'web_profiler.controller.exception:showAction',));
                }

                // _profiler_exception_css
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception\\.css$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception_css')), array (  '_controller' => 'web_profiler.controller.exception:cssAction',));
                }

            }

            // _twig_error_test
            if (0 === strpos($pathinfo, '/_error') && preg_match('#^/_error/(?P<code>\\d+)(?:\\.(?P<_format>[^/]++))?$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_twig_error_test')), array (  '_controller' => 'twig.controller.preview_error:previewErrorPageAction',  '_format' => 'html',));
            }

        }

        if (0 === strpos($pathinfo, '/backend')) {
            if (0 === strpos($pathinfo, '/backend/branch')) {
                // backend_branch
                if (preg_match('#^/backend/branch/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'backend_branch')), array (  '_controller' => 'AppBundle\\Controller\\Backend\\BranchController::indexAction',));
                }

                // backend_branch_edit
                if (0 === strpos($pathinfo, '/backend/branch/edit') && preg_match('#^/backend/branch/edit/(?P<id>[^/]++)/(?P<organizationId>[^/]++)$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'backend_branch_edit')), array (  '_controller' => 'AppBundle\\Controller\\Backend\\BranchController::editAction',));
                }

                // backend_branch_delete
                if ('/backend/branch_delete' === $pathinfo) {
                    return array (  '_controller' => 'AppBundle\\Controller\\Backend\\BranchController::branchTypeDelete',  '_route' => 'backend_branch_delete',);
                }

            }

            if (0 === strpos($pathinfo, '/backend/type')) {
                // backend_branch_type
                if ('/backend/type' === $pathinfo) {
                    return array (  '_controller' => 'AppBundle\\Controller\\Backend\\BranchTypeController::indexAction',  '_route' => 'backend_branch_type',);
                }

                // backend_branch_type_edit
                if (0 === strpos($pathinfo, '/backend/type/edit') && preg_match('#^/backend/type/edit/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'backend_branch_type_edit')), array (  '_controller' => 'AppBundle\\Controller\\Backend\\BranchTypeController::editAction',));
                }

                // backend_branch_type_delete
                if (0 === strpos($pathinfo, '/backend/type/delete') && preg_match('#^/backend/type/delete/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'backend_branch_type_delete')), array (  '_controller' => 'AppBundle\\Controller\\Backend\\BranchTypeController::deleteAction',));
                }

            }

            if (0 === strpos($pathinfo, '/backend/statistics')) {
                // backend_statistics
                if ('/backend/statistics' === $pathinfo) {
                    return array (  '_controller' => 'AppBundle\\Controller\\Backend\\DashboardController::statisticsAction',  '_route' => 'backend_statistics',);
                }

                if (0 === strpos($pathinfo, '/backend/statistics_')) {
                    // backend_statistics_view
                    if (0 === strpos($pathinfo, '/backend/statistics_view') && preg_match('#^/backend/statistics_view/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'backend_statistics_view')), array (  '_controller' => 'AppBundle\\Controller\\Backend\\DashboardController::statisticsViewAction',));
                    }

                    if (0 === strpos($pathinfo, '/backend/statistics_detail')) {
                        // backend_statistics_detail
                        if ('/backend/statistics_detail' === $pathinfo) {
                            return array (  '_controller' => 'AppBundle\\Controller\\Backend\\DashboardController::statisticsDetailAction',  '_route' => 'backend_statistics_detail',);
                        }

                        // backend_statistics_detail_requirement
                        if ('/backend/statistics_detail_requirement' === $pathinfo) {
                            return array (  '_controller' => 'AppBundle\\Controller\\Backend\\DashboardController::statisticsDetailRequirement',  '_route' => 'backend_statistics_detail_requirement',);
                        }

                    }

                }

            }

            // backend_check_mp
            if ('/backend/checkmp' === $pathinfo) {
                return array (  '_controller' => 'AppBundle\\Controller\\Backend\\IndexController::checkmpAction',  '_route' => 'backend_check_mp',);
            }

            // backend_index
            if ('/backend' === rtrim($pathinfo, '/')) {
                if ('/' === substr($pathinfo, -1)) {
                    // no-op
                } elseif (!in_array($this->context->getMethod(), array('HEAD', 'GET'))) {
                    goto not_backend_index;
                } else {
                    return $this->redirect($rawPathinfo.'/', 'backend_index');
                }

                return array (  '_controller' => 'AppBundle\\Controller\\Backend\\IndexController::getindexAction',  '_route' => 'backend_index',);
            }
            not_backend_index:

            // backend_login
            if ('/backend/login' === $pathinfo) {
                return array (  '_controller' => 'AppBundle\\Controller\\Backend\\IndexController::indexAction',  '_route' => 'backend_login',);
            }

            // backend_main
            if ('/backend/main' === $pathinfo) {
                return array (  '_controller' => 'AppBundle\\Controller\\Backend\\IndexController::mainAction',  '_route' => 'backend_main',);
            }

            // backend_logout
            if ('/backend/logout' === $pathinfo) {
                return array (  '_controller' => 'AppBundle\\Controller\\Backend\\IndexController::logoutAction',  '_route' => 'backend_logout',);
            }

            if (0 === strpos($pathinfo, '/backend/inspection')) {
                if (0 === strpos($pathinfo, '/backend/inspection/result')) {
                    // backend_inspection_result
                    if ('/backend/inspection/result' === $pathinfo) {
                        return array (  '_controller' => 'AppBundle\\Controller\\Backend\\InspectionResultController::indexAction',  '_route' => 'backend_inspection_result',);
                    }

                    // backend_inspection_result_edit
                    if (0 === strpos($pathinfo, '/backend/inspection/result/edit') && preg_match('#^/backend/inspection/result/edit/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'backend_inspection_result_edit')), array (  '_controller' => 'AppBundle\\Controller\\Backend\\InspectionResultController::editAction',));
                    }

                    // backend_inspection_result_delete
                    if ('/backend/inspection/result/delete' === $pathinfo) {
                        return array (  '_controller' => 'AppBundle\\Controller\\Backend\\InspectionResultController::branchTypeDelete',  '_route' => 'backend_inspection_result_delete',);
                    }

                }

                if (0 === strpos($pathinfo, '/backend/inspection/status')) {
                    // backend_inspection_status
                    if ('/backend/inspection/status' === $pathinfo) {
                        return array (  '_controller' => 'AppBundle\\Controller\\Backend\\InspectionStatusController::indexAction',  '_route' => 'backend_inspection_status',);
                    }

                    // backend_inspection_status_edit
                    if (0 === strpos($pathinfo, '/backend/inspection/status/edit') && preg_match('#^/backend/inspection/status/edit/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'backend_inspection_status_edit')), array (  '_controller' => 'AppBundle\\Controller\\Backend\\InspectionStatusController::editAction',));
                    }

                    // backend_inspection_status_delete
                    if ('/backend/inspection/status/delete' === $pathinfo) {
                        return array (  '_controller' => 'AppBundle\\Controller\\Backend\\InspectionStatusController::branchTypeDelete',  '_route' => 'backend_inspection_status_delete',);
                    }

                }

            }

        }

        // backend_load_cities
        if ('/load-cities' === $pathinfo) {
            return array (  '_controller' => 'AppBundle\\Controller\\Backend\\MainController::loadCitiesAction',  '_route' => 'backend_load_cities',);
        }

        if (0 === strpos($pathinfo, '/backend')) {
            if (0 === strpos($pathinfo, '/backend/modules')) {
                // backend_modules
                if ('/backend/modules' === $pathinfo) {
                    return array (  '_controller' => 'AppBundle\\Controller\\Backend\\ModuleController::indexAction',  '_route' => 'backend_modules',);
                }

                // backend_modules_edit
                if (preg_match('#^/backend/modules/(?P<moduleId>[^/]++)$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'backend_modules_edit')), array (  '_controller' => 'AppBundle\\Controller\\Backend\\ModuleController::editAction',));
                }

                // backend_modules_delete
                if (0 === strpos($pathinfo, '/backend/modules/delete') && preg_match('#^/backend/modules/delete/(?P<moduleId>[^/]++)$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'backend_modules_delete')), array (  '_controller' => 'AppBundle\\Controller\\Backend\\ModuleController::deleteAction',));
                }

            }

            if (0 === strpos($pathinfo, '/backend/organization')) {
                // backend_organization
                if ('/backend/organization' === $pathinfo) {
                    return array (  '_controller' => 'AppBundle\\Controller\\Backend\\OrganizationController::indexAction',  '_route' => 'backend_organization',);
                }

                // backend_organization_edit
                if (0 === strpos($pathinfo, '/backend/organization/edit') && preg_match('#^/backend/organization/edit/(?P<organizationId>[^/]++)$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'backend_organization_edit')), array (  '_controller' => 'AppBundle\\Controller\\Backend\\OrganizationController::editAction',));
                }

                // backend_organization_delete
                if (0 === strpos($pathinfo, '/backend/organization/delete') && preg_match('#^/backend/organization/delete/(?P<organizationId>[^/]++)$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'backend_organization_delete')), array (  '_controller' => 'AppBundle\\Controller\\Backend\\OrganizationController::deleteAction',));
                }

            }

            if (0 === strpos($pathinfo, '/backend/requirement')) {
                // backend_requirement
                if ('/backend/requirement' === $pathinfo) {
                    return array (  '_controller' => 'AppBundle\\Controller\\Backend\\RequirementController::indexAction',  '_route' => 'backend_requirement',);
                }

                // backend_requirement_edit
                if (0 === strpos($pathinfo, '/backend/requirement/edit') && preg_match('#^/backend/requirement/edit/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'backend_requirement_edit')), array (  '_controller' => 'AppBundle\\Controller\\Backend\\RequirementController::editAction',));
                }

                // backend_requirement_delete
                if ('/backend/requirement/delete' === $pathinfo) {
                    return array (  '_controller' => 'AppBundle\\Controller\\Backend\\RequirementController::requerimentDelete',  '_route' => 'backend_requirement_delete',);
                }

                // backend_selection
                if ('/backend/requirement/selection' === $pathinfo) {
                    return array (  '_controller' => 'AppBundle\\Controller\\Backend\\RequirementController::zoneAction',  '_route' => 'backend_selection',);
                }

                if (0 === strpos($pathinfo, '/backend/requirement/group')) {
                    // backend_requirement_group
                    if ('/backend/requirement/group' === $pathinfo) {
                        return array (  '_controller' => 'AppBundle\\Controller\\Backend\\RequirementGroupController::indexAction',  '_route' => 'backend_requirement_group',);
                    }

                    // backend_requirement_group_edit
                    if (0 === strpos($pathinfo, '/backend/requirement/group/edit') && preg_match('#^/backend/requirement/group/edit/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'backend_requirement_group_edit')), array (  '_controller' => 'AppBundle\\Controller\\Backend\\RequirementGroupController::editAction',));
                    }

                    // backend_requirement_group_delete
                    if (0 === strpos($pathinfo, '/backend/requirement/group/delete') && preg_match('#^/backend/requirement/group/delete/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'backend_requirement_group_delete')), array (  '_controller' => 'AppBundle\\Controller\\Backend\\RequirementGroupController::deleteAction',));
                    }

                }

                if (0 === strpos($pathinfo, '/backend/requirement/item')) {
                    // backend_requirement_item
                    if (preg_match('#^/backend/requirement/item/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'backend_requirement_item')), array (  '_controller' => 'AppBundle\\Controller\\Backend\\RequirementItemController::indexAction',));
                    }

                    // backend_requirement_item_edit
                    if (0 === strpos($pathinfo, '/backend/requirement/item/edit') && preg_match('#^/backend/requirement/item/edit/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'backend_requirement_item_edit')), array (  '_controller' => 'AppBundle\\Controller\\Backend\\RequirementItemController::editAction',));
                    }

                }

                // backend_requirement_item_delete
                if ('/backend/requirement-item/delete' === $pathinfo) {
                    return array (  '_controller' => 'AppBundle\\Controller\\Backend\\RequirementItemController::requerimentItemDelete',  '_route' => 'backend_requirement_item_delete',);
                }

                if (0 === strpos($pathinfo, '/backend/requirement/penalty')) {
                    // backend_requirement_penalty
                    if ('/backend/requirement/penalty' === $pathinfo) {
                        return array (  '_controller' => 'AppBundle\\Controller\\Backend\\RequirementPenaltyController::indexAction',  '_route' => 'backend_requirement_penalty',);
                    }

                    // backend_requirement_penalty_edit
                    if (0 === strpos($pathinfo, '/backend/requirement/penalty/edit') && preg_match('#^/backend/requirement/penalty/edit/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'backend_requirement_penalty_edit')), array (  '_controller' => 'AppBundle\\Controller\\Backend\\RequirementPenaltyController::editAction',));
                    }

                    // backend_requirement_penalty_delete
                    if ('/backend/requirement/penalty/delete' === $pathinfo) {
                        return array (  '_controller' => 'AppBundle\\Controller\\Backend\\RequirementPenaltyController::requerimentPenaltyDelete',  '_route' => 'backend_requirement_penalty_delete',);
                    }

                }

                if (0 === strpos($pathinfo, '/backend/requirement/type')) {
                    // backend_requirement_type
                    if ('/backend/requirement/type' === $pathinfo) {
                        return array (  '_controller' => 'AppBundle\\Controller\\Backend\\RequirementTypeController::indexAction',  '_route' => 'backend_requirement_type',);
                    }

                    // backend_requirement_type_edit
                    if (0 === strpos($pathinfo, '/backend/requirement/type/edit') && preg_match('#^/backend/requirement/type/edit/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'backend_requirement_type_edit')), array (  '_controller' => 'AppBundle\\Controller\\Backend\\RequirementTypeController::editAction',));
                    }

                    // backend_requirement_type_delete
                    if ('/backend/requirement/type/delete' === $pathinfo) {
                        return array (  '_controller' => 'AppBundle\\Controller\\Backend\\RequirementTypeController::requerimentTypeDelete',  '_route' => 'backend_requirement_type_delete',);
                    }

                }

            }

            if (0 === strpos($pathinfo, '/backend/service')) {
                // backend_service
                if ('/backend/service' === $pathinfo) {
                    return array (  '_controller' => 'AppBundle\\Controller\\Backend\\ServiceController::indexAction',  '_route' => 'backend_service',);
                }

                // backend_service_edit
                if (0 === strpos($pathinfo, '/backend/service/edit') && preg_match('#^/backend/service/edit/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'backend_service_edit')), array (  '_controller' => 'AppBundle\\Controller\\Backend\\ServiceController::editAction',));
                }

                // backend_service_delete
                if ('/backend/service/delete' === $pathinfo) {
                    return array (  '_controller' => 'AppBundle\\Controller\\Backend\\ServiceController::serviceDelete',  '_route' => 'backend_service_delete',);
                }

            }

            if (0 === strpos($pathinfo, '/backend/user')) {
                // backend_user
                if ('/backend/user' === $pathinfo) {
                    return array (  '_controller' => 'AppBundle\\Controller\\Backend\\UserController::indexAction',  '_route' => 'backend_user',);
                }

                // backend_user_edit
                if (0 === strpos($pathinfo, '/backend/user/edit') && preg_match('#^/backend/user/edit/(?P<id>\\d+)$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'backend_user_edit')), array (  '_controller' => 'AppBundle\\Controller\\Backend\\UserController::editAction',));
                }

                // backend_user_delete
                if (0 === strpos($pathinfo, '/backend/user/delete') && preg_match('#^/backend/user/delete/(?P<id>\\d+)$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'backend_user_delete')), array (  '_controller' => 'AppBundle\\Controller\\Backend\\UserController::deleteAction',));
                }

                if (0 === strpos($pathinfo, '/backend/user-role')) {
                    if (0 === strpos($pathinfo, '/backend/user-roles')) {
                        // backend_user_roles
                        if ('/backend/user-roles' === $pathinfo) {
                            return array (  '_controller' => 'AppBundle\\Controller\\Backend\\UserRoleController::indexAction',  '_route' => 'backend_user_roles',);
                        }

                        // backend_user_roles_edit
                        if (preg_match('#^/backend/user\\-roles/(?P<roleId>[^/]++)$#sD', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'backend_user_roles_edit')), array (  '_controller' => 'AppBundle\\Controller\\Backend\\UserRoleController::editAction',));
                        }

                        // backend_user_roles_delete
                        if (0 === strpos($pathinfo, '/backend/user-roles/delete') && preg_match('#^/backend/user\\-roles/delete/(?P<roleId>[^/]++)$#sD', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'backend_user_roles_delete')), array (  '_controller' => 'AppBundle\\Controller\\Backend\\UserRoleController::deleteAction',));
                        }

                    }

                    if (0 === strpos($pathinfo, '/backend/user-role-permission')) {
                        // backend_user_role_permission
                        if (preg_match('#^/backend/user\\-role\\-permission/(?P<roleId>[^/]++)$#sD', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'backend_user_role_permission')), array (  '_controller' => 'AppBundle\\Controller\\Backend\\UserRolePermissionController::indexAction',));
                        }

                        // backend_user_role_permission_edit
                        if (0 === strpos($pathinfo, '/backend/user-role-permission/edit') && preg_match('#^/backend/user\\-role\\-permission/edit/(?P<roleId>[^/]++)/(?P<rolePmId>[^/]++)$#sD', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'backend_user_role_permission_edit')), array (  '_controller' => 'AppBundle\\Controller\\Backend\\UserRolePermissionController::editAction',));
                        }

                        // backend_user_role_permission_delete
                        if (0 === strpos($pathinfo, '/backend/user-role-permission/delete') && preg_match('#^/backend/user\\-role\\-permission/delete/(?P<roleId>[^/]++)/(?P<rolePmId>[^/]++)$#sD', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'backend_user_role_permission_delete')), array (  '_controller' => 'AppBundle\\Controller\\Backend\\UserRolePermissionController::deleteAction',));
                        }

                    }

                }

            }

        }

        if (0 === strpos($pathinfo, '/ws')) {
            // /ws/set-products-cart
            if ('/ws/set-products-cart' === $pathinfo) {
                return array (  '_controller' => 'AppBundle\\Controller\\Webservice\\WebserviceController::setProductsCart',  '_route' => '/ws/set-products-cart',);
            }

            // /ws/get-service-menu
            if ('/ws/get-service-menu' === $pathinfo) {
                return array (  '_controller' => 'AppBundle\\Controller\\Webservice\\WebserviceController::getServiceMnu',  '_route' => '/ws/get-service-menu',);
            }

            // /ws/set-update-selfi
            if ('/ws/set-update-selfi' === $pathinfo) {
                return array (  '_controller' => 'AppBundle\\Controller\\Webservice\\WebserviceController::setUpdateSelfi',  '_route' => '/ws/set-update-selfi',);
            }

            if (0 === strpos($pathinfo, '/ws/get-')) {
                // /ws/get-passwd-app
                if ('/ws/get-passwd-app' === $pathinfo) {
                    return array (  '_controller' => 'AppBundle\\Controller\\Webservice\\WebserviceController::getPasswdApp',  '_route' => '/ws/get-passwd-app',);
                }

                // /ws/get-search-client
                if ('/ws/get-search-client' === $pathinfo) {
                    return array (  '_controller' => 'AppBundle\\Controller\\Webservice\\WebserviceController::getSearchClient',  '_route' => '/ws/get-search-client',);
                }

            }

            // /ws/set-delete-service
            if ('/ws/set-delete-service' === $pathinfo) {
                return array (  '_controller' => 'AppBundle\\Controller\\Webservice\\WebserviceController::setDeleteService',  '_route' => '/ws/set-delete-service',);
            }

            if (0 === strpos($pathinfo, '/ws/get-')) {
                // /ws/get-professional-payment-list
                if ('/ws/get-professional-payment-list' === $pathinfo) {
                    return array (  '_controller' => 'AppBundle\\Controller\\Webservice\\WebserviceController::getProfessionalPaymentList',  '_route' => '/ws/get-professional-payment-list',);
                }

                if (0 === strpos($pathinfo, '/ws/get-general-report-')) {
                    // /ws/get-general-report-range-detail
                    if ('/ws/get-general-report-range-detail' === $pathinfo) {
                        return array (  '_controller' => 'AppBundle\\Controller\\Webservice\\WebserviceController::getGeneralReportRangeDetail',  '_route' => '/ws/get-general-report-range-detail',);
                    }

                    // /ws/get-general-report-detail
                    if ('/ws/get-general-report-detail' === $pathinfo) {
                        return array (  '_controller' => 'AppBundle\\Controller\\Webservice\\WebserviceController::getGeneralReportDetail',  '_route' => '/ws/get-general-report-detail',);
                    }

                }

                if (0 === strpos($pathinfo, '/ws/get-summary-general-report')) {
                    // /ws/get-summary-general-report-range
                    if ('/ws/get-summary-general-report-range' === $pathinfo) {
                        return array (  '_controller' => 'AppBundle\\Controller\\Webservice\\WebserviceController::getSummaryGeneralReportRange',  '_route' => '/ws/get-summary-general-report-range',);
                    }

                    // /ws/get-summary-general-report
                    if ('/ws/get-summary-general-report' === $pathinfo) {
                        return array (  '_controller' => 'AppBundle\\Controller\\Webservice\\WebserviceController::getSummaryGeneralReport',  '_route' => '/ws/get-summary-general-report',);
                    }

                }

            }

            // /ws/set-change-professional
            if ('/ws/set-change-professional' === $pathinfo) {
                return array (  '_controller' => 'AppBundle\\Controller\\Webservice\\WebserviceController::setChangeProfessional',  '_route' => '/ws/set-change-professional',);
            }

            // /ws/get-prof-payment
            if ('/ws/get-prof-payment' === $pathinfo) {
                return array (  '_controller' => 'AppBundle\\Controller\\Webservice\\WebserviceController::getProflPayment',  '_route' => '/ws/get-prof-payment',);
            }

            // /ws/set-pay-balance
            if ('/ws/set-pay-balance' === $pathinfo) {
                return array (  '_controller' => 'AppBundle\\Controller\\Webservice\\WebserviceController::setPayBalance',  '_route' => '/ws/set-pay-balance',);
            }

            if (0 === strpos($pathinfo, '/ws/get-')) {
                // /ws/get-balance-professional
                if ('/ws/get-balance-professional' === $pathinfo) {
                    return array (  '_controller' => 'AppBundle\\Controller\\Webservice\\WebserviceController::getBalanceProfessional',  '_route' => '/ws/get-balance-professional',);
                }

                // /ws/get-order-product
                if ('/ws/get-order-product' === $pathinfo) {
                    return array (  '_controller' => 'AppBundle\\Controller\\Webservice\\WebserviceController::getOrderProduct',  '_route' => '/ws/get-order-product',);
                }

                // /ws/get-list-services-done
                if ('/ws/get-list-services-done' === $pathinfo) {
                    return array (  '_controller' => 'AppBundle\\Controller\\Webservice\\WebserviceController::getListServiceDone',  '_route' => '/ws/get-list-services-done',);
                }

            }

            if (0 === strpos($pathinfo, '/ws/set-')) {
                // /ws/set-edit-product
                if ('/ws/set-edit-product' === $pathinfo) {
                    return array (  '_controller' => 'AppBundle\\Controller\\Webservice\\WebserviceController::setEditProduct',  '_route' => '/ws/set-edit-product',);
                }

                // /ws/set-menu-product-new
                if ('/ws/set-menu-product-new' === $pathinfo) {
                    return array (  '_controller' => 'AppBundle\\Controller\\Webservice\\WebserviceController::setMenuProductNew',  '_route' => '/ws/set-menu-product-new',);
                }

                // /ws/set-delete-product
                if ('/ws/set-delete-product' === $pathinfo) {
                    return array (  '_controller' => 'AppBundle\\Controller\\Webservice\\WebserviceController::setDeleteProduct',  '_route' => '/ws/set-delete-product',);
                }

                // /ws/set-edit-profesional
                if ('/ws/set-edit-profesional' === $pathinfo) {
                    return array (  '_controller' => 'AppBundle\\Controller\\Webservice\\WebserviceController::setEditProfesional',  '_route' => '/ws/set-edit-profesional',);
                }

                if (0 === strpos($pathinfo, '/ws/set-delete-')) {
                    // /ws/set-delete-profesional
                    if ('/ws/set-delete-profesional' === $pathinfo) {
                        return array (  '_controller' => 'AppBundle\\Controller\\Webservice\\WebserviceController::setDeleteProfesional',  '_route' => '/ws/set-delete-profesional',);
                    }

                    // /ws/set-delete-menu
                    if ('/ws/set-delete-menu' === $pathinfo) {
                        return array (  '_controller' => 'AppBundle\\Controller\\Webservice\\WebserviceController::setDeleteMenu',  '_route' => '/ws/set-delete-menu',);
                    }

                }

                // /ws/set-edit-menu
                if ('/ws/set-edit-menu' === $pathinfo) {
                    return array (  '_controller' => 'AppBundle\\Controller\\Webservice\\WebserviceController::setEditServiceNew',  '_route' => '/ws/set-edit-menu',);
                }

                // /ws/set-menu-profesional-new
                if ('/ws/set-menu-profesional-new' === $pathinfo) {
                    return array (  '_controller' => 'AppBundle\\Controller\\Webservice\\WebserviceController::setMenuProfesionalNew',  '_route' => '/ws/set-menu-profesional-new',);
                }

            }

            // /ws/get-get-list-profesional
            if ('/ws/get-list-profesional' === $pathinfo) {
                return array (  '_controller' => 'AppBundle\\Controller\\Webservice\\WebserviceController::getListProfesional',  '_route' => '/ws/get-get-list-profesional',);
            }

            // /ws/set-menu-service-new
            if ('/ws/set-menu-service-new' === $pathinfo) {
                return array (  '_controller' => 'AppBundle\\Controller\\Webservice\\WebserviceController::setMenuServiceNew',  '_route' => '/ws/set-menu-service-new',);
            }

            if (0 === strpos($pathinfo, '/ws/get-')) {
                if (0 === strpos($pathinfo, '/ws/get-list-')) {
                    // /ws/get-list-services
                    if ('/ws/get-list-services' === $pathinfo) {
                        return array (  '_controller' => 'AppBundle\\Controller\\Webservice\\WebserviceController::getListServices',  '_route' => '/ws/get-list-services',);
                    }

                    // /ws/get-list-product
                    if ('/ws/get-list-product' === $pathinfo) {
                        return array (  '_controller' => 'AppBundle\\Controller\\Webservice\\WebserviceController::getListProduct',  '_route' => '/ws/get-list-product',);
                    }

                }

                if (0 === strpos($pathinfo, '/ws/get-menu')) {
                    // /ws/get-menu-professional
                    if ('/ws/get-menu-professional' === $pathinfo) {
                        return array (  '_controller' => 'AppBundle\\Controller\\Webservice\\WebserviceController::getMenuProfessional',  '_route' => '/ws/get-menu-professional',);
                    }

                    // /ws/get-menus
                    if ('/ws/get-menus' === $pathinfo) {
                        return array (  '_controller' => 'AppBundle\\Controller\\Webservice\\WebserviceController::getMenus',  '_route' => '/ws/get-menus',);
                    }

                }

            }

            // /ws/validate-client
            if ('/ws/validate-client' === $pathinfo) {
                return array (  '_controller' => 'AppBundle\\Controller\\Webservice\\WebserviceController::validateClient',  '_route' => '/ws/validate-client',);
            }

            // /ws/create-services
            if ('/ws/create-services' === $pathinfo) {
                return array (  '_controller' => 'AppBundle\\Controller\\Webservice\\WebserviceController::createServices',  '_route' => '/ws/create-services',);
            }

            // /ws/get-client
            if ('/ws/get-client' === $pathinfo) {
                return array (  '_controller' => 'AppBundle\\Controller\\Webservice\\WebserviceController::getClient',  '_route' => '/ws/get-client',);
            }

            if (0 === strpos($pathinfo, '/ws/set-')) {
                // /ws/set-start-service
                if ('/ws/set-start-service' === $pathinfo) {
                    return array (  '_controller' => 'AppBundle\\Controller\\Webservice\\WebserviceController::setStartService',  '_route' => '/ws/set-start-service',);
                }

                // /ws/set-end-service
                if ('/ws/set-end-service' === $pathinfo) {
                    return array (  '_controller' => 'AppBundle\\Controller\\Webservice\\WebserviceController::setEndtService',  '_route' => '/ws/set-end-service',);
                }

                // /ws/set-cancel-service
                if ('/ws/set-cancel-service' === $pathinfo) {
                    return array (  '_controller' => 'AppBundle\\Controller\\Webservice\\WebserviceController::setCanceltService',  '_route' => '/ws/set-cancel-service',);
                }

            }

            // /ws/update-service
            if ('/ws/update-service' === $pathinfo) {
                return array (  '_controller' => 'AppBundle\\Controller\\Webservice\\WebserviceController::setUpdatetService',  '_route' => '/ws/update-service',);
            }

            if (0 === strpos($pathinfo, '/ws/get-')) {
                if (0 === strpos($pathinfo, '/ws/get-r')) {
                    // /ws/get-random-professional
                    if ('/ws/get-random-professional' === $pathinfo) {
                        return array (  '_controller' => 'AppBundle\\Controller\\Webservice\\WebserviceController::getRandomProfessional',  '_route' => '/ws/get-random-professional',);
                    }

                    // /ws/get-report-day-prof
                    if ('/ws/get-report-day-prof' === $pathinfo) {
                        return array (  '_controller' => 'AppBundle\\Controller\\Webservice\\WebserviceController::getReportDayProf',  '_route' => '/ws/get-report-day-prof',);
                    }

                }

                if (0 === strpos($pathinfo, '/ws/get-client-payment')) {
                    // /ws/get-client-payment
                    if ('/ws/get-client-payment' === $pathinfo) {
                        return array (  '_controller' => 'AppBundle\\Controller\\Webservice\\WebserviceController::getClientPayment',  '_route' => '/ws/get-client-payment',);
                    }

                    // /ws/get-client-payment_old
                    if ('/ws/get-client-payment_old' === $pathinfo) {
                        return array (  '_controller' => 'AppBundle\\Controller\\Webservice\\WebserviceController::getClientPayment_old',  '_route' => '/ws/get-client-payment_old',);
                    }

                }

            }

            // /ws/set-complete-pay
            if ('/ws/set-complete-pay' === $pathinfo) {
                return array (  '_controller' => 'AppBundle\\Controller\\Webservice\\WebserviceController::setCompletePay',  '_route' => '/ws/set-complete-pay',);
            }

            if (0 === strpos($pathinfo, '/ws/get-professional-')) {
                // /ws/get-professional-pay
                if ('/ws/get-professional-pay' === $pathinfo) {
                    return array (  '_controller' => 'AppBundle\\Controller\\Webservice\\WebserviceController::getProfessionalPay',  '_route' => '/ws/get-professional-pay',);
                }

                // /ws/get-professional-report
                if ('/ws/get-professional-report' === $pathinfo) {
                    return array (  '_controller' => 'AppBundle\\Controller\\Webservice\\WebserviceController::getProfessionalReport',  '_route' => '/ws/get-professional-report',);
                }

            }

            // /ws/set-payout-professional
            if ('/ws/set-payout-professional' === $pathinfo) {
                return array (  '_controller' => 'AppBundle\\Controller\\Webservice\\WebserviceController::setPayoutProfessional',  '_route' => '/ws/set-payout-professional',);
            }

            // /ws/organizations
            if ('/ws/organizations' === $pathinfo) {
                return array (  '_controller' => 'AppBundle\\Controller\\Webservice\\WebserviceController::getOrganizations',  '_route' => '/ws/organizations',);
            }

            // /ws/pending
            if ('/ws/pending' === $pathinfo) {
                return array (  '_controller' => 'AppBundle\\Controller\\Webservice\\WebserviceController::getPending',  '_route' => '/ws/pending',);
            }

            if (0 === strpos($pathinfo, '/ws/c')) {
                // /ws/complete
                if ('/ws/complete' === $pathinfo) {
                    return array (  '_controller' => 'AppBundle\\Controller\\Webservice\\WebserviceController::getComplete',  '_route' => '/ws/complete',);
                }

                // /ws/changestatusinspection
                if ('/ws/changestatusinspection' === $pathinfo) {
                    return array (  '_controller' => 'AppBundle\\Controller\\Webservice\\WebserviceController::changeStatusInspection',  '_route' => '/ws/changestatusinspection',);
                }

            }

            // /ws/services
            if ('/ws/services' === $pathinfo) {
                return array (  '_controller' => 'AppBundle\\Controller\\Webservice\\WebserviceController::getServicesRequeriments',  '_route' => '/ws/services',);
            }

            // /ws/create-inspection
            if ('/ws/create-inspection' === $pathinfo) {
                return array (  '_controller' => 'AppBundle\\Controller\\Webservice\\WebserviceController::createInspection',  '_route' => '/ws/create-inspection',);
            }

            if (0 === strpos($pathinfo, '/ws/requirement')) {
                // /ws/requirement-type
                if ('/ws/requirement-type' === $pathinfo) {
                    return array (  '_controller' => 'AppBundle\\Controller\\Webservice\\WebserviceController::getRequirementType',  '_route' => '/ws/requirement-type',);
                }

                // /ws/requirements
                if ('/ws/requirements' === $pathinfo) {
                    return array (  '_controller' => 'AppBundle\\Controller\\Webservice\\WebserviceController::getRequirements',  '_route' => '/ws/requirements',);
                }

            }

            // /ws/updaterequirementslist
            if ('/ws/updaterequirementslist' === $pathinfo) {
                return array (  '_controller' => 'AppBundle\\Controller\\Webservice\\WebserviceController::updateRequiremtsList',  '_route' => '/ws/updaterequirementslist',);
            }

            if (0 === strpos($pathinfo, '/ws/s')) {
                // /ws/setitemrequirement
                if ('/ws/setitemrequirement' === $pathinfo) {
                    return array (  '_controller' => 'AppBundle\\Controller\\Webservice\\WebserviceController::setItemRequirement',  '_route' => '/ws/setitemrequirement',);
                }

                // /ws/savecommets
                if ('/ws/savecommets' === $pathinfo) {
                    return array (  '_controller' => 'AppBundle\\Controller\\Webservice\\WebserviceController::saveCommets',  '_route' => '/ws/savecommets',);
                }

            }

            if (0 === strpos($pathinfo, '/ws/ge')) {
                // /ws/generatesummary
                if ('/ws/generatesummary' === $pathinfo) {
                    return array (  '_controller' => 'AppBundle\\Controller\\Webservice\\WebserviceController::generateSummary',  '_route' => '/ws/generatesummary',);
                }

                if (0 === strpos($pathinfo, '/ws/get')) {
                    // /ws/getlistreqcomplete
                    if ('/ws/getlistreqcomplete' === $pathinfo) {
                        return array (  '_controller' => 'AppBundle\\Controller\\Webservice\\WebserviceController::getListReqComplete',  '_route' => '/ws/getlistreqcomplete',);
                    }

                    // /ws/getcompleteitemdetail
                    if ('/ws/getcompleteitemdetail' === $pathinfo) {
                        return array (  '_controller' => 'AppBundle\\Controller\\Webservice\\WebserviceController::getCompleteItemDetail',  '_route' => '/ws/getcompleteitemdetail',);
                    }

                }

            }

            // /ws/check_user
            if ('/ws/check_user' === $pathinfo) {
                return array (  '_controller' => 'AppBundle\\Controller\\Webservice\\WebserviceController::checkUserAction',  '_route' => '/ws/check_user',);
            }

            // /ws/prueba
            if ('/ws/prueba' === $pathinfo) {
                return array (  '_controller' => 'AppBundle\\Controller\\Webservice\\WebserviceController::prueba',  '_route' => '/ws/prueba',);
            }

            // /ws/upload-file
            if ('/ws/upload-file' === $pathinfo) {
                return array (  '_controller' => 'AppBundle\\Controller\\Webservice\\WebserviceController::uploadAction',  '_route' => '/ws/upload-file',);
            }

            // /ws/get-files
            if ('/ws/get-files' === $pathinfo) {
                return array (  '_controller' => 'AppBundle\\Controller\\Webservice\\WebserviceController::getFilesAction',  '_route' => '/ws/get-files',);
            }

            // /ws/d-file
            if ('/ws/d-file' === $pathinfo) {
                return array (  '_controller' => 'AppBundle\\Controller\\Webservice\\WebserviceController::deleteFileAction',  '_route' => '/ws/d-file',);
            }

        }

        // homepage_index
        if ('' === rtrim($pathinfo, '/')) {
            if ('/' === substr($pathinfo, -1)) {
                // no-op
            } elseif (!in_array($this->context->getMethod(), array('HEAD', 'GET'))) {
                goto not_homepage_index;
            } else {
                return $this->redirect($rawPathinfo.'/', 'homepage_index');
            }

            return array (  '_controller' => 'AppBundle\\Controller\\Website\\IndexController::indexAction',  '_route' => 'homepage_index',);
        }
        not_homepage_index:

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
