<?php

namespace Mailjet\Api;

use Mailjet\Api;

/**
 * Methods of Mailjet lists API
 *
 * @author dguyon <dguyon@gmail.com>
 */
class Lists extends Api
{
    /**
     * Get all your contact lists
     *
     * @param int $start
     * @param int $limit
     * @return array
     */
    public function getAll($start = 0, $limit = 100)
    {
        return $this->get('listsAll', array(
            'start' => $start,
            'limit' => $limit
        ));
    }

    /**
     * Recover the Email address of your list
     *
     * @param int $id
     * @return array
     */
    public function getEmail($id)
    {
        return $this->get('listsEmail', array(
            'id' => $id
        ));
    }

    /**
     * Get all statistics relative to one of your lists
     *
     * @param int $id
     * @return array
     */
    public function getStatistics($id)
    {
        return $this->get('listsStatistics', array(
            'id' => $id
        ));
    }

    /**
     * Get all your contacts from one particular list
     *
     * @param int $id
     * @param timestamp $last_activity
     * @param int $start
     * @param int $limit
     * @param type $blocked
     * @param type $unsub
     * @param string $status opened|blocked
     * @return array
     */
    public function getContacts($id = '', $last_activity = '', $start = 0, $limit = 100, $blocked = '', $unsub = '', $status = '')
    {
        return $this->get('listsContacts', array(
            'id' => $id,
            'last_activity' => $last_activity,
            'start' => $start,
            'limit' => $limit,
            'blocked' => $blocked,
            'unsub' => $unsub,
            'status' => $status,
        ));
    }

    /**
     * Create a new list
     *
     * @param string $name
     * @param string $label
     * @return int the created list_id
     */
    public function create($name, $label)
    {
        return $this->post('listsCreate', array(
            'name' => $name,
            'label' => $label
        ));
    }

    /**
     * List informations
     *
     * @param int $id
     * @param string $name
     * @param string $label
     */
    public function update($id, $name, $label)
    {
        return $this->post('listsUpdate', array(
            'id' => $id,
            'name' => $name,
            'label' => $label
        ));
    }

    /**
     * Delete a list
     *
     * @param int $id
     */
    public function delete($id)
    {
        return $this->post('listsDelete', array(
            'id' => $id
        ));
    }

    /**
     * Add a new contact to a list
     *
     * @param int $id Mailjet list id
     * @param mixed $contact Mailjet contact id or email adresse
     */
    public function addContact($id, $contact)
    {
        return $this->post('addContact', array(
            'id' => $id,
            'contact' => $contact
        ));
    }

    /**
     * Remove one or all contact(s) from a list
     *
     * @param type $id Mailjet list id
     * @param mixed $contact Mailjet contact id or email adresse
     */
    public function removeContact($id, $contact = '')
    {
        return $this->post('removeContact', array(
            'id' => $id,
            'contact' => $contact
        ));
    }
}
