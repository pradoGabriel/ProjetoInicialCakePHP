<?php 

namespace App\Controller;

use App\Controller\AppController;

class UsersController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadModel('User');
    }

    public function index()
    {
        $usuarios = $this->paginate($this->Users);
 
        $response = $this->response
                ->withType('application/json')
                ->withStatus(200)
                ->withStringBody(json_encode($usuarios));
        return $response;
        //echo json_encode($usuarios);
        //exit();
    }
    
    public function add()
    {
        $user = $this->Users->NewEntity();
        if ($this->request->is('post'))
        {
            // recebendo os dados 
            $user = $this->Users->patchEntity($user, 'cnpj');
            if ($this->Users->save($user))
            {
                $content = json_encode(['msg'=>'Usuario cadastrado com sucesso']);

                $this->response = $this->response->withStringBody($content);
                $this->response = $this->response->withType('json');
                return $this->response;
                //->withType('application/json')
                //->withStatus(200) -> withStringBody(json_decode(['msg'=>'Usuario cadastro com sucesso']));
            } else {
                $content = json_encode(['msg'=>'Usuario não pode ser cadastrado com sucesso, tente novamente']);

                $this->response = $this->response->withStringBody($content);
                $this->response = $this->response->withType('json');
                return $this->response;
                //return $this->response->withType('application/json')
                 //   ->withStatus(404) -> withStringBody(json_decode(['msg'=>'Usuario não foi cadastro com sucesso, tente novamente']));
            }
        }
        //enviando para a view
        //$user->nome = 'Gabriel';
        $this->set(compact('user'));
    }


        //função editar
    public function edit($id = null)
   {
       /*$user = $this->Users->get($id, [
            'contain' => [],
        ]);*/
        /*$user = $this->Users
            ->find('all')
            ->where(['id' => $id])
            ->first();*/
            $id = $this->request->getParam('id');
            $this->request->allowMethod(['patch', 'post', 'put']);
            $user = $this->Users->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $content = json_encode(['msg'=>'Usuario editado com sucesso']);

                $this->response = $this->response->withStringBody($content);
                $this->response = $this->response->withType('json');
                return $this->response;
            } else
            {
                 $content = json_encode(['msg'=>'Usuario não pode ser editado, tente novamente']);

                $this->response = $this->response->withStringBody($content);
                $this->response = $this->response->withType('json');
                return $this->response;
            }
       
        }
        $this->set(compact('user'));
    }
    

    // função apagar
    public function delete($id = null)
    {
        $id = $this->request->getParam('id');
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $content = json_encode(['msg'=>'Usuario excluido com sucesso']);

            $this->response = $this->response->withStringBody($content);
            $this->response = $this->response->withType('json');
            return $this->response;
        } else {
            $content = json_encode(['msg'=>'Usuario não pode ser excluido com sucesso, tente novamente']);

            $this->response = $this->response->withStringBody($content);
            $this->response = $this->response->withType('json');
            $this->response = $this->response->withStatus(404);
            return $this->response;
        }
    }
}

