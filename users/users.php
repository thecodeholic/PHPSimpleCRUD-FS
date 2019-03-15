<?php
/*
I removed "address" and "company" from json
*/


function getUsers()
{
    return json_decode(file_get_contents(__DIR__ . '/users.json'), true);
}

/**
 * This method is to avoid this long line to be repeated many times
 * file_put_contents(__DIR__ . '/users.json', json_encode($users));
 *
 * @param $users
 */
function putUsers($users)
{
    // Without JSON_PRETTY_PRINT json will be saved on a single line in json file.
    // Remove JSON_PRETTY_PRINT and see what happens
    file_put_contents(__DIR__ . '/users.json', json_encode($users, JSON_PRETTY_PRINT));
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

/**
 * Create user from $data and return just created user id
 *
 * @param $data
 * @return array
 */
function createUser($data)
{
    $users = getUsers();

    // Generate a random ID and put in $data
    $data['id'] = rand(1000000, 2000000);
    $users[] = $data;
    putUsers($users);

    return $data;
}

function updateUser($data, $id)
{
    $users = getUsers();
    foreach ($users as $i => $user) {
        if ($user['id'] == $id) {
            /*
            Merge two associative arrays, overwriting properties from the second array to the first one
            */
            $users[$i] = array_merge($user, $data);
            break;
        }
    }
    putUsers($users);
}

function deleteUser($id)
{
    $users = getUsers();
    // Search for user by $id and remove the user from the array
    // We need to iterate with "$i" index because removing $user from array can only be done with index.
    foreach ($users as $i => $user) {
        if ($user['id'] == $id) {
            /*
            Remove the element from the array with unset() method or with array_splice()
            heck this link to know the exact difference between these two
            https://www.philipphoffmann.de/post/your-php-array-indices-getting-messed-up-when-unsetting-values/
            */
//            unset($users[$i]);
            array_splice($users, $i, 1);
            /*
            Uncomment the following lines, delete the first user from the table and see the indices of the
            elements in array.
            */
            /*
            echo '<pre>';
            var_dump($users);
            echo '</pre>';
            exit;
            */
        }
    }
    putUsers($users);
}