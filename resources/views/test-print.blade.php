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
        // use Mike42\Escpos\PrintConnectors\FilePrintConnector;
        // use Mike42\Escpos\Printer;
        // $connector = new FilePrintConnector("LPT1");
        // $printer = new Escpos($connector);
        // $printer -> text("Hello World\n");
        // $printer -> cut();
        // $printer -> close();
        // dd('FilePrinting');

        use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
        use Mike42\Escpos\CapabilityProfile;
        // $profile = CapabilityProfile::load("SP2000");
        $connector = new WindowsPrintConnector("EPSON TM-T88V");
        // dd($connector);
        $printer = new Printer($connector);
        $printer->text("SWAAD!\n");
        $printer->cut();
        $printer->close();
        dd('WindowsPrinting');

    ?>
</body>

</html>