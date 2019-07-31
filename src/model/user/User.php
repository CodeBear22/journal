<?php

namespace src\model\user;

class User
{
    private  $allUserFileData;
    CONST MAX_USER_COUNT = 10;
    CONST USER_FILE_NAME = "UserData.csv";
    CONST FILE_STORAGE_DIR = "/home/shopclues/journal/src/dataFiles/users/";

    public function __construct()
    {
        $this->fetchUsersData();
    }


    public function signUpProcess($username, $password)
    {
        if(count($this->allUserFileData) < self::MAX_USER_COUNT)
        {
            $user = [$username, md5($password), time()];
            array_push($user);
            $this->__writeUserssToFile();
            print "User successfully created. Please login to proceed." . PHP_EOL;
        } else {
            print "Maximum account number exceeded." . PHP_EOL;
        }
    }

    public function loginProcess($username, $password)
    {
        foreach ($this->allUserFileData as $user)
        {
            if($user[0] == $username && $user[1] == md5($password))
            {
                return true;
            }
        }
        return false;
    }

    private function fetchUsersData()
    {
        $filePath = self::FILE_STORAGE_DIR . self::USER_FILE_NAME;
        $file = fopen($filePath,"r");

        $this->allUserFileData = array();

        while (($row = fgetcsv($file)) !== FALSE)
        {
            array_push($this->allUserFileData, $row);
        }
    }

    private function __writeUserssToFile()
    {
        $file = fopen(self::FILE_STORAGE_DIR . self::USER_FILE_NAME, 'w+');

        foreach ($this->allUserFileData as $userData) {
            fputcsv($file, $userData);
        }
        fclose($file);
    }
}