<?php

// Geeft een DB connectie terug
function DBConnect()
{
    $conn = new PDO('sqlite:bmi.sqlite');
    return $conn;

}

// Voert een DB query uit en geeft het resultaat terug
function DBQuery($conn,$q,$data=[])
{
    $stmt = $conn->prepare($q);
    $stmt->execute($data);
    return $stmt;
}


// Bereken het BMI voor een gegeven lengte en gewicht
function calculateBmi($length, $weigth)
{
    $length = $length/100;
    $bmi = $weigth / pow($length,2);
    $bmi = round($bmi,2);

    return $bmi;
}


// Geeft BMI feedback voor het gegeven BMI
function getBmiResult($bmi)
{
    if ($bmi < 18.5) {
        $result['class'] = 'danger';
        $result['verdict'] = 'Underweight';
    } elseif ($bmi < 25) {
        $result['class'] = 'success';
        $result['verdict'] = 'Normal weight';
    } elseif ($bmi < 30) {
        $result['class'] = 'warning';
        $result['verdict'] = 'Overweight';
    } else {
        $result['class'] = 'danger';
        $result['verdict'] = 'Serious overweight';
    }
    return $result;
}


// Valideert de BMI gegevens en geeft de foutmeldingen terug
function validateData($data) {

    $formErrors=[];
    if (empty($data['name'])) {
        $formErrors['name'] = 'Name is required.';
    }

    if (empty($data['surname'])) {
        $formErrors['surname'] = 'Surname is required.';
    }

    if (empty($data['age'])) {
        $formErrors['age'] = 'Age is required.';
    }

    if (empty($data['weight'])) {
        $formErrors['weight'] = 'Weight is required.';
    }

    if (empty($data['length'])) {
        $formErrors['length'] = 'Length is required.';
    }
    return $formErrors;
}


// Voegt de BMI gegevens toe aan de databank
function addData($data)
{
    $conn = DBConnect();
    $q = "INSERT INTO bmi (name, surname, age, weight, length) VALUES (:name, :surname, :age, :weight, :length)";
    DBQuery($conn,$q,$data);

    $stmt = $conn->prepare($q);
    $stmt->execute($data);
    $id = $conn->lastInsertId();
    return $id;
}


// Zoekt alle BMI gegevens op uit de DB
function getAllData()
{

    $conn = DBConnect();
    $q = "SELECT * FROM bmi";
    $stmt = DBQuery($conn,$q);
    $results = $stmt->fetchAll();
    return $results;

}


// Zoekt de BMI gegevens van een specifieke user op
function getDataByID($id)
{

    $conn = DBConnect();
    $q = "SELECT * FROM bmi WHERE id =:id";
    $data = ['id' =>$id];
    $stmt = DBQuery($conn,$q,$data);
    $bmi_data = $stmt->fetch();
    return $bmi_data;

}