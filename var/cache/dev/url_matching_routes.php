<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/briefApi/logged' => [[['_route' => '_api_/logged_get_collection', '_controller' => 'App\\Controller\\LoggedUserController', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\User', '_api_operation_name' => '_api_/logged_get_collection'], null, ['GET' => 0], null, false, false, null]],
        '/briefApi/token/refresh' => [
            [['_route' => 'gesdinet_jwt_refresh_token'], null, null, null, false, false, null],
            [['_route' => 'api_refresh_token'], null, null, null, false, false, null],
        ],
        '/briefApi/clearRefreshToken' => [[['_route' => 'clear_refresh_token', '_controller' => 'App\\Controller\\CallMessageClearRefreshTokenController::sendMessage'], null, ['GET' => 0], null, false, false, null]],
        '/docusign' => [[['_route' => 'app_docusign', '_controller' => 'App\\Controller\\DocusignController::index'], null, null, null, false, false, null]],
        '/generatePixel' => [[['_route' => 'app_pixel_generator', '_controller' => 'App\\Controller\\PixelGeneratorController::generatePixel'], null, ['POST' => 0], null, false, false, null]],
        '/briefApi/login_check' => [[['_route' => 'app_security', '_controller' => 'App\\Controller\\SecurityController::index'], null, null, null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/briefApi(?'
                    .'|/\\.well\\-known/genid/([^/]++)(*:48)'
                    .'|(?:/(index)(?:\\.([^/]++))?)?(*:83)'
                    .'|/(?'
                        .'|docs(?:\\.([^/]++))?(*:113)'
                        .'|co(?'
                            .'|ntexts/([^.]+)(?:\\.(jsonld))?(*:155)'
                            .'|mpanies(?'
                                .'|(?:\\.([^/]++))?(*:188)'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(*:222)'
                                .'|(?:\\.([^/]++))?(*:245)'
                                .'|/(?'
                                    .'|([^/\\.]++)(?:\\.([^/]++))?(?'
                                        .'|(*:285)'
                                    .')'
                                    .'|([^/]++)(*:302)'
                                .')'
                            .')'
                        .')'
                        .'|errors/([^/]++)(?'
                            .'|(*:331)'
                        .')'
                        .'|validation_errors/([^/]++)(?'
                            .'|(*:369)'
                        .')'
                        .'|b(?'
                            .'|rieves(?'
                                .'|(?:\\.([^/]++))?(*:406)'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(*:440)'
                                .'|(?:\\.([^/]++))?(*:463)'
                                .'|(*:471)'
                            .')'
                            .'|usiness_models(?'
                                .'|(?:\\.([^/]++))?(*:512)'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(*:546)'
                                .'|(?:\\.([^/]++))?(*:569)'
                            .')'
                        .')'
                        .'|projects(?'
                            .'|(?:\\.([^/]++))?(*:605)'
                            .'|/([^/\\.]++)(?:\\.([^/]++))?(*:639)'
                        .')'
                        .'|refresh_tokens/([^/\\.]++)(?:\\.([^/]++))?(*:688)'
                        .'|targets(?'
                            .'|(?:\\.([^/]++))?(*:721)'
                            .'|/([^/\\.]++)(?:\\.([^/]++))?(*:755)'
                            .'|(?:\\.([^/]++))?(*:778)'
                        .')'
                        .'|users(?'
                            .'|(?:\\.([^/]++))?(*:810)'
                            .'|/([^/\\.]++)(?:\\.([^/]++))?(*:844)'
                            .'|(?:\\.([^/]++))?(*:867)'
                            .'|_roles(?'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(*:910)'
                                .'|(?:\\.([^/]++))?(*:933)'
                            .')'
                        .')'
                    .')'
                .')'
                .'|/_error/(\\d+)(?:\\.([^/]++))?(*:973)'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        48 => [[['_route' => 'api_genid', '_controller' => 'api_platform.action.not_exposed', '_api_respond' => 'true'], ['id'], null, null, false, true, null]],
        83 => [[['_route' => 'api_entrypoint', '_controller' => 'api_platform.action.entrypoint', '_format' => '', '_api_respond' => 'true', 'index' => 'index'], ['index', '_format'], null, null, false, true, null]],
        113 => [[['_route' => 'api_doc', '_controller' => 'api_platform.action.documentation', '_format' => '', '_api_respond' => 'true'], ['_format'], null, null, false, true, null]],
        155 => [[['_route' => 'api_jsonld_context', '_controller' => 'api_platform.jsonld.action.context', '_format' => 'jsonld', '_api_respond' => 'true'], ['shortName', '_format'], null, null, false, true, null]],
        188 => [[['_route' => '_api_/companies{._format}_post', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Company', '_api_operation_name' => '_api_/companies{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null]],
        222 => [[['_route' => '_api_/companies/{id}{._format}_get', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Company', '_api_operation_name' => '_api_/companies/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        245 => [[['_route' => '_api_/companies{._format}_get_collection', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Company', '_api_operation_name' => '_api_/companies{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null]],
        285 => [
            [['_route' => '_api_/companies/{id}{._format}_patch', '_controller' => 'App\\Controller\\Company\\PatchCompanyController', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Company', '_api_operation_name' => '_api_/companies/{id}{._format}_patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
            [['_route' => '_api_/companies/{id}{._format}_delete', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Company', '_api_operation_name' => '_api_/companies/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        302 => [[['_route' => 'app_patch_company', '_controller' => 'App\\Controller\\Company\\PatchCompanyController::index'], ['id'], null, null, false, true, null]],
        331 => [
            [['_route' => '_api_errors_problem', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'ApiPlatform\\State\\ApiResource\\Error', '_api_operation_name' => '_api_errors_problem'], ['status'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_errors_hydra', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'ApiPlatform\\State\\ApiResource\\Error', '_api_operation_name' => '_api_errors_hydra'], ['status'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_errors_jsonapi', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'ApiPlatform\\State\\ApiResource\\Error', '_api_operation_name' => '_api_errors_jsonapi'], ['status'], ['GET' => 0], null, false, true, null],
        ],
        369 => [
            [['_route' => '_api_validation_errors_problem', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'ApiPlatform\\Symfony\\Validator\\Exception\\ValidationException', '_api_operation_name' => '_api_validation_errors_problem'], ['id'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_validation_errors_hydra', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'ApiPlatform\\Symfony\\Validator\\Exception\\ValidationException', '_api_operation_name' => '_api_validation_errors_hydra'], ['id'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_validation_errors_jsonapi', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'ApiPlatform\\Symfony\\Validator\\Exception\\ValidationException', '_api_operation_name' => '_api_validation_errors_jsonapi'], ['id'], ['GET' => 0], null, false, true, null],
        ],
        406 => [[['_route' => '_api_/brieves{._format}_post', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Brief', '_api_operation_name' => '_api_/brieves{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null]],
        440 => [[['_route' => '_api_/brieves/{id}{._format}_get', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Brief', '_api_operation_name' => '_api_/brieves/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        463 => [[['_route' => '_api_/brieves{._format}_get_collection', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Brief', '_api_operation_name' => '_api_/brieves{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null]],
        471 => [[['_route' => 'app_brief', '_controller' => 'App\\Controller\\BriefController::createBrief'], [], ['POST' => 0], null, false, false, null]],
        512 => [[['_route' => '_api_/business_models{._format}_post', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\BusinessModel', '_api_operation_name' => '_api_/business_models{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null]],
        546 => [[['_route' => '_api_/business_models/{id}{._format}_get', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\BusinessModel', '_api_operation_name' => '_api_/business_models/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        569 => [[['_route' => '_api_/business_models{._format}_get_collection', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\BusinessModel', '_api_operation_name' => '_api_/business_models{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null]],
        605 => [[['_route' => '_api_/projects{._format}_post', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Project', '_api_operation_name' => '_api_/projects{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null]],
        639 => [[['_route' => '_api_/projects/{id}{._format}_get', '_controller' => 'api_platform.action.not_exposed', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Project', '_api_operation_name' => '_api_/projects/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        688 => [[['_route' => '_api_/refresh_tokens/{id}{._format}_get', '_controller' => 'App\\Controller\\CallMessageClearRefreshTokenController', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\RefreshToken', '_api_operation_name' => '_api_/refresh_tokens/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        721 => [[['_route' => '_api_/targets{._format}_post', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Target', '_api_operation_name' => '_api_/targets{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null]],
        755 => [[['_route' => '_api_/targets/{id}{._format}_get', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Target', '_api_operation_name' => '_api_/targets/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        778 => [[['_route' => '_api_/targets{._format}_get_collection', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Target', '_api_operation_name' => '_api_/targets{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null]],
        810 => [[['_route' => '_api_/users{._format}_post', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\User', '_api_operation_name' => '_api_/users{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null]],
        844 => [[['_route' => '_api_/users/{id}{._format}_get', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\User', '_api_operation_name' => '_api_/users/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        867 => [[['_route' => '_api_/users{._format}_get_collection', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\User', '_api_operation_name' => '_api_/users{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null]],
        910 => [[['_route' => '_api_/users_roles/{id}{._format}_get', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\UsersRole', '_api_operation_name' => '_api_/users_roles/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        933 => [[['_route' => '_api_/users_roles{._format}_get_collection', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\UsersRole', '_api_operation_name' => '_api_/users_roles{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null]],
        973 => [
            [['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];