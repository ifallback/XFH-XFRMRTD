<?php

namespace XFH\XFRMRTD\XFRM\Pub\Controller;

use XF;
use XF\Mvc\ParameterBag;

class ResourceItem extends XFCP_ResourceItem
{
    /**
     * @throws XF\Mvc\Reply\Exception
     */
    public function actionDownload(ParameterBag $params)
    {
        $download = parent::actionDownload($params);

        $finder = $this->finder('XF:Post');
        $resource = $this->assertViewableResource($params->resource_id);

        if (XF::visitor()->user_id != $resource->user_id
            && $resource->hasViewableDiscussion()
            && $resource->Category->xfh_reply_to_download_option
            && !XF::visitor()->hasPermission('resourcePermissions', 'bypass_reply_to_download'))
        {
            $postFinder = $finder
                ->where('thread_id', $resource->discussion_thread_id)
                ->where('user_id', XF::visitor()->user_id)
                ->where('message_state', 'visible')
                ->total();

            if (!$postFinder)
            {
                return $this->error(XF::phrase('xfh_xfrmrtd_please_reply_to_download'));
            }
        }

        return $download;
    }
}