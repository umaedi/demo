<?php

namespace App\Services;

use App\Models\Submission;
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

    public function find($id)
    {
        $model = $this->submission->find($id);
    }

    public function Query()
    {
        return $this->submission->query();
    }
}
