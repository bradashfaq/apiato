<?php

namespace App\Containers\Authorization\UI\API\Requests;

use App\Ship\Request\Abstracts\Request;

/**
 * Class AttachPermissionToRoleRequest.
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 */
class AttachPermissionToRoleRequest extends Request
{

    /**
     * Define which Roles and/or Permissions has access to this request..
     *
     * @var  array
     */
    protected $access = [
        'roles'       => 'admin',
        'permissions' => '',
    ];

    /**
     * Id's that needs decoding before applying the validation rules.
     *
     * @var  array
     */
    protected $decode = [
        'permissions_ids',
        'role_id',
    ];

    /**
     * Defining the URL parameters (`/stores/999/items`) allows applying
     * validation rules on them and allows accessing them like request data.
     *
     * @var  array
     */
    protected $urlParameters = [

    ];

    /**
     * @return  array
     */
    public function rules()
    {
        return [
            'permissions_ids'   => 'required',
            'permissions_ids.*' => 'exists:permissions,id',
            'role_id'           => 'required|exists:roles,id',
        ];
    }

    /**
     * @return  bool
     */
    public function authorize()
    {
        return $this->hasAccess();
    }
}
