<?php
namespace Joomla\Component\Donations\Administrator\Model;

\defined('_JEXEC') or die;

use Joomla\CMS\MVC\Model\ListModel;
use Joomla\Database\DatabaseInterface;

class DonationsModel extends ListModel
{
    protected function getListQuery()
    {
        /** @var DatabaseInterface $db */
        $db = $this->getDatabase();
        $query = $db->getQuery(true)
            ->select(['d.id', 'd.donor', 'd.amount', 'd.created'])
            ->from($db->quoteName('#__donations', 'd'))
            ->order('d.created DESC');

        return $query;
    }
}
