<?php

namespace src\model\journal\Storages;

class FileStorage implements StorageInterface
{

    private $journalEntries;
    CONST FILE_STORAGE_DIR = "../../../dataFiles/";

    public function __construct()
    {
        echo "dsfds";
//        $filePath = self::FILE_STORAGE_DIR . "journalEntries.csv";
//        $file = fopen($filePath,"w");
//        print_r(fgetcsv($file));
    }

    public function saveJournal($entry)
    {
        // TODO: Implement saveJournal() method.
    }

    public function showJournals()
    {
        // TODO: Implement showJournals() method.
    }

    public function deleteLastJournal()
    {
        // TODO: Implement deleteLastJournal() method.
    }

    public function makeConnection()
    {

    }


}