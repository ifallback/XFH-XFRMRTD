<?php

namespace XFH\XFRMRTD;

use XF\Mvc\Entity\Entity;
use XF\Mvc\Entity\Manager;
use XF\Mvc\Entity\Structure;

class Listener
{
    public static function categoryEntityExtend(Manager $em, Structure &$structure): Structure
    {
        $structure->columns['xfh_reply_to_download_option'] = ['type' => Entity::BOOL, 'default' => false];

        return $structure;
    }
}