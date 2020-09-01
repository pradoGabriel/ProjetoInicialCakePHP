<?php
namespace App\Controller;

use App\Controller\AppController;
use \App\Form\ContatoForm;
/**
 * Contato Controller
 *
 *
 * @method \App\Model\Entity\Contato[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ContatoController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
    $this->loadComponent('Cep');
     $res = $this->Cep->buscaCepJSON('05805030');
     debug ($res);
     exit();
        $contato = new ContatoForm();
      //  if ($this->request-is('post')){
            $data = $this->request->getData();
            if ($contato->execute($data)){
                $this->flash->success('Enviado com sucesso!');
            } else {
                $this->flash->error('Ocorreu um erro ao enviar');
            }
        
        //tratamento post

        $this->set('contato', $contato);
    }

 
}
