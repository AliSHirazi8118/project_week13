<?php 

$serverName = "localhost";
$userName = "root";
$password = "";
$dbname = 'employee_information';


    $connect = new PDO("mysql:host=$serverName;dbname=$dbname" , $userName , $password);
    $connect->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE  , PDO::ERRMODE_EXCEPTION);


    echo "_______________________________________________________ Q1"."<br>";

    $codeSQL = $connect->query("SELECT name FROM employee WHERE Salary < 1000");
    while ($row=$codeSQL->fetch()) {
        echo $row["name"] ."<br>" ;
    }

    echo "_______________________________________________________ Q2"."<br>";

    $codeSQL = $connect->query("SELECT name, Unit_Name 
                                FROM employee 
                                INNER JOIN administrative_unit ON employee.Unit_Code = administrative_unit.Unit_Code;");
    while ($row=$codeSQL->fetch()) {
        echo $row["name"] ."____________". $row["Unit_Name"] ."<br>" ;
    }

    echo "_______________________________________________________ Q3"."<br>";
    $codeSQL = $connect->query("SELECT administrative_unit.Unit_Name, AVG(Salary)
                                FROM employee
                                INNER JOIN administrative_unit
                                ON employee.Unit_Code = administrative_unit.Unit_Code
                                GROUP BY administrative_unit.Unit_Name
                                ");
    while ($row=$codeSQL->fetch()) {
        echo $row["Unit_Name"]."____________". $row["AVG(Salary)"]  ."<br>" ;
    }

    echo "_______________________________________________________ Q4"."<br>";
    $codeSQL = $connect->query("SELECT City, Unit_Name
                                FROM administrative_unit
                                INNER JOIN branch_information
                                ON administrative_unit.Branch_code = branch_information.Branch_code
                                WHERE City = 'Esfahan' 
                                ");
    while ($row=$codeSQL->fetch()) {
    echo $row["Unit_Name"]."<br>" ;
    }

    echo "_______________________________________________________ Q5"."<br>";

    $codeSQL = $connect->query("SELECT branch_information.Branch_Name, COUNT(Unit_Code)
                                FROM administrative_unit
                                INNER JOIN branch_information
                                ON administrative_unit.Branch_code = branch_information.Branch_code
                                GROUP BY branch_information.Branch_Name
                                ");
    while ($row=$codeSQL->fetch()) {
    echo $row["Branch_Name"]."____________". $row["COUNT(Unit_Code)"]  ."<br>" ;
    }

    echo "_______________________________________________________ Q6"."<br>";

    $codeSQL = $connect->query("SELECT Name, Branch_Name
                                FROM employee
                                INNER JOIN administrative_unit ON employee.Unit_Code = administrative_unit.Unit_Code
                                INNER JOIN branch_information ON administrative_unit.Branch_code = branch_information.Branch_code
                                ");
    while ($row=$codeSQL->fetch()) {
    echo $row["Name"]."____________". $row["Branch_Name"]  ."<br>" ;
    }

    echo "_______________________________________________________ Q7"."<br>";

    $codeSQL = $connect->query("SELECT AVG(Salary)
                                FROM employee
                                INNER JOIN administrative_unit ON employee.Unit_Code = administrative_unit.Unit_Code
                                INNER JOIN branch_information ON administrative_unit.Branch_code = branch_information.Branch_code
                                WHERE City = 'Esfahan'
                                ");
    while ($row=$codeSQL->fetch()) {
    echo "Avg Salary in Esfahan branch : ". $row["AVG(Salary)"]."<br>" ;
    }









?>