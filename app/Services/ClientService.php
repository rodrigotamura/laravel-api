<?php
namespace laravelAPI\Services;

use Prettus\Validator\Exceptions\ValidatorException;
use laravelAPI\Repositories\ClientRepository;
use laravelAPI\Validators\ClientValidator;

class ClientService
{


    private $repository;
    private $validator;

    public function __construct(ClientRepository $repository, ClientValidator $validator){
        
        $this->repository = $repository;
        $this->validator = $validator;

    }

    public function all(){
        
        //Listing Clients
        return $this->repository->all();
        
    }
    
    public function create(array $data){
        try {
            $this->validator->with( $data )->passesOrFail();
            
            $post = $this->repository->create( $data );

            return [
                'message'=>'Client created',
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
                'message'=>'Client updated',
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

        return $this->repository->find($id);

    }
    
    public function destroy($id){

        if($this->repository->find($id)->delete()){
            return [
                'message'=>'Client removed'
            ];
        }else{
            return [
                'error'   =>true
            ];
        }
        
    }
}