<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="barcode" style="text-align:center">
<?php
                             $generator = new Picqer\Barcode\BarcodeGeneratorPNG();
                             echo '<img style="width: 135px;" src="data:image/png;base64,' . base64_encode($generator->getBarcode($id, $generator::TYPE_CODE_128)) . '">';                                    
                             echo '<br>';
                             echo $id;
                            ?>
    </div>
</body>
</html>