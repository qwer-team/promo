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
    /**
     * $url = $this->get('Storage')->save($pathToTmpFile);
     * 
     * @param string $pathToTmpFile
     * 
     * @return string
     */
    public function save($pathToTmpFile)
    {
        $file = new File($pathToTmpFile);
       
        $fileName = rand(0,100000).".png";
        $file->move($this->folder, $fileName);
        
        return "/bundles/qwerpromo/images/".$fileName;
    }
    
    public function setFolder($folder) {
        $this->folder = $folder;
    }
}