<?php
namespace  src\model\journal;

include_once "src/model/journal/storages/FileStorage.php";
//use src\model\journal\FileStorage;

//use src\model\journal\storages\FileStorage;

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
            $this->storageObject = new FileStorage();
        }

    }
}