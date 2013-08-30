<?php

namespace Mailjet\Api;

use Mailjet\Api;

/**
 * Methods of Mailjet message API
 *
 * @author dguyon <dguyon@gmail.com>
 */
class Message extends Api
{
    /**
     * Get all your messages sent
     *
     * @param string $from_email
     * @param string $from_name
     * @param string $custom_campaign
     * @param timestamp $sent_after
     * @param timestamp $sent_before
     * @param int $start
     * @param int $limit
     * @param int $status [-1] canceled, [0] queued, [1] sent, [2] paused
     * @return array
     */
    public function getList($from_email = '', $from_name = '', $custom_campaign = '', $sent_after = '', $sent_before = '', $status = '', $start = 0, $limit = 100)
    {
        return $this->get('messageList', array(
            'from_email' => $from_email,
            'from_name' => $from_name,
            'custom_campaign' => $custom_campaign,
            'sent_after' => $sent_after,
            'sent_before' => $sent_before,
            'status' => $status,
            'start' => $start,
            'limit' => $limit
        ));
    }

    /**
     * Get statistics from a specific message
     *
     * @param int $id message id
     */
    public function getStatistics($id)
    {
        return $this->get('messageStatistics', array(
            'id' => $id
        ));
    }

    /**
     * Get all the contacts concerned by a message
     *
     * @param int $id the message id
     * @param string $status queued, sent, bounce, opened
     * @param int $start
     * @param int $limit
     * @return array
     */
    public function getContacts($id, $status = 'all', $start = 0, $limit = 100)
    {
        return $this->get('messageContacts', array(
            'id' => $id,
            'status' => $status,
            'start' => $start,
            'limit' => $limit
        ));
    }
}
