<?php

namespace Mailjet\Api;

use Mailjet\Api;

/**
 * Methods of Mailjet contact API
 *
 * @author dguyon <dguyon@gmail.com>
 */
class Contact extends Api
{
    /**
     * Get all your contacts
     *
     * @param int $mj_contact_id
     * @param timestamp $last_activity
     * @param type $blocked
     * @param string $status opened|blocked
     * @param int $start
     * @param int $limit
     * @return array
     */
    public function getList($mj_contact_id = '', $last_activity = '', $blocked = '', $status = '', $start = 0, $limit = 100)
    {
        return $this->get('contactList', array(
            'mj_contact_id' => $mj_contact_id,
            'last_activity' => $last_activity,
            'blocked' => $blocked,
            'status' => $status,
            'start' => $start,
            'limit' => $limit
        ));
    }

    /**
     * Get the openers list from all your contacts
     *
     * @param timestamp $last_activity
     * @param int $start
     * @param int $limit
     * @return array
     */
    public function getOpeners($last_activity = '', $start = 0, $limit = 100)
    {
        return $this->get('contactOpeners', array(
            'last_activity' => $last_activity,
            'start' => $start,
            'limit' => $limit
        ));
    }
}