<?php  
namespace Concrete\Package\OunziwOgpDisplay;

use Concrete\Core\Backup\ContentImporter;
use Concrete\Core\Package\Package;


class Controller extends Package
{
    protected $pkgHandle = 'ounziw_ogp_display';
    protected $appVersionRequired = '8.4.2';
    protected $pkgVersion = '0.8.3';

    public function getPackageName()
    {
        return t('OGP Display');
    }

    public function getPackageDescription()
    {
        return t('OGP Display');
    }

    protected function installXmlContent()
    {
        $pkg = Package::getByHandle($this->pkgHandle);

        $ci = new ContentImporter();
        $ci->importContentFile($pkg->getPackagePath() . '/install.xml');
    }

    public function install()
    {
        parent::install();
        $this->installXmlContent();
    }

    public function upgrade()
    {
        parent::upgrade();
        $this->installXmlContent();
    }

}