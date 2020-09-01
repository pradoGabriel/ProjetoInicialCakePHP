<?php 
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class UsersTable extends Table
{
    public function initialize (array $config)
    {
        parent::initialize($config);

        $this->setTable('users');
       // $this->connection
       // $this->setDisplayField('nome');
        $this->setPrimaryKey('id');
        $this->addBehavior('Timestamp');
    }

    public function validationDefault (Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');
        $validator
            ->scalar('nome')
            ->maxLength('nome', 220)
            ->requirePresence('nome', 'create')
            ->notEmpty('nome');
        $validator
            ->scalar('email')
            ->maxLength('email', 220)
            ->requirePresence('email','create')
            ->notEmpty('email');

        return $validator;
    
    }

}