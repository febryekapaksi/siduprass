<?php

function userLogin()
{
    $db = \Config\Database::connect();
    return $db->table('tb_user')->where('user_id', session('user_id'))->get()->getRow();
}

function getIdpetugas()
{
    $db = \Config\Database::connect();
    return $db->table('tb_petugas')->where('petugas_user_id', session('user_id'))->get()->getRow();
}
