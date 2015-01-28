<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use helper\FormatMap;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\View\Model\JsonModel;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        return new ViewModel();
    }

    public function converterAction()
    {

        $fileName = $_FILES['upload']['name'];
        $tempFile = $_FILES['upload']['tmp_name'];
        $formatIn = substr ($fileName,strrpos($fileName , '.') + 1, strlen($fileName));
        $formatOut = $_POST['select'];
        if ($formatIn == 'csv' || $formatIn == 'xml' || $formatIn == 'json'){
            $formatMap = new FormatMap();
            $decoder = $formatMap->getDecoder($formatIn);
            $dto = $decoder->dtoDecod($tempFile);
            $decoder = $formatMap->getCoder($formatOut);
            $fileOut = $decoder->fileCode($dto);
        }else{

        }
        return false;
    }
}

