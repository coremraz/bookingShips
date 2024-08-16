<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    /**
     * Determine whether the user can update the user.
     *
     * @param  \App\Models\User  $user  Текущий аутентифицированный пользователь (из Sanctum)
     * @param  \App\Models\User  $model  Модель пользователя, которого хотят обновить
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, User $model)
    {
        // Проверяем, совпадает ли ID текущего пользователя с ID пользователя, данные которого хотят обновить
        return $user->id === $model->id;
    }
}
