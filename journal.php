<?php

require('src/handlers/JournalCommandHandler.php');
require('src/handlers/UserCommandHandler.php');

$storageType = "FILE";
$user = "kunal";
$decryptionKey = "enrique";

$loggedIn = FALSE;

$userCommandsHandler = new UserCommandHandler();

while($loggedIn == FALSE)
{
    $userCommandsHandler->showAllCommands();
    $userCommandsHandler->getUserCommandAndExecute();
}


$journalCommandsHandler = new JournalCommandHandler($user, $decryptionKey, $storageType);


while (1 == 1) {

    $journalCommandsHandler->showAllCommands();
    $journalCommandsHandler->getUserCommandAndExecute();
}



