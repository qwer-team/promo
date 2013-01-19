<?php

namespace Qwer\PromoBundle\ServiceMock;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\DependencyInjection\ContainerAware;
/**
 * Description of StorageServiceMock
 *
 * @author root
 */
class StorageServiceMock extends ContainerAware {
    private $folder;
    public function save($pathToTmpFile)
    {
        $file = new File($pathToTmpFile);
        $type = $file->getMimeType();
        $fileName = "/".rand(0,100000);
    }
    
    public function setFolder($folder) {
        $this->folder = $folder;
    }
}