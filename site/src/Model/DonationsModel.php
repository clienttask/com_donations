<?php
namespace Joomla\Component\Donations\Site\Model;

\defined('_JEXEC') or die;

use Joomla\CMS\MVC\Model\ListModel;
use Joomla\Database\DatabaseInterface;

class DonationsModel extends ListModel
{
    public function __construct($config = [])
    {
        if (empty($config['filter_fields'])) {
            $config['filter_fields'] = ['id', 'donor', 'amount', 'created'];
        }
        parent::__construct($config);
    }

    protected function populateState($ordering = null, $direction = null)
    {
        parent::populateState($ordering ?? 'created', $direction ?? 'DESC');
    }

    protected function getListQuery()
    {
        /** @var DatabaseInterface $db */
        $db    = $this->getDatabase();
        $query = $db->getQuery(true)
            ->select(['d.id', 'd.donor', 'd.amount', 'd.created'])
            ->from($db->quoteName('#__donations', 'd'));

        $orderCol  = $this->state->get('list.ordering', 'created');
        $orderDirn = $this->state->get('list.direction', 'DESC');

        if ($orderCol && $orderDirn) {
            $query->order($db->escape($orderCol . ' ' . $orderDirn));
        }

        return $query;
    }
}
