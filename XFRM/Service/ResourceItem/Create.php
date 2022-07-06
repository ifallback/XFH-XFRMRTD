<?php

namespace XFH\XFRMRTD\XFRM\Service\ResourceItem;

class Create extends XFCP_Create
{
    public function setReplyDownload(bool $value): void
    {
        $this->resource->xfh_reply_to_download_option = $value;
    }
}