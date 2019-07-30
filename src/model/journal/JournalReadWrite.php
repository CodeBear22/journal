<?php



namespace src\model\journal;
use src\model\journal\storages\FileStorage;

class JournalReadWrite
{
    private $storageObject;
    private $defaultStorage = "FILE";

    public function __construct($user, $encryptionKey, $storageType)
    {
        if($storageType != "")
            $storageType = $this->defaultStorage;

        if($storageType == "FILE")
        {
            require_once("src/model/journal/storages/FileStorage.php");
            $this->storageObject = new FileStorage();
        }
    }

    public function getAllJournals()
    {
        $journals = $this->storageObject->fetchJournals();
        return $journals;
    }

    public function createJournal($journalText)
    {
        $this->storageObject->saveJournal($journalText);
    }

    private function encryptText()
    {
//        mcrypt_ecb(MCRYPT_DES, $key_value, $plain_text, MCRYPT_ENCRYPT)
    }
}