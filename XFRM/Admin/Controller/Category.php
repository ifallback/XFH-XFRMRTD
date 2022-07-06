<?php

namespace XFH\XFRMRTD\XFRM\Admin\Controller;

use XF\Mvc\FormAction;

class Category extends XFCP_Category
{
    protected function categorySaveProcess(\XFRM\Entity\Category $category): FormAction
    {
        $saveProcess = parent::categorySaveProcess($category);

        $category->xfh_reply_to_download_option = $this->filter('enable_reply_to_download', 'bool');

        return $saveProcess;
    }
}