<?php

namespace Mailjet\Api;

use Mailjet\Api;

/**
 * Methods of Mailjet user API
 * 
 * @author dguyon <dguyon@gmail.com>
 */
class User extends Api
{
    /**
     * Get user infos
     * 
     * @return array
     */
    public function infos()
    {
        $response = $this->get('userInfos');
        
        return $response['infos'];
    }
}
