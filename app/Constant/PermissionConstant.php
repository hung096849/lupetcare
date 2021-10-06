<?php
namespace App\Constant;

class PermissionConstant
{
    /** User permission */
    const USER_PERMISSION_LIST   = "list-users";
    const USER_PERMISSION_EDIT   = "edit-users";
    const USER_PERMISSION_CREATE = "create-users";
    const USER_PERMISSION_VIEW   = "view-users";
    const USER_PERMISSION_DELETE = "delete-users";

    /** Role permission */
    const ROLE_PERMISSION_LIST   = "list-roles";
    const ROLE_PERMISSION_EDIT   = "edit-roles";
    const ROLE_PERMISSION_CREATE = "create-roles";
    const ROLE_PERMISSION_VIEW   = "view-roles";
    const ROLE_PERMISSION_DELETE = "delete-roles";


    /** Customer permission */
    const CUSTOMER_PERMISSION_LIST   = "list-customers";
    const CUSTOMER_PERMISSION_EDIT   = "edit-customers";
    const CUSTOMER_PERMISSION_CREATE = "create-customers";
    const CUSTOMER_PERMISSION_VIEW   = "view-customers";
    const CUSTOMER_PERMISSION_DELETE = "delete-customers";
}