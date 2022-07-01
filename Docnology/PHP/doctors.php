 <?php
    require("dbconnect.php");

    
    if (isset($_POST['search'])){
        if ($_POST['search-box'] === ""){
            $sql = "SELECT * FROM doctors";
            $result = $conn->query($sql);
        } else {
            $search_box = $_POST['search-box'];
            $searchString = "%$search_box%";
            $sql = "SELECT * FROM doctors WHERE fullname LIKE ? or specialty LIKE ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('ss',$searchString,$searchString);
            $stmt->execute();
            $result = $stmt->get_result();
        }
    } else {
        $sql = "SELECT * FROM doctors";
        $result = $conn->query($sql);    
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
    <link rel="stylesheet" href="../Styles/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../Styles/doctors.css">
</head>
<style>
    /* remember you can change the colour for stuff as well as the font and placemnt. id advise you to do so */
    /* modal is what shows the doctor's availability */
    .availability-modal{
        z-index: 1;
        position: fixed;
        background-color: #424242;
        width: 100%;
        height: 100%;
        left:0;
        top:0;
        padding: 100px;
    }

    .modal-content{
        margin: auto;
        background-color: white;
        height: auto;
        width: 50%;
        text-align: center;
    }

    .modal-header{
        text-align:center;
    }

    .close-modal i{
        font-size: 40px;
        color: darkblue;
    }

    .close-modal:hover i{
        color: red;
        cursor: pointer;
    }
    

    img {
        border: 1px solid #ddd;
        border-radius: 4px;
        padding: 5px;
        width: 220px;
        height:200px;
        
    }
    .col {
        float:left;
        width:33.33%;
        padding:5px;
    }
    .r::after {
        content:"";
        display: table;
        clear:both;

    }
    .doc{
    display: grid;
    gap: 20px;
    grid-template-columns: repeat(3, 1fr);
    }
    label{

        positioon :center;
    }
  
   
</style>


<body>
    <!-- so the search works by the user being able to enter the doctor's name or any letter similar or their specialty
    it will show doctors with the speciality or with the letters in their name 
    maybe you can add a sort feature or you can create two buttons 
    one that allows search by name and one that allows search by specialty
    only thing you'd have to do is tailor the prepared statement above and add another if statement and check which button is set 
    and run the query based on that -->
    <form action="../PHP/doctors.php" method="POST">
            <div class="form-group">
                <label class="control-label" for="search-box"><b>Search For Doctor</b></label>
                <div>
                <input type="text" class="form-control" name="search-box" placeholder="Enter Doctor Name or Specialty">
                </div>
                <div>
                <button type="submit" name="search" class="btn btn-success">Search</button>
                </div>
            </div> 
    </form>
    <div>
        <h1>List of Doctors</h1>
    </div>
    <div class="doc">
    <?php if ($result->num_rows > 0): ?>
        <?php session_start();?>
        
        <?php while($doctor = $result->fetch_assoc()): ?>
            <?php $availability=json_decode($doctor['availability'],true);?>
                <div class ="final">
                    <div class ="r">
                        <div class ="col">
                            <img src="../Images/img/<?php echo $doctor['image'];?>" >
                        </div>
                    </div>
                    <h4><?php echo $doctor['fullname'];?></h4>
                    <span>Specialization: <?php echo $doctor['specialty'];?></span>
                    
                    <div id="modal<?php echo $doctor['dID'];?>" class="availability-modal d-none">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title">Availability</h1>
                                <a class="close-modal" id="close-modal" onclick='closeModal(<?php echo $doctor["dID"];?>);return false;'><i class="fas fa-xmark"></i></a>
                            </div>
                            
                            <div class="modal-body">
                                <fieldset> 
                                    <h4>Monday: </h4>
                                    <?php if(count($availability[0]) === 1):?>
                                        <h4><?php echo $availability[0][0];?></h4>
                                    <?php elseif(count($availability[0]) === 2): ?>
                                        <h4> <?php echo $availability[0][0];?> - <?php echo $availability[0][1];?></h4>
                                    <?php endif;?>
                                </fieldset>
                                
                                <hr/>
                                <fieldset>
                                    <h4>Tuesday: </h4>
                                    <?php if(count($availability[1]) === 1):?>
                                        <h4><?php echo $availability[1][0];?></h4>
                                    <?php elseif(count($availability[1]) === 2): ?>
                                        <h4> <?php echo $availability[1][0];?> - <?php echo $availability[1][1];?></h4>
                                    <?php endif;?>
                                </fieldset>
                                <hr/>
                                <fieldset>
                                    <h4>Wednesday: </h4>
                                    <?php if(count($availability[2]) === 1):?>
                                        <h4><?php echo $availability[2][0];?></h4>
                                    <?php elseif(count($availability[2]) === 2): ?>
                                        <h4> <?php echo $availability[2][0];?> - <?php echo $availability[2][1];?></h4>
                                    <?php endif;?>
                                </fieldset>
                                <hr/>
                                <fieldset>
                                    <h4>Thursday: </h4>
                                    <?php if(count($availability[3]) === 1):?>
                                        <h4><?php echo $availability[3][0];?></h4>
                                    <?php elseif(count($availability[3]) === 2): ?>
                                        <h4> <?php echo $availability[3][0];?> - <?php echo $availability[3][1];?></h4>
                                    <?php endif;?>
                                </fieldset>
                                <hr/>
                                <fieldset>
                                    <h4>Friday: </h4>
                                    <?php if(count($availability[4]) === 1):?>
                                        <h4><?php echo $availability[4][0];?></h4>
                                    <?php elseif(count($availability[4]) === 2): ?>
                                        
                                        <h4> <?php echo $availability[4][0];?> - <?php echo $availability[4][1];?></h4>
                                    <?php endif;?>
                                </fieldset>
                                <hr/>
                                <fieldset>
                                    <h4>Saturday: </h4>
                                    <?php if(count($availability[5]) === 1):?>
                                        <h4><?php echo $availability[5][0];?></h4>
                                    <?php elseif(count($availability[5]) === 2): ?>
                                        <h4> <?php echo $availability[5][0];?> - <?php echo $availability[5][1];?></h4>
                                    <?php endif;?>
                                </fieldset>
                            </div>
                        </div>
                </div>
                <a href="javascript:;" onclick="showModal(<?php echo $doctor['dID'];?>)" id="modal<?php echo $doctor['dID'];?>">View Availability</a>
                    
                <form action="../PHP/appointment.php" method="POST">
                    <button type="submit" class="btn btn-outline-warning" value="<?php echo $doctor['dID']?>" name="appointment_btn">Set Appointment</button>
                </form>
                    
        </div>
        <?php endwhile; ?>
    <?php else: ?>
                <div>
                   <h2>No Data Found</h2>
                </div>
    <?php endif; ?>
    
    </div>
</body>

<script src="../Scripts/bootstrap.min.js"></script>
<script>

    function showModal(ID){
        let modal = "modal";
        modalID = modal.concat(ID);
        document.getElementById(modalID).classList.remove("d-none"); 
    }
    
    function closeModal(ID){
        let modal = "modal";
        modalID = modal.concat(ID);
        document.getElementById(modalID).classList.add("d-none");
    }
        
</script>

</html>