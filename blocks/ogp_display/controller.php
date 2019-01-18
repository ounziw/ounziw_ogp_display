<?php  
namespace Concrete\Package\OunziwOgpDisplay\Block\OgpDisplay;

use Concrete\Core\Block\BlockController;
use Concrete\Core\Http\Client\Client as HttpClient;
use Concrete\Core\Support\Facade\Facade;

class Controller extends BlockController
{
    protected $btTable = 'btOunziwOgpDisplay';
    protected $btInterfaceWidth = "320";
    protected $btInterfaceHeight = "240";

    protected $btCacheBlockOutput = true;
    protected $btCacheBlockOutputOnPost = true;
    protected $btCacheBlockOutputForRegisteredUsers = true;
    protected $btCacheBlockOutputLifetime = 21600; // 6 hours

    public function getBlockTypeName()
    {
        return t('OGP Display');
    }

    public function getBlockTypeDescription()
    {
        return t('OGP Display');
    }

    public function view()
    {
        $data = array();
        if (isset($this->url) && filter_var($this->url, FILTER_VALIDATE_URL)) {
            $dataraw = $this->getJsonData($this->url);
            $data = $this->pickOgp($dataraw);
        }
        $this->set('ogp', $data);
    }

    protected function pickOgp($data) {
        if (empty($data)) {
            return array();
        }
        $output = array();
        $dom_document = new \DOMDocument();
        @$dom_document->loadHTML(mb_convert_encoding($data, 'HTML-ENTITIES', 'UTF-8'));
        $xml_object = simplexml_import_dom($dom_document);

        $og_title_xpath = $xml_object->xpath('//meta[@property="og:title"]/@content');
        if ( ! empty($og_title_xpath)) {
            $output['title'] = (string)$og_title_xpath[0];
        } else {
            $output['title'] = '';
        }

        $og_description_xpath = $xml_object->xpath('//meta[@property="og:description"]/@content');
        if ( ! empty($og_description_xpath)) {
            $output['description'] = (string)$og_description_xpath[0];
        } else {
            $output['description'] = '';
        }

        $og_image_xpath = $xml_object->xpath('//meta[@property="og:image"]/@content');
        if ( ! empty($og_image_xpath)) {
            $output['image'] = (string)$og_image_xpath[0];
        } else {
            $output['image'] = '';
        }

        return $output;
    }

    /*
     *  return body
     */
    protected function getJsonData($url) {
        // \concrete\geolocation\geoplugin\controller.php
        $app = Facade::getFacadeApplication();

        $httpClient = $app->make(HttpClient::class);
        $httpClient->setUri($url);
        try {
            $response = $httpClient->send();
        } catch (Exception $x) {
            \Log::addEntry(t('Requestfailed: %s', $x->getMessage()));
        }

        if (!$response->isSuccess()) {
            \Log::addEntry( t('Request failed with return code %s', sprintf('%s (%s)', $response->getStatusCode(), $response->getReasonPhrase())));
        } else {
            return $response->getBody();
        }
    }
}