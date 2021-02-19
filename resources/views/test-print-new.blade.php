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
        /* Call this file 'hello-world.php' */
        use Mike42\Escpos\PrintConnectors\FilePrintConnector;
        use Mike42\Escpos\Printer;
        // $connector = new FilePrintConnector("php://stdout");
        // $printer = new Printer($connector);
        // $printer -> text("Hello World!\n");
        // $printer -> cut();
        // $printer -> close();
        // use Mike42\Escpos\PrintConnectors\FilePrintConnector;
        // use Mike42\Escpos\Printer;
        // $connector = new FilePrintConnector("EPSON TM-T88V");
        // $printer = new Escpos($connector);
        // $printer -> text("Hello World\n");
        // $printer -> cut();
        // $printer -> close();
        // dd('FilePrinting');

        use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
        // use Mike42\Escpos\CapabilityProfile;
        // $profile = CapabilityProfile::load("SP2000");
        $connector = new WindowsPrintConnector("LPT1");
        // // $connector = new WindowsPrintConnector("smb://User01@Kasse1/WORKGROUP/Epson TM-T88V");

        // // dd($connector);
        $printer = new Printer($connector);
        $printer = new Escpos($connector);

        
        $printer->text("SWAAD!\n");
        $printer->cut();
        $printer->pulse();
        $printer->close();
        dd('WindowsPrinting');


    //     try {
    //     // Enter the share name for your USB printer here
    //     //$connector = "POS-58";
    //     // $connector = new WindowsPrintConnector("TM-T88V");
    //     dd("abc");
    //     $connector = new WindowsPrintConnector("smb://192.168.0.107");
    //     /* Print a "Hello world" receipt" */
    //     $printer = new Printer($connector);
    //     /* Name of shop */
    //     $printer->selectPrintMode(Printer::MODE_DOUBLE_WIDTH);
    //     $printer->setJustification(Printer::JUSTIFY_CENTER);
    //     $printer->text("POS Mart\n");
    //     $printer->selectPrintMode();
    //     $printer->text("Today Closing.\n");

    //     $printer->feed();
    //     /* Title of receipt */
    //     $printer->setEmphasis(true);

        
    //     $printer->feed(2);
        
    //     /* Cut the receipt and open the cash drawer */
    //     $printer->cut();
    //     $printer->pulse();
    //     /* Close printer */
    //     $printer->close();
    //     // echo "Sudah di Print";
    //     return true;
    // } catch (Exception $e) {
    //     $message = "Couldn't print to this printer: " . $e->getMessage() . "\n";
    //     return false;
    // }

    ?>
</body>

</html>