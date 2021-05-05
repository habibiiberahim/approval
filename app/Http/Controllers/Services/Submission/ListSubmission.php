<?php

namespace App\Http\Controllers\Services\Submission;

use App\Models\Submission;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;

class ListSubmission
{
    /**
     * Submission model.
     *
     * @var Submission
     */
    protected $submission;

    /**
     * Constructor.
     *
     * @param submission $submission
     */
    public function __construct(Submission $submission)
    {
        $this->submission = $submission;
    }
   

    /**
     * Get filtered products.
     *
     * @param int $perPage
     * @return LengthAwarePaginator
     */
    public function get($perPage)
    {   
        return $this->submission->paginate($perPage);
    }
    public function getByUser($id, $perPage)
    {
        $this->submission = $this->submission->where('user_id',$id);        
        return  $this->submission->paginate($perPage);
    }

    public function getByStatus($status, $perPage)
    {   
        $this->submission = $this->submission->where('status',$status);        
        return $this->submission->paginate($perPage);
    }

    public function getByStatusAndId($status, $id, $perPage)
    {   
        $this->submission = $this->submission->where('status', $status)->where('supervisor_id',$id);        
        return $this->submission->paginate($perPage);
    }

    public function getByIdSupervisor($id,$perPage)
    {   
        $this->submission = $this->submission->where('supervisor_id',$id);       
        return $this->submission->paginate($perPage);
    }

    public function getByid($id)
    {   
        $this->submission = $this->submission->where('id',$id)->get();       
        return $this->submission;
    }

    public function getAll()
    {
        $this->submission = $this->submission->get();       
        return $this->submission;
    }

    public function UserByRole($role){
        $this->role = Role::where('name', $role)->first()->users()->get();
        return $this->role;
    }
    
}