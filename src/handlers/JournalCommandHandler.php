<?php

require('src/model/journal/JournalReadWrite.php');

use src\model\journal\JournalReadWrite;

class JournalCommandHandler
{
    private $JournalReadWriteObject;

    public function __construct($user, $encryptionKey, $storageType)
    {
        $this->JournalReadWriteObject = new JournalReadWrite($user, $encryptionKey, $storageType);
    }

    public function showJournalCommands()
    {
        $journalCommands = [
            "Create journal : press 1",
            "Show journals : press 2",
            "Show last 'n' journal(s) : press 3",
            "To exit : press 0"
        ];

        print implode(PHP_EOL, $journalCommands);
        print PHP_EOL;

    }

    public function getUserCommandAndExecute()
    {
        $userInput = $this->readUserInput();

        if(is_numeric($userInput))
        {
            print "Only integer value allowed";
        } else {

            switch ($userInput) {
                case 1 :
//                print "create journal";
                    $this->executeCreateJournalCommand();
                    break;

                case 2 :
//                print "show journals";
                    $this->executeShowJournalCommands();
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
    }

    private function executeCreateJournalCommand()
    {

        print "Write your journal" . PHP_EOL;

        $journalText = $this->readUserInput();
        $this->JournalReadWriteObject->createJournal($journalText);

        print "Your journal is saved!" . PHP_EOL;
    }

    private function executeShowJournalCommands()
    {
        $jouranls = $this->JournalReadWriteObject->getAllJournals();

        foreach ($jouranls as $jouranl)
        {
            print implode("     ", $jouranl);
            print PHP_EOL;
        }
    }




    private function readUserInput()
    {
        $handle = fopen ("php://stdin","r");
        $input = fgets($handle);

        return $input;
    }

}