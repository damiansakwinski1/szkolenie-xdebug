<?php

class Db
{
    public static function query(int $executionTime)
    {
        for ($i = 0; $i < $executionTime * 1e5; $i++) {}
    }
}
