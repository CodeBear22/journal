<?php

namespace src\model\journal\storages;

require_once("src/model/journal/storages/StorageInterface.php");

class FileStorage implements StorageInterface
{

    private $journalEntries;
    private $filename;
    CONST MAX_JOURNALS_COUNT = 50;
    CONST FILE_STORAGE_DIR = "/home/shopclues/journal/src/dataFiles/";


    public function __construct()
    {
        $this->filename = "journalEntries.csv";
        $filePath = self::FILE_STORAGE_DIR . "journalEntries.csv";
        $file = fopen($filePath,"r");

        $this->journalEntries = array();

        while (($row = fgetcsv($file)) !== FALSE)
        {
            array_push($this->journalEntries, $row);
        }
    }

    public function saveJournal($entry)
    {
        $journalEnntry = [
            time(),
            $entry
        ];

        if(count($this->journalEntries) == self::MAX_JOURNALS_COUNT)
            $this->journalEntries = array_shift($this->journalEntries);
        array_push($this->journalEntries, $journalEnntry);
        $this->__writeJournalsToFile();
    }

    public function fetchJournals()
    {
        return $this->journalEntries;
    }

    public function deleteLastJournal()
    {
        // TODO: Implement deleteLastJournal() method.

        if(count($this->journalEntries) > 0)
        {
            $this->journalEntries = array_shift($this->journalEntries);

            $this->__writeJournalsToFile();
        }
    }

    public function makeConnection()
    {

    }

    private function __writeJournalsToFile()
    {
        $file = fopen(self::FILE_STORAGE_DIR . $this->filename, 'w+');

        foreach ($this->journalEntries as $journalEntry) {
            fputcsv($file, $journalEntry);
        }
        fclose($file);
    }


}