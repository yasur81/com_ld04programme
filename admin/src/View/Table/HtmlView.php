<?php
/**
 * @package     Joomla 5 Extension Development Series - NicolauRoca.dev
 * @subpackage  NicolauRoca_Joomla_Admin_HelloWorld
 * @copyright   © 2025-09-01 Nicolau Roca
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace Ld04\Component\Programme\Administrator\View\Table;

defined('_JEXEC') or die;

use Joomla\CMS\MVC\View\HtmlView as BaseHtmlView;

class HtmlView extends BaseHtmlView
{
    public string $greeting = 'HelloDJ, World! 👋';

    public function display($tpl = null)
    {
        return parent::display($tpl);
    }
}
