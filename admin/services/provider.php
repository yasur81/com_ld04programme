<?php
/**
 * @package     Joomla 5 Extension Development Series - NicolauRoca.dev
 * @subpackage  NicolauRoca_Joomla_Admin_HelloWorld
 * @copyright   © 2025-09-01 Nicolau Roca
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
defined('_JEXEC') or die;

use Joomla\DI\Container;
use Joomla\DI\ServiceProviderInterface;

use Joomla\CMS\Extension\ComponentInterface;
use Joomla\CMS\Dispatcher\ComponentDispatcherFactoryInterface;
use Joomla\CMS\MVC\Factory\MVCFactoryInterface;

use Joomla\CMS\Extension\Service\Provider\ComponentDispatcherFactory;
use Joomla\CMS\Extension\Service\Provider\MVCFactory;

use LD04\Component\Programme\Administrator\Extension\LD04ProgrammeComponent;

return new class implements ServiceProviderInterface
{
    public function register(Container $container): void
    {
        $namespace = '\\LD04\\Component\\LD04Programme';

        $container->registerServiceProvider(new ComponentDispatcherFactory($namespace));
        $container->registerServiceProvider(new MVCFactory($namespace));

        $container->set(
            ComponentInterface::class,
            function (Container $container) {
                $component = new LD04ProgrammeComponent(
                    $container->get(ComponentDispatcherFactoryInterface::class)
                );
                $component->setMVCFactory($container->get(MVCFactoryInterface::class));
                return $component;
            }
        );
    }
};
