<?php
$connection = mysqli_connect('localhost', 'root', '', 'testdb');

function getData($query)
{
    global $connection;
    $result = mysqli_query($connection, $query);

    if (!$result) { // if query failed
        echo mysqli_error($connection);
    }

    $data = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }

    return $data;
}

function searchData($query)
{
    global $connection;
    $result = mysqli_query($connection, $query);

    if (!$result) {
        echo mysqli_error($connection);
    }

    $data = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }

    return $data;
}

function createRelationshipTable($query)
{
    global $connection;
    $result = mysqli_query($connection, $query);

    return $result;
}
