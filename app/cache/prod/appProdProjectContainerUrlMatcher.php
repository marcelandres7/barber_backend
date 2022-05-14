<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appProdProjectContainerUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
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
