<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TEST PRINTING SWAAD</title>
</head>

<body>
    <?php
        use Mike42\Escpos\PrintConnectors\FilePrintConnector;
        use Mike42\Escpos\Printer;
        use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
        use Mike42\Escpos\PrintConnectors\NetworkPrintConnector;
        use Mike42\Escpos\Experimental\Unifont\UnifontPrintBuffer;
        use Mike42\Escpos\PrintConnectors\CupsPrintConnector;
        use Mike42\Escpos\CapabilityProfile;

        try {         
            $connector = new WindowsPrintConnector("smb://DESKTOP-F3ETIGJ/TM-T88V");
            $printer = new Printer($connector);
            $printer->initialize();
            $printer -> text("Hello World!\n");
            $printer -> cut();
            $printer -> close();
   
        } catch (Exception $e) {
            echo "Couldn't print to this printer: " . $e -> getMessage() . "\n";
        }
    ?>
</body>

</html>