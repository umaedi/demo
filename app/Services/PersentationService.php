<?php

namespace App\Services;

use App\Models\Persentation;

class PersentationService
{
    protected $persentation;
    public function __construct(Persentation $persentation)
    {
        $this->persentation = $persentation;
    }

    public function store($data)
    {
        return $this->persentation->create($data);
    }

    public function Query()
    {
        return $this->persentation->query();
    }
}
