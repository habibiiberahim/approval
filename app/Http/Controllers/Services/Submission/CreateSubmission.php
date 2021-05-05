<?php

namespace App\Http\Controllers\Services\Submission;
use DB;
use Illuminate\Support\Facades\Auth;
use Str;
use Cache;
use Storage;
use Exception;
use App\Models\Submission;


class CreateSubmission
{
    /**
     * Submission model.
     *
     * @var Submission
     */
    protected $submission;

    protected $file;    

    /**
     * Form data.
     *
     * @var array
     */
    protected $data;

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
     * Set form request data.
     *
     * @param Request $request
     * @return self
     */
    public function setData($request)
    {
        $this->data = $request->except('_token');
        return $this;
    }

    /**
     * Get unique slug.
     *
     * @param void
     * @return string
     */
    
    /**
     * Upload the images.
     * 
     * @param void
     * @return void
     */
    protected function upload()
    {
        foreach ($this->data['file'] as $file) {
            $path = Storage::putFile('file', $file);
            $arr = explode('/', $path);
            $this->submission->files()->create(['file' => end($arr),
                'keterangan' => 'Draft From Author'
            ]);
        }
    }


    /**
     * Get single Submission.
     *
     * @param string $slug
     * @return void
     */
    public function store()
    {
        try {
            DB::beginTransaction();
            $this->submission->user_id= Auth::user()->id;
            $this->submission->title= $this->data['title'];
            foreach ($this->data['file'] as $file) {
                $path = Storage::putFile('file', $file);
                $arr = explode('/', $path);
                $this->submission->file = end($arr) ;
            }
            $this->submission->status= "Waiting";
            $this->submission->supervisor_id= Auth::user()->id;

            $this->submission->save();

           
            Cache::forget('submission:display');

            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            dd($e->getMessage());

        }
        
        return $this->submission;
    }

    public function update($id)
    {

        $this->submission->where('id', $id)->update(
            [
                'status'=>'Review',
                'supervisor_id' => $this->data['supervisor']
            ]);
    }

    public function updateStatus($id)
    {

        $this->submission->where('id', $id)->update(
            [
                'status'=>'Complete',
            ]);
    }

}