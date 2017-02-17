<?php

namespace App\Containers\Authorization\Tasks;

use App\Containers\User\Models\User;
use App\Ship\Task\Abstracts\Task;

/**
 * Class AssignUserToRoleTask.
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 */
class AssignUserToRoleTask extends Task
{


    /**
     * @param \App\Containers\User\Models\User $user
     * @param array                            $roles
     *
     * @return  \App\Containers\User\Models\User
     */
    public function run(User $user, array $roles)
    {
        $user = $user->assignRole($roles);

        return $user;
    }

}
