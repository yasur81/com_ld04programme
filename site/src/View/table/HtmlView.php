<?php
namespace LD04\Component\LD04Programme\Site\View\Hello;

\defined('_JEXEC') or die;

use Joomla\CMS\MVC\View\HtmlView as BaseHtmlView;
use Joomla\CMS\Factory;

class HtmlView extends BaseHtmlView
{
    protected $greeting;

    public function display($tpl = null)
    {
        $app    = Factory::getApplication();
        $menu   = $app->getMenu()->getActive();
        $params = $menu ? $menu->getParams() : $app->getParams();
        $this->greeting = $params->get('greeting', 'Hello from frontend!');

        return parent::display($tpl);
    }
}
