<?php

require('src/handlers/JournalCommandHandler.php');

$storageType = "FILE";
$user = "kunal";
$decryptionKey = "enrique";


$journalCommandsHandler = new JournalCommandHandler($user, $decryptionKey, $storageType);


while (1 == 1) {

    $journalCommandsHandler->showJournalCommands();
    $journalCommandsHandler->getUserCommandAndExecute();
}



