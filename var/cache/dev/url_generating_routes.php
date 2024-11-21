<?php

// This file has been auto-generated by the Symfony Routing Component.

return [
    'api_genid' => [['id'], ['_controller' => 'api_platform.action.not_exposed', '_api_respond' => 'true'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/briefApi/.well-known/genid']], [], [], []],
    'api_entrypoint' => [['index', '_format'], ['_controller' => 'api_platform.action.entrypoint', '_format' => '', '_api_respond' => 'true', 'index' => 'index'], ['index' => 'index'], [['variable', '.', '[^/]++', '_format', true], ['variable', '/', 'index', 'index', true], ['text', '/briefApi']], [], [], []],
    'api_doc' => [['_format'], ['_controller' => 'api_platform.action.documentation', '_format' => '', '_api_respond' => 'true'], [], [['variable', '.', '[^/]++', '_format', true], ['text', '/briefApi/docs']], [], [], []],
    'api_jsonld_context' => [['shortName', '_format'], ['_controller' => 'api_platform.jsonld.action.context', '_format' => 'jsonld', '_api_respond' => 'true'], ['shortName' => '[^.]+', '_format' => 'jsonld'], [['variable', '.', 'jsonld', '_format', true], ['variable', '/', '[^.]+', 'shortName', true], ['text', '/briefApi/contexts']], [], [], []],
    '_api_errors_problem' => [['status'], ['_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'ApiPlatform\\State\\ApiResource\\Error', '_api_operation_name' => '_api_errors_problem'], [], [['variable', '/', '[^/]++', 'status', true], ['text', '/briefApi/errors']], [], [], []],
    '_api_errors_hydra' => [['status'], ['_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'ApiPlatform\\State\\ApiResource\\Error', '_api_operation_name' => '_api_errors_hydra'], [], [['variable', '/', '[^/]++', 'status', true], ['text', '/briefApi/errors']], [], [], []],
    '_api_errors_jsonapi' => [['status'], ['_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'ApiPlatform\\State\\ApiResource\\Error', '_api_operation_name' => '_api_errors_jsonapi'], [], [['variable', '/', '[^/]++', 'status', true], ['text', '/briefApi/errors']], [], [], []],
    '_api_validation_errors_problem' => [['id'], ['_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'ApiPlatform\\Symfony\\Validator\\Exception\\ValidationException', '_api_operation_name' => '_api_validation_errors_problem'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/briefApi/validation_errors']], [], [], []],
    '_api_validation_errors_hydra' => [['id'], ['_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'ApiPlatform\\Symfony\\Validator\\Exception\\ValidationException', '_api_operation_name' => '_api_validation_errors_hydra'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/briefApi/validation_errors']], [], [], []],
    '_api_validation_errors_jsonapi' => [['id'], ['_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'ApiPlatform\\Symfony\\Validator\\Exception\\ValidationException', '_api_operation_name' => '_api_validation_errors_jsonapi'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/briefApi/validation_errors']], [], [], []],
    '_api_/brieves{._format}_post' => [['_format'], ['_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Brief', '_api_operation_name' => '_api_/brieves{._format}_post'], [], [['variable', '.', '[^/]++', '_format', true], ['text', '/briefApi/brieves']], [], [], []],
    '_api_/brieves/{id}{._format}_get' => [['id', '_format'], ['_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Brief', '_api_operation_name' => '_api_/brieves/{id}{._format}_get'], [], [['variable', '.', '[^/]++', '_format', true], ['variable', '/', '[^/\\.]++', 'id', true], ['text', '/briefApi/brieves']], [], [], []],
    '_api_/brieves{._format}_get_collection' => [['_format'], ['_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Brief', '_api_operation_name' => '_api_/brieves{._format}_get_collection'], [], [['variable', '.', '[^/]++', '_format', true], ['text', '/briefApi/brieves']], [], [], []],
    '_api_/business_models{._format}_post' => [['_format'], ['_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\BusinessModel', '_api_operation_name' => '_api_/business_models{._format}_post'], [], [['variable', '.', '[^/]++', '_format', true], ['text', '/briefApi/business_models']], [], [], []],
    '_api_/business_models/{id}{._format}_get' => [['id', '_format'], ['_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\BusinessModel', '_api_operation_name' => '_api_/business_models/{id}{._format}_get'], [], [['variable', '.', '[^/]++', '_format', true], ['variable', '/', '[^/\\.]++', 'id', true], ['text', '/briefApi/business_models']], [], [], []],
    '_api_/business_models{._format}_get_collection' => [['_format'], ['_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\BusinessModel', '_api_operation_name' => '_api_/business_models{._format}_get_collection'], [], [['variable', '.', '[^/]++', '_format', true], ['text', '/briefApi/business_models']], [], [], []],
    '_api_/companies{._format}_post' => [['_format'], ['_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Company', '_api_operation_name' => '_api_/companies{._format}_post'], [], [['variable', '.', '[^/]++', '_format', true], ['text', '/briefApi/companies']], [], [], []],
    '_api_/companies/{id}{._format}_get' => [['id', '_format'], ['_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Company', '_api_operation_name' => '_api_/companies/{id}{._format}_get'], [], [['variable', '.', '[^/]++', '_format', true], ['variable', '/', '[^/\\.]++', 'id', true], ['text', '/briefApi/companies']], [], [], []],
    '_api_/companies{._format}_get_collection' => [['_format'], ['_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Company', '_api_operation_name' => '_api_/companies{._format}_get_collection'], [], [['variable', '.', '[^/]++', '_format', true], ['text', '/briefApi/companies']], [], [], []],
    '_api_/companies/{id}{._format}_patch' => [['id', '_format'], ['_controller' => 'App\\Controller\\Company\\PatchCompanyController', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Company', '_api_operation_name' => '_api_/companies/{id}{._format}_patch'], [], [['variable', '.', '[^/]++', '_format', true], ['variable', '/', '[^/\\.]++', 'id', true], ['text', '/briefApi/companies']], [], [], []],
    '_api_/companies/{id}{._format}_delete' => [['id', '_format'], ['_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Company', '_api_operation_name' => '_api_/companies/{id}{._format}_delete'], [], [['variable', '.', '[^/]++', '_format', true], ['variable', '/', '[^/\\.]++', 'id', true], ['text', '/briefApi/companies']], [], [], []],
    '_api_/leverage_get_collection' => [[], ['_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Leverage', '_api_operation_name' => '_api_/leverage_get_collection'], [], [['text', '/briefApi/leverage']], [], [], []],
    '_api_/leverages/{id}{._format}_get' => [['id', '_format'], ['_controller' => 'api_platform.action.not_exposed', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Leverage', '_api_operation_name' => '_api_/leverages/{id}{._format}_get'], [], [['variable', '.', '[^/]++', '_format', true], ['variable', '/', '[^/\\.]++', 'id', true], ['text', '/briefApi/leverages']], [], [], []],
    '_api_/projects{._format}_post' => [['_format'], ['_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Project', '_api_operation_name' => '_api_/projects{._format}_post'], [], [['variable', '.', '[^/]++', '_format', true], ['text', '/briefApi/projects']], [], [], []],
    '_api_/projects/{id}{._format}_get' => [['id', '_format'], ['_controller' => 'api_platform.action.not_exposed', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Project', '_api_operation_name' => '_api_/projects/{id}{._format}_get'], [], [['variable', '.', '[^/]++', '_format', true], ['variable', '/', '[^/\\.]++', 'id', true], ['text', '/briefApi/projects']], [], [], []],
    '_api_/refresh_tokens/{id}{._format}_get' => [['id', '_format'], ['_controller' => 'App\\Controller\\CallMessageClearRefreshTokenController', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\RefreshToken', '_api_operation_name' => '_api_/refresh_tokens/{id}{._format}_get'], [], [['variable', '.', '[^/]++', '_format', true], ['variable', '/', '[^/\\.]++', 'id', true], ['text', '/briefApi/refresh_tokens']], [], [], []],
    '_api_/roles_companies/{id}{._format}_get' => [['id', '_format'], ['_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\RolesCompany', '_api_operation_name' => '_api_/roles_companies/{id}{._format}_get'], [], [['variable', '.', '[^/]++', '_format', true], ['variable', '/', '[^/\\.]++', 'id', true], ['text', '/briefApi/roles_companies']], [], [], []],
    '_api_/roles_companies{._format}_get_collection' => [['_format'], ['_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\RolesCompany', '_api_operation_name' => '_api_/roles_companies{._format}_get_collection'], [], [['variable', '.', '[^/]++', '_format', true], ['text', '/briefApi/roles_companies']], [], [], []],
    '_api_/status_get_collection' => [[], ['_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Status', '_api_operation_name' => '_api_/status_get_collection'], [], [['text', '/briefApi/status']], [], [], []],
    '_api_/statuses/{id}{._format}_get' => [['id', '_format'], ['_controller' => 'api_platform.action.not_exposed', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Status', '_api_operation_name' => '_api_/statuses/{id}{._format}_get'], [], [['variable', '.', '[^/]++', '_format', true], ['variable', '/', '[^/\\.]++', 'id', true], ['text', '/briefApi/statuses']], [], [], []],
    '_api_/targets{._format}_post' => [['_format'], ['_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Target', '_api_operation_name' => '_api_/targets{._format}_post'], [], [['variable', '.', '[^/]++', '_format', true], ['text', '/briefApi/targets']], [], [], []],
    '_api_/targets/{id}{._format}_get' => [['id', '_format'], ['_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Target', '_api_operation_name' => '_api_/targets/{id}{._format}_get'], [], [['variable', '.', '[^/]++', '_format', true], ['variable', '/', '[^/\\.]++', 'id', true], ['text', '/briefApi/targets']], [], [], []],
    '_api_/targets{._format}_get_collection' => [['_format'], ['_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Target', '_api_operation_name' => '_api_/targets{._format}_get_collection'], [], [['variable', '.', '[^/]++', '_format', true], ['text', '/briefApi/targets']], [], [], []],
    '_api_/users{._format}_post' => [['_format'], ['_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\User', '_api_operation_name' => '_api_/users{._format}_post'], [], [['variable', '.', '[^/]++', '_format', true], ['text', '/briefApi/users']], [], [], []],
    '_api_/users/{id}{._format}_get' => [['id', '_format'], ['_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\User', '_api_operation_name' => '_api_/users/{id}{._format}_get'], [], [['variable', '.', '[^/]++', '_format', true], ['variable', '/', '[^/\\.]++', 'id', true], ['text', '/briefApi/users']], [], [], []],
    '_api_/users{._format}_get_collection' => [['_format'], ['_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\User', '_api_operation_name' => '_api_/users{._format}_get_collection'], [], [['variable', '.', '[^/]++', '_format', true], ['text', '/briefApi/users']], [], [], []],
    '_api_/logged_get_collection' => [[], ['_controller' => 'App\\Controller\\LoggedUserController', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\User', '_api_operation_name' => '_api_/logged_get_collection'], [], [['text', '/briefApi/logged']], [], [], []],
    '_api_/users/{id}{._format}_patch' => [['id', '_format'], ['_controller' => 'App\\Controller\\User\\PatchUserController', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\User', '_api_operation_name' => '_api_/users/{id}{._format}_patch'], [], [['variable', '.', '[^/]++', '_format', true], ['variable', '/', '[^/\\.]++', 'id', true], ['text', '/briefApi/users']], [], [], []],
    '_api_/users/{id}{._format}_delete' => [['id', '_format'], ['_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\User', '_api_operation_name' => '_api_/users/{id}{._format}_delete'], [], [['variable', '.', '[^/]++', '_format', true], ['variable', '/', '[^/\\.]++', 'id', true], ['text', '/briefApi/users']], [], [], []],
    '_api_/users_roles/{id}{._format}_get' => [['id', '_format'], ['_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\UsersRole', '_api_operation_name' => '_api_/users_roles/{id}{._format}_get'], [], [['variable', '.', '[^/]++', '_format', true], ['variable', '/', '[^/\\.]++', 'id', true], ['text', '/briefApi/users_roles']], [], [], []],
    '_api_/users_roles{._format}_get_collection' => [['_format'], ['_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\UsersRole', '_api_operation_name' => '_api_/users_roles{._format}_get_collection'], [], [['variable', '.', '[^/]++', '_format', true], ['text', '/briefApi/users_roles']], [], [], []],
    '_preview_error' => [['code', '_format'], ['_controller' => 'error_controller::preview', '_format' => 'html'], ['code' => '\\d+'], [['variable', '.', '[^/]++', '_format', true], ['variable', '/', '\\d+', 'code', true], ['text', '/_error']], [], [], []],
    'gesdinet_jwt_refresh_token' => [[], [], [], [['text', '/briefApi/token/refresh']], [], [], []],
    'app_brief' => [[], ['_controller' => 'App\\Controller\\BriefController::createBrief'], [], [['text', '/briefApi/']], [], [], []],
    'clear_refresh_token' => [[], ['_controller' => 'App\\Controller\\CallMessageClearRefreshTokenController::sendMessage'], [], [['text', '/briefApi/clearRefreshToken']], [], [], []],
    'app_patch_company' => [['id'], ['_controller' => 'App\\Controller\\Company\\PatchCompanyController::index'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/briefApi/companies']], [], [], []],
    'app_docusign' => [[], ['_controller' => 'App\\Controller\\DocusignController::index'], [], [['text', '/docusign']], [], [], []],
    'app_logged_user' => [[], ['_controller' => 'App\\Controller\\LoggedUserController'], [], [['text', '/logged']], [], [], []],
    'app_pixel_generator' => [[], ['_controller' => 'App\\Controller\\PixelGeneratorController::generatePixel'], [], [['text', '/generatePixel']], [], [], []],
    'app_security' => [[], ['_controller' => 'App\\Controller\\SecurityController::index'], [], [['text', '/briefApi/login_check']], [], [], []],
    'test_mail' => [[], ['_controller' => 'App\\Controller\\TestMailController::index'], [], [['text', '/testMail']], [], [], []],
    'app_patch_user' => [['id'], ['_controller' => 'App\\Controller\\User\\PatchUserController::index'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/briefApi/users']], [], [], []],
    'my_page' => [[], ['_controller' => 'App\\Controller\\User\\PatchUserController::test'], [], [['text', '/my-page']], [], [], []],
    'api_refresh_token' => [[], [], [], [['text', '/briefApi/token/refresh']], [], [], []],
    'App\Controller\BriefController::createBrief' => [[], ['_controller' => 'App\\Controller\\BriefController::createBrief'], [], [['text', '/briefApi/']], [], [], []],
    'App\Controller\CallMessageClearRefreshTokenController::sendMessage' => [[], ['_controller' => 'App\\Controller\\CallMessageClearRefreshTokenController::sendMessage'], [], [['text', '/briefApi/clearRefreshToken']], [], [], []],
    'App\Controller\Company\PatchCompanyController::index' => [['id'], ['_controller' => 'App\\Controller\\Company\\PatchCompanyController::index'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/briefApi/companies']], [], [], []],
    'App\Controller\DocusignController::index' => [[], ['_controller' => 'App\\Controller\\DocusignController::index'], [], [['text', '/docusign']], [], [], []],
    'App\Controller\LoggedUserController::__invoke' => [[], ['_controller' => 'App\\Controller\\LoggedUserController'], [], [['text', '/logged']], [], [], []],
    'App\Controller\LoggedUserController' => [[], ['_controller' => 'App\\Controller\\LoggedUserController'], [], [['text', '/logged']], [], [], []],
    'App\Controller\PixelGeneratorController::generatePixel' => [[], ['_controller' => 'App\\Controller\\PixelGeneratorController::generatePixel'], [], [['text', '/generatePixel']], [], [], []],
    'App\Controller\SecurityController::index' => [[], ['_controller' => 'App\\Controller\\SecurityController::index'], [], [['text', '/briefApi/login_check']], [], [], []],
    'App\Controller\TestMailController::index' => [[], ['_controller' => 'App\\Controller\\TestMailController::index'], [], [['text', '/testMail']], [], [], []],
    'App\Controller\User\PatchUserController::index' => [['id'], ['_controller' => 'App\\Controller\\User\\PatchUserController::index'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/briefApi/users']], [], [], []],
    'App\Controller\User\PatchUserController::test' => [[], ['_controller' => 'App\\Controller\\User\\PatchUserController::test'], [], [['text', '/my-page']], [], [], []],
];
