<?php
require "config.php";

use App\Employee;

if (isset($_GET['dept_no'])) {
    $dept_no = $_GET['dept_no'];
    $employees = Employee::getById($dept_no);
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
</head>
<body>
    <a href="index.php" class="return-btn">Return</a>
    <div class="container">
        <div class="row header">
            <h1>LIST OF EMPLOYEES</h1>
        </div>
        <?php if (isset($employees) && count($employees) > 0) { ?>
            <table id="myTable" class="table table-striped">
                <thead>
                    <tr>
                        <th>TITLE</th>
                        <th>FULL NAME</th>
                        <th>BIRTHDAY</th>
                        <th>AGE</th>
                        <th>GENDER</th>
                        <th>HIRE DATE</th>
                        <th>SALARY</th>
                        <th>SALARY HISTORY</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($employees as $employee) { ?>
                        <tr>
                            <td><?php echo $employee->getTitle(); ?></td>
                            <td><?php echo $employee->getFullName(); ?></td>
                            <td><?php echo $employee->getBirth(); ?></td>
                            <td><?php echo $employee->getAge(); ?></td>
                            <td><?php echo $employee->getGender(); ?></td>
                            <td><?php echo $employee->getStartDate(); ?></td>
                            <td><?php echo $employee->getSalary(); ?></td>
                            <td>
                                <a href="show-salary.php?emp_no=<?php echo $employee->getEmpNo(); ?>">VIEW</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php } else { ?>
            <p>No employees found for department <?php echo $dept_no; ?></p>
        <?php } ?>
    </div>
</body>
</html>
