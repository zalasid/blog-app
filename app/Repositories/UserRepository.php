<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserRepository
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getUsers()
    {
        return $this->user->exceptMe()->paginate(10);
    }

    public function updateUser(int $userId, array $data)
    {
        return $this->user->findOrFail($userId)->update($data);
    }

    public function deleteUser(int $userId)
    {
        return $this->user->whereId($userId)->delete();
    }

    public function getPublicUsers()
    {
        return $this->user->publicUserOnly()->get();
    }

    public function getAllUsers()
    {
        return $this->user->with('author')->paginate(10);
    }

    public function getUserProfile($userId)
    {
        return $this->user->whereId($userId)->first();
    }
}
