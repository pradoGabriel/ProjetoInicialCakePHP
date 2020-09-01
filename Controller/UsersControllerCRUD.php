<?php 

namespace App\Controller;

use App\Controller\AppController;

class UsersController extends AppController
{
    public function index()
    {
        $cookie = $this->Cookie->check('APP');
        debug ($cookie);
        $this->paginate = [
            'limit' =>2,
            'order' => [
                'Users.id' => 'desc'
            ]
        ];
        $usuarios = $this->paginate($this->Users);
       // $usuario ="Gabriel";
       // $this->set(['usuarios' => $usuario]);
       //$usuarios = $this->Users->find()->all();
      // $this->set(['usuarios'=> $usuarios]);
      //$this->response->withAddedHeader('Content-type', 'json');
      //echo json_encode (['msg'=> "Olá mundo"]);
        $this->set(compact('usuarios'));
    }
// função cadastrar
    public function add()
    {
        $user = $this->Users->NewEntity();
        if ($this->request->is('post'))
        {
            // recebendo os dados 
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user))
            {
                $this ->Flash->success(__('Usuário cadastrado com sucesso'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this ->Flash->error(__('Usuário não foi cadastrado com sucesso'));
            }
        }
        //enviando para a view
        //$user->nome = 'Gabriel';
        $this->set(compact('user'));
    }


        //função editar
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Usuário editado com sucesso'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Usuário não foi editado, tente novamente.'));
        }
        $this->set(compact('user'));
    }
    

    // função apagar
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('Usuário apagado com sucesso'));
        } else {
            $this->Flash->error(__('Usuário não foi apagado, tente novamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    
    private function uploadFoto(string $userEmail,array $foto)
    {
        $path = WWW_ROOT . $userEmail;
        $userPath = new \Cake\Filesystem\Folder($path,true);

        $file = new \Cake\Filesystem\File($foto['tmp_name']);
        $file->copy($userPath->path . DS . $foto ['name']);
        $file->close();
    }
}
