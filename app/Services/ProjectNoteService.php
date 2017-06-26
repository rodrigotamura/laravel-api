<?php
namespace laravelAPI\Services;

use laravelAPI\Repositories\ProjectNoteRepository;
use laravelAPI\Validators\ProjectNoteValidator;

class ProjectNoteService
{

    private $repository;
    private $validator;

    public function __construct(ProjectNoteRepository $repository, ProjectNoteValidator $validator){
        
        $this->repository = $repository;
        $this->validator = $validator;

    }

    public function index(){
        
        //Listing ProjectNotes
        return $this->repository->all();
        
    }
    
    public function store(array $data){

        try{

            $this->validator->with($data)->passesOrFail();

            return $this->repository->create($data);

        } catch (ValidatorException $e){

            return [
                'error' => true,
                'message' => $e->getMessageBag()
            ];

        }
        
        return $this->repository->create($request->all());
        
    }
    
    public function save(Request $request, $id){
        
        
        return $this->repository->where('id', $id)->update($request->all());
        
    }
    
    public function show($id){
        
        return $this->repository->with('project')->find($id);
        
    }
    
    public function destroy($id){
        
        return $this->repository->destroy($id);
        
    }

}