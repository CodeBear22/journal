<?php
namespace  model\journal;

class JournalReadWrite
{
    private $storageObject;
    private $defaultStorage = "FILE";

    public function __construct($user, $encryptionKey, $storageType)
    {
        if($storageType == "")
            $storageType = $this->defaultStorage;

    }
}