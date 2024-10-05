<!DOCTYPE html>
<html lang="en">
<?php include('base.php'); 
session_start();
if(!isset($_SESSION['userid'])){
    header('Location: login.php');
}

?>
<body>
    <?php 
    include('db.php');
    
    ?>
    <h1> list of students </h1>

    <?php 
        if(isset($_SESSION['success'])) {  ?>
            
            <div class="alert alert-info alert-dismissible fade show" role="alert">
  <?php echo $_SESSION['success']; ?>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

<?php   unset($_SESSION['success']); ?>

      <?php  }?>
    
    <?php  

    $sql = 'SELECT * FROM students';
    $stmt = $conn->query($sql);
    $students  = $stmt->fetchAll();

    ?>
<div class="container">
    <a href="create.php"  class="btn btn-secondary"> Add </a>
    <div class="row justify-content-center">
        <div class=" m-4">
        <table class="table table-hover table-striped ">
        <thead>
            <tr>
                <th> Id </th>
                <th>
                    Name
                </th>
                <th>
                    Address
                </th>
                <th>
                    Phone
                </th>
            </tr>
        </thead>
        <tbody>
          <?php
             foreach($students as $student) { ?> 
               <tr>
                <td>
                <?php echo $student['ID']; ?>
                </td>
                <td>
                <?php echo $student['name']; ?>
                </td>
                <td>
                <?php echo $student['address']; ?>
                </td>  
                <td>
                <?php echo $student['phone']; ?>
                </td>
                <td> <a href="detail.php?id=<?php echo $student['ID']; ?>" class="btn btn-info btn-sm"> View  </a>  </td>
                
               </tr>
           <?php }?>
        
          
        </tbody>
    </table>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>