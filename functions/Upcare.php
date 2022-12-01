<?php

require_once __DIR__ . '/../vendor/autoload.php'; //buat load file composer
require_once __DIR__ . '/../inc/env.php'; //buat load file env
use Uploadcare\Configuration;
use Uploadcare\Apis\FileApi;
use Uploadcare\Api;

// Uploadcare::$publicKey = $_ENV['UPLOADCARE_PUBLIC_KEY'];
// Uploadcare::$privateKey = $_ENV['UPLOADCARE_PRIVATE_KEY'];
// $uploadcare = Uploadcare\Uploadcare();

class UPCARE
{

    public function configUP()
    {
        $config = Configuration::create($_ENV['UPLOADCARE_PUBLIC_KEY'], $_ENV['UPLOADCARE_SECRET_KEY']);
        return $config;
    }
    public function apiUP()
    {
        $api = new Api($this->configUP());
        return $api;
    }
    public function fileCARE()
    {


        $fileAPI = new FileApi($this->configUP());
        $page = $fileAPI->listFiles(5);
        while (($page = $fileAPI->nextPage($page)) !== null) {
            $files = $page->getResults();
        }
        return $files;
    }
    public function groupCARE()
    {
        $groupApi = $this->apiUP()->group();
        return $groupApi;
    }
    public function listgroupCARE($page_halaman, $asc = true)
    {
        $groupApi = $this->apiUP()->group();
        $listgroup = $groupApi->listGroups($page_halaman, $asc);
        return $listgroup;
    }
    public function infoGroup($uuid)
    {
        $groupApi = $this->apiUP()->group();
        $infoGroup = $groupApi->groupinfo($uuid);
        return $infoGroup;
    }
    public function projectCARE()
    {
        $projectApi = $this->apiUP()->project();
        $projectInfo = $projectApi->getProjectInfo();
        return $projectInfo;
    }
    public function uploadLangsung()
    {
        $uploader = $this->apiUP()->uploader();
        return $uploader;
    }
}
