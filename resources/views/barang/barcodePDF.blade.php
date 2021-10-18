<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
</style>
<body>
    <div class="halaman">
        <table>
            <?php
            $stop=1;
            $break =0;
            $count = 0;
            $col = 1; 
            $kolom = (($baris-1)*5) + $kolom;
            for($i=1; $i<=$long; $i++){
            $stop = $i*5;
            ?>
            <tr>
                
                @foreach($data as $barangs)
                @if($break < $stop)
                @if($count <= $break)
                <td>
                     <div class="barcode" style="text-align:center;width:143px;height:63px;padding-top: 5px;margin-left:-15px;margin-right:16px;font-size:12px">
                    @if($i >= $baris AND $kolom <= $break)
                     <div class="IsiBarcode" style="display:block">
                        <?php
                             $generator = new Picqer\Barcode\BarcodeGeneratorPNG();
                             echo '<img style="width: 135px;" src="data:image/png;base64,' . base64_encode($generator->getBarcode($barangs->id_barang, $generator::TYPE_CODE_128)) . '">';                                    
                             /*
                             $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
                             echo $generator->getBarcode($barangs->id_barang, $generator::TYPE_CODE_128);
                             */
                            ?>
                            <div class="nomor" style="text-align:left">
                                <?='('.$i.','.$col.')'?>
                            </div>
                             <?=$barangs->id_barang?>
                             <br>
                             <?= $barangs->nama_barang?>
                             <?php $col++;?>
                     </div>
                     @else
                     <div class="IsiBarcode" style="display:none">
                         <?php
                             $generator = new Picqer\Barcode\BarcodeGeneratorPNG();
                             echo '<img style="width: 135px;" src="data:image/png;base64,' . base64_encode($generator->getBarcode($barangs->id_barang, $generator::TYPE_CODE_128)) . '">';                                    
                                                 /*
                                                 $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
                                                 echo $generator->getBarcode($barangs->id_barang, $generator::TYPE_CODE_128);
                                                 */
                        ?>
                             <br>
                             <?='('.$i.','.$col.')'.$barangs->id_barang?>
                             <br>
                             <?= $barangs->nama_barang?>
                             <br>
                             <?php $col++;?>
                     </div>
                     @endif
                     </div>
                     <br>
                    </td>
                    @else
                    <?php $col=1; ?>
                    @endif
                    @else
                    @endif
                    @if($break == $stop)
                    <?php $count= $stop;$break=0;?>
                    @break
                    @else
                    @endif
                    <?php $break++;?>
                @endforeach
            </tr>
            <?php }; ?>
        </table>
    </div>
</body>
</html>