<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;

/**
 * Math component
 */
class MathComponent extends Component
{
    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];
    public function initialize (array $config)
    {
        parent::initialize($config);
    }

    public function soma (...$params)
    {
        return array_sum($params);
    }
}
