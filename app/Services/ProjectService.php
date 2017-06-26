<?php
namespace laravelAPI\Services;

use Prettus\Validator\Exceptions\ValidatorException;
use laravelAPI\Repositories\ProjectRepository;
use laravelAPI\Validators\ProjectValidator;

class ProjectService
{

    private $repository;
    private $validator;

    public function __construct(ProjectRepository $repository, ProjectValidator $validator){
        
        $this->repository = $repository;
        $this->validator = $validator;

    }

    public function all(){
        
        //Listing Projects
        return $this->repository->with(['owner','client','notes'])->all();
        
    }
    
    public function create(array $data){
        try {
            $this->validator->with( $data )->passesOrFail();
            
            $post = $this->repository->create( $data );

            return [
                'message'=>'Project created',
                'data'   =>$post
            ];

        } catch (ValidatorException $e) {
            return [
                'error'   =>true,
                'message' =>$e->getMessageBag()
            ];

        }
        
    }

    public function find($id){

        return $this->repository->find($id);

    }
    
    public function update(array $data, $id){
        
        try {
            $this->validator->with( $data )->passesOrFail();
            
            $post = $this->repository->find($id)->update( $data );

            return [
                'message'=>'Project updated',
                'data'   =>$post
            ];

        } catch (ValidatorException $e) {
            return [
                'error'   =>true,
                'message' =>$e->getMessageBag()
            ];

        }
    }

    public function show($id){

        return $this->repository->with(['owner','client','notes'])->find($id);

    }
    
    public function destroy($id){

        if($this->repository->find($id)->delete()){
            return [
                'message'=>'Project removed'
            ];
        }else{
            return [
                'error'   =>true
            ];
        }
        
    }
}