<?php

class ProductRepository
{
    public function findById($id) //1mb
    {
        //nic
        Db::query(rand(800, 900));
        //nic
    }

    public function find($parameters)
    {
        Db::query(rand(500, 700));
    }
}
