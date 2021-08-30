<?php


namespace App;
use App\Logger;

class DBLogger implements Logger{

    public function writeToLog()
    {
        echo "write to log";
    }

    public function readFromLog()
    {
      echo "read from log";
    }
}