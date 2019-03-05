<?php

function getUsers()
{
    return json_decode(file_get_contents(__DIR__ . '/users.json'), true);
}

function getUserById($id)
{
    $users = getUsers();
    foreach ($users as $user) {
        if ($user['id'] == $id) {
            return $user;
        }
    }
    return null;
}

function createUser($data)
{
    $users = getUsers();
    $users[] = $data;
    file_put_contents(__DIR__ . '/users.json', json_encode($users));
}

function updateUser($data, $id)
{
    $users = getUsers();
    foreach ($users as $i => $user) {
        if ($user['id'] == $id) {
            $users[$i] = $user + $data;
        }
    }
    file_put_contents(__DIR__ . '/users.json', json_encode($users));
}