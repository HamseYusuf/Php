<!DOCTYPE html>
<html lang="en">
<?php 

include('db.php');
include('base.php');
$id = $_GET['id'];

$sql = 'SELECT * FROM students WHERE ID = :id';
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id' , $id);
$stmt->execute();
$student = $stmt->fetch();

?>
<body>

<div class="container">
    <div class="row justify-content-center">\g 
        <div class="col-8">
           <div class="border border-3">
           <div class="card">
                <div class="card-body">
                    <div class="display-6 text-center m-4">Details of <?php echo $student['name']; ?></div>
                    <div>
                        <p class="lead"> <strong>Student ID </strong> <?php echo $student['ID']; ?> </p>
                        <p class="lead"> <strong>Student Name </strong> <?php echo $student['name']; ?> </p>
                        <p class="lead"> <strong>Student address </strong> <?php echo $student['address']; ?> </p>
                        <p class="lead"> <strong>Student phone</strong> <?php echo $student['phone']; ?> </p>
                    </div>
                    <div>
                        <a href="update.php?id=<?php echo $student['ID']; ?>" class="btn btn-primary">Update</a>
                        <a href="delete.php?id=<?php echo $student['ID']; ?>" class="btn btn-danger">Delete</a>
                    </div>

                </div>
            </div>
           </div>
        </div>
    </div>
</div>

    
</body>
</html>