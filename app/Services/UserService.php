<?php

namespace App\Services;

use App\Models\User;

class UserService
{
    protected $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function Query()
    {
        return $this->user->query();
    }

    public function find($id)
    {
        $model = $this->user->find($id);
        return $model;
    }

    public function store($data)
    {
        return $this->user->create($data);
    }

    public function update($participant, $status, $id_sertifikat)
    {
        $model = $participant->update([
            'status' => $status,
            'sertifikat' => $id_sertifikat,
        ]);
        return $model;
    }
}
