<?php

namespace XFH\XFRMRTD;

use XF\AddOn\AbstractSetup;
use XF\AddOn\StepRunnerInstallTrait;
use XF\AddOn\StepRunnerUninstallTrait;
use XF\AddOn\StepRunnerUpgradeTrait;
use XF\Db\Schema\Alter;

class Setup extends AbstractSetup
{
    use StepRunnerInstallTrait;
    use StepRunnerUpgradeTrait;
    use StepRunnerUninstallTrait;

    public function installStep1()
    {
        $this->alterTable('xf_rm_category', function (Alter $table)
        {
            $table->addColumn('xfh_reply_to_download_option', 'bool');
        });
    }

    public function uninstallStep1()
    {
        $this->alterTable('xf_rm_category', function (Alter $table)
        {
            $table->dropColumns(['xfh_reply_to_download_option']);
        });
    }
}