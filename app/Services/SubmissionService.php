<?php

namespace App\Services;

use App\Models\Registration;
use App\Models\Submission;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class SubmissionService
{
    protected $submission;
    public function __construct(Submission $submission)
    {
        $this->submission = $submission;
    }

    public function store($data)
    {
        $model = $this->submission->create($data);
        return $model;
    }

    public function update($id, $data)
    {
        $model = $this->submission->find($id);
        $model->update($data);
        return $model;
    }

    public function find($id)
    {
        $model = $this->submission->find($id);
        return $model;
    }

    public function Query()
    {
        return $this->submission->query();
    }

    public function count()
    {
        return $this->submission->count();
    }
}
