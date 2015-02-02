<?php

namespace Application\Controller;

use helper\FormatMap;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\View\Renderer\PhpRenderer;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        return new ViewModel();
    }

    public function converterAction()
    {
        $view = new ViewModel();
        $view->setTerminal(true);
        $fileName = $_FILES['upload']['name'];
        $tempFile = $_FILES['upload']['tmp_name'];
        $formatIn = substr ($fileName,strrpos($fileName , '.') + 1, strlen($fileName));
        $formatOut = $_POST['select'];
        if ($formatIn == 'csv' || $formatIn == 'xml' || $formatIn == 'json' || $formatOut)
        {
            $formatMap = new FormatMap();
            $decoder = $formatMap->getDecoder($formatIn);
            $dto = $decoder->dtoDecod($tempFile);
            if($dto !== false)
            {
                $decoder = $formatMap->getCoder($formatOut);
                $fileOut = $decoder->fileCode($dto);
                if($fileOut !== false)
                {
                    $name = 'ConvertedFile.'. $formatOut .'';
                    $fp = fopen($name,"w");
                    fwrite($fp,$fileOut);

                    // Create header
                    header('Content-Description: File Transfer');
                    header('Content-Type: application/octet-stream');
                    header('Content-Disposition: attachment; filename=' . $name);
                    header('Content-Transfer-Encoding: binary');
                    header('Expires: 0');
                    header('Cache-Control: must-revalidate');
                    header('Pragma: public');
                    header('Content-Length: ' . strlen($fileOut));
                    // end Create header

                    readfile($name);
                    fclose($fp);
                    unlink($name);
                    $this->layout()->setTerminal(true);
                    return $this->response;
                }
            }
        }
        $view = new ViewModel();
        return $view;
    }
}

