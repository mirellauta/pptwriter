<?php

require_once 'src/PhpPresentation/Autoloader.php';
\PhpOffice\PhpPresentation\Autoloader::register();
require_once 'src/Common/Autoloader.php';
\PhpOffice\Common\Autoloader::register();

use PhpOffice\PhpPresentation\PhpPresentation;
use PhpOffice\PhpPresentation\IOFactory;
use PhpOffice\PhpPresentation\Shape\Drawing;
use PhpOffice\PhpPresentation\Style\Color;
use PhpOffice\PhpPresentation\Style\Fill;

// Create new PHPPresentation object
echo date('H:i:s') . ' Create new PHPPresentation object'.EOL;
$objPHPPresentation = new PhpPresentation();

// Create slide
echo date('H:i:s') . ' Create slide'.EOL;
$currentSlide = $objPHPPresentation->getActiveSlide();

$content = file_get_contents('https://adevarul.ro/assets/adevarul.ro/MRImage/2021/06/07/60be168e5163ec4271da5c5f/316x158.jpg');
file_put_contents('images/a1.jpg', $content);



$shape = new Drawing\File();
$shape->setName('PHPPresentation logo')
    ->setDescription('PHPPresentation logo')
    ->setPath('images/a1.jpg')
    ->setHeight(350)
    ->setOffsetX(150)
    ->setOffsetY(100);
$currentSlide->addShape($shape);

$oWriterPPTX = IOFactory::createWriter($objPHPPresentation, 'PowerPoint2007');
$oWriterPPTX->save("sample.pptx");
?>