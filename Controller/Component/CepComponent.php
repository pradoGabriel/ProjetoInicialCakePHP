<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;
use Cake\Http\Client;

/**
 * Cep component
 */
class CepComponent extends Component
{
    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [
        'url' => 'https://viacep.com.br/ws/'
    ];

    public function initialize (array $config)
    {
        parent::initialize($config);
    }

    public function buscaCepJSON ($cep)
    {
        if (strlen($cep) == 8) {
            $url = $this->getConfig('url') . $cep . '/json';
            $http = new Client ();
            $result = $http->get($url, [], []);
            return $result->body('json_decode');
        }
    }

    
}
