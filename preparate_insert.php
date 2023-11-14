<?php
$newClientsString = '[{
  "first_name": "Royall",
  "birthday": "2023-05-22",
  "cars": 6,
  "vip": false
}, {
  "first_name": "Selia",
  "birthday": "2023-06-25",
  "cars": 2,
  "vip": false
}, {
  "first_name": "Derril",
  "birthday": "2022-12-02",
  "cars": 1,
  "vip": false
}, {
  "first_name": "Doloritas",
  "birthday": "2023-10-07",
  "cars": 1,
  "vip": true
}, {
  "first_name": "Leonie",
  "birthday": "2023-09-02",
  "cars": 1,
  "vip": true
}, {
  "first_name": "Kristofer",
  "birthday": "2023-07-14",
  "cars": 6,
  "vip": false
}, {
  "first_name": "Stu",
  "birthday": "2023-02-24",
  "cars": 6,
  "vip": true
}, {
  "first_name": "Rhody",
  "birthday": "2023-02-15",
  "cars": 1,
  "vip": true
}, {
  "first_name": "Dominica",
  "birthday": "2023-07-28",
  "cars": 5,
  "vip": true
}, {
  "first_name": "Berty",
  "birthday": "2022-11-26",
  "cars": 3,
  "vip": true
}, {
  "first_name": "Beret",
  "birthday": "2023-01-07",
  "cars": 9,
  "vip": true
}, {
  "first_name": "Emlynne",
  "birthday": "2023-03-28",
  "cars": 7,
  "vip": false
}, {
  "first_name": "Gail",
  "birthday": "2023-10-27",
  "cars": 5,
  "vip": false
}, {
  "first_name": "Spence",
  "birthday": "2023-11-13",
  "cars": 7,
  "vip": false
}, {
  "first_name": "Jerrylee",
  "birthday": "2023-02-18",
  "cars": 4,
  "vip": true
}, {
  "first_name": "Laney",
  "birthday": "2023-10-09",
  "cars": 4,
  "vip": true
}, {
  "first_name": "Dillon",
  "birthday": "2023-03-04",
  "cars": 1,
  "vip": true
}, {
  "first_name": "Anna",
  "birthday": "2023-07-12",
  "cars": 6,
  "vip": false
}, {
  "first_name": "Mark",
  "birthday": "2023-02-15",
  "cars": 10,
  "vip": true
}, {
  "first_name": "Nickey",
  "birthday": "2023-07-12",
  "cars": 9,
  "vip": false
}]';

$newClients = json_decode($newClientsString, );

require 'conection.php';
$stmt = $link->stmt_init();

$stmt->prepare("INSERT INTO clients (first_name, birthday, cars, vip) VALUES (?, ?, ?, ?)");

$stmt->bind_param("ssis", $name, $birthday, $cars, $vip);

foreach ($newClients as $client) {
  $name = $client->first_name;
  $birthday = $client->birthday;
  $cars = $client->cars;
  $vip = $client->vip;
  $stmt->execute();
}

echo "Insertados";

$stmt->close();
$link->close();