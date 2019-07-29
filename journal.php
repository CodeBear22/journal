<?php

include "src/model/journal/JournalReadWrite.php";
use src\model\journal\JournalReadWrite;


$journalCommands = [
    "Create journal : press 1",
    "Show journals : press 2",
    "Show last 'n' journal(s) : press 3",
    "To exit : press 0"
];

$storageType = "FILE";
$user = "kunal";
$decryptionKey = "enrique";


$journalReadWriteObj = new JournalReadWrite($storageType, $user, $decryptionKey);


while (1 == 1) {
    print implode("\n", $journalCommands);
    print "\n";
    $handle = fopen ("php://stdin","r");
    $option = fgets($handle);
    print_r($option);

    print "\n";
    if(is_numeric($option))
    {
        print "Only integer value allowed";
    } else {

        switch ($option) {
            case 1 :
                print "create journal";
                break;
            case 2 :
                print "show journals";
                break;
            case 3 :
                print "show n journal";
                break;
            case 0 :
                exit();
                break;
            default :
                print "wrong option entered";
        }
    }
    print "\n";
}