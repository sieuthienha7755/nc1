<?php 
    session_start();
   
    require "../connect/connect.php";
    if(isset($_GET["p"]))
        $p = $_GET["p"];
    else 
        $p = "";
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Ela Admin - HTML5 Admin Template</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="shortcut icon" href="https://i.imgur.com/QRAUqs9.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
    <link href="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/jqvmap@1.5.1/dist/jqvmap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/weathericons@2.1.0/css/weather-icons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.css" rel="stylesheet" />
<!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <!-- Popper JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script> 
   <style>
    #weatherWidget .currentDesc {
        color: #ffffff!important;
    }
        .traffic-chart {
            min-height: 335px;
        }
        #flotPie1  {
            height: 150px;
        }
        #flotPie1 td {
            padding:3px;
        }
        #flotPie1 table {
            top: 20px!important;
            right: -10px!important;
        }
        .chart-container {
            display: table;
            min-width: 270px ;
            text-align: left;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        #flotLine5  {
             height: 105px;
        }

        #flotBarChart {
            height: 150px;
        }
        #cellPaiChart{
            height: 160px;
        }
#txt {
      text-transform:lowercase;
    }
    #fab {
      border-radius: 50px;
      padding:0;
      padding-left:10px !important;
      padding-right:10px !important;
      position: fixed;
      bottom: 20px;
      right: 20px;
      font-size:30px !important;
    }
    #id, #rollno, #name, #status {cursor: pointer;}
    .navbar-brand.abs
    {
      position: absolute;
      left: 50%;
      text-align: center;
    }

    </style>
</head>
<body>
    <?php require "left1.php"?>
    <div id="right-panel" class="right-panel">
    <?php require "header.php" ?>
      <?php 
            switch ($p) {
                case 'teacher':require "../admin/teacher.php"; break;
                case 'class': require "../admin/class.php"; break;
 
                case 'subject': require "../admin/subject.php"; break;
                case 'course': require "../admin/course.php"; break;
                case 'content': require "content.php"; break; 
                        


               

                    break;
            }
       
        ?>
    <div class="clearfix"></div>

<div class="container-fluid">
    <p class="text-center font-weight-bold" style="margin-top:10;">Students</p>
    <div class="text-center">
      <form class="form-inline" method="GET">
        <label for="cid">Enter Class ID :</label>&nbsp
        <input type="text" name="cid"></input>&nbsp
        <input type="submit" class="btn btn-primary"></input>
      </form>
    </div>
    <?php
    if (isset($_GET['cid'])) {
      $cid = $_GET['cid'];

      echo("<script>console.log('PHP: " . $cid . "');</script>");

      echo "<div class='text-center'><h4>Class ID: ".$cid."</h4></div>";
      ?>

      <div class="table-responsive">
        <?php
        require('connect.php'); 
        $check = $conn->prepare("SELECT * FROM `classinfo` WHERE `classid` = ?");
        $check->bind_param("i", $cid);
        $check->execute();
        $r = $check->get_result();
        if($r->num_rows == 1){
          $query = $conn->prepare("SELECT * FROM `studentinfo` WHERE `classid` = ?");
          $query->bind_param("i", $cid);
          $query->execute();
          $r = $query->get_result();
          echo('<table id="mytable" class="table table-hover"><thead id="tablehead"><tr><th>Select</th><th id="id">ID Card No &#x21D5;</th><th id="rollno">Roll NO &#x21D5;</th><th id="name">Name &#x21D5;</th><th>Username</th><th id="status">Status &#x21D5;</th><th>Edit</th><th>Delete</th></tr></thead><tbody>');
          while ($assoc = $r->fetch_assoc()){
            echo "<tr>";
            echo "<td><input class='get_value' type='checkbox' name='cid[]' value=".$assoc['id']."></td>";
            echo "<td>".$assoc['id']."</td>";
            echo "<td>".$assoc['rollno']."</td>";
            echo "<td>".$assoc['name']."</td>";
            echo "<td>".$assoc['username']."</td>";
            $status = $assoc['status'];
            if ($status == '0') {
              echo "<td></td>";
            }
            else if ($status == '1') {
              echo "<td>Blocked</td>";
            }
            echo '<td><button type="button" class="btn" data-toggle="modal" data-target="#EditModal" data-sid="'.$assoc['id'].'" data-rollno="'.$assoc['rollno'].'" data-name="'.$assoc['name'].'" data-classid="'.$assoc['classid'].'" data-username="'.$assoc['username'].'" data-status="'.$assoc['status'].'">&#x1f58a;</button></td>';
            echo "<td>";
            echo "<form action='../admin/studentdel.php' method='post'  style='width=50%;'>";
            echo "<input name='sid' type='text' value= ".$assoc['id']." style= 'display:none;width:200;'/>";
            echo "<input name='classid' type='number' value= ".$assoc['classid']." style='display:none;'>";
            echo "<input name='rno' type='number' value= ".$assoc['rollno']." style='display:none;'>";
            echo "<button class='cnf btn btn-danger' type='submit' name = 'submit' style='width:50;'>X</button>";
            echo "</form>";
            echo"</td>";
            echo "</tr>";
          } 

          ?>
        </tbody>
      </table>
      <button type="button" name="submit" class="btn btn-danger cnf" id="multi-del">Delete Selected</button> 
      <button id="fab" class="btn btn-primary" type="button" data-toggle="modal" data-target="#addclassModal" >+</button> 
    </div>
  </div>
  <div>
    <?php
  }
  else{
    echo "INVALID CLASS ID";
  }
}
?>
<!-- ADD Modal -->
<div class="modal fade" id="addclassModal">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title"> Add a student to this class </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="../admin/studentadd.php" method="post">
          <div class="form-group">
            <label for="sid" class="col-form-label">ID Card No :</label>
            <input name="sid" type="text" id="txt" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="rno" class="col-form-label">Roll No :</label>
            <input name="rno" type="text" id="txt" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="name" class="col-form-label">Name :</label>
            <input name="name" type="text" id='txt' class="form-control" required>
          </div>
          <div class="form-group">
            <label for="username" class="col-form-label">Username :</label>
            <input name="username" type="text" id='txt' class="form-control" required>
          </div>
          <div class="form-group">
            <label for="password" class="col-form-label">Password :</label>
            <input name="password" type="text" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="classid" class="col-form-label">Class ID :</label>
            <input name="classid" type="number" value="<?php echo $cid;?>" class="form-control" readonly>
          </div>
        </div>

        <div class="modal-footer">
         <input class="btn btn-primary"type="submit" name="submit" value="ADD" >
       </form>
     </div>

   </div>
 </div>
</div> 
<!--EditModal-->
<div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Student</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="../admin/studentedit.php" method="post">
          <div class="form-group">
            <label for="sid" class="col-form-label">ID Card No :</label>
            <input name="sid" type="number" class="form-control sid" readonly>
          </div>
          <div class="form-group">
            <label for="rno" class="col-form-label">Roll No :</label>
            <input name="rno" type="number" class="form-control rollno" required>
          </div>
          <div class="form-group">
            <label for="name" class="col-form-label">Name :</label>
            <input name="name" type="text" class="form-control name" id="txt" required>
          </div>
          <div class="form-group">
            <label for="username" class="col-form-label">Username :</label>
            <input name="username" type="text" class="form-control Username" id="txt" required>
          </div>
          <div class="form-group">
            <label for="password" class="col-form-label">Password :</label>
            <input name="password" type="text" class="form-control Password">
          </div>
          <div class="form-group">
            <label for="classid" class="col-form-label">Class ID:</label>
            <input name="classid" type="text" class="form-control classid" id="txt" required>
          </div>
          <div>
            <label class="mr-sm-2" for="inlineFormCustomSelect">Status</label>
            <select name="status" class="custom-select mr-sm-2 status" id="inlineFormCustomSelect">
              <option selected>Choose</option>
              <option value="1">Block</option>
              <option value="0">Un-Block</option>
            </select>
          </div>

        </div>
        <div class="modal-footer">
          <input type="text" name='cid' value="<?php echo $cid;?>" style='display: none;'></input>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Edit</button>
        </form>
      </div>
    </div>
  </div>
</div>
</div>




<script>
  window.onload = function() {
    document.getElementById('rollno').click();
    document.getElementById('rollno').click();
  };
</script>
<script>
  $(document).ready(function(){  
    $('#multi-del').click(function(){  
     var languages = [];  
     $('.get_value').each(function(){  
      if($(this).is(":checked"))  
      {  
       languages.push($(this).val());  
     }  
   });  

     $.ajax({  
      url:"../admin/studentdelmulti.php",  
      method:"POST",  
      data:{languages:languages}, 
      success:function(text){
        alert(text);
      }  
    });  
   });  
  });  
</script> 
<!--Edit Modal-->
<script>
  $('#EditModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) 
    var sid = button.data('sid')
    var rollno = button.data('rollno')
    var name = button.data('name')
    var username = button.data('username')
    var classid = button.data('classid')
    var status = button.data('status')
    var modal = $(this)
    modal.find('.modal-body .sid').val(sid)
    modal.find('.modal-body .rollno').val(rollno)
    modal.find('.modal-body .name').val(name)
    modal.find('.modal-body .classid').val(classid)
    modal.find('.modal-body .status').val(status)
    modal.find('.modal-body .username').val(username)
  })
</script>
<script>
  function sortTable(f,n){
    var rows = $('#mytable tbody  tr').get();

    rows.sort(function(a, b) {

      var A = getVal(a);
      var B = getVal(b);

      if(A < B) {
        return -1*f;
      }
      if(A > B) {
        return 1*f;
      }
      return 0;
    });

    function getVal(elm){
      var v = $(elm).children('td').eq(n).text().toUpperCase();
      if($.isNumeric(v)){
        v = parseInt(v,10);
      }
      return v;
    }

    $.each(rows, function(index, row) {
      $('#mytable').children('tbody').append(row);
    });
  }
  var f_id = 1;
  var f_rollno = 1;
  var f_name = 1;
  var f_classid = 1;
  var f_status = 1;
  $("#id").click(function(){
    f_id *= -1;
    var n = $(this).prevAll().length;
    sortTable(f_id,n);
  });
  $("#rollno").click(function(){
    f_rollno *= -1;
    var n = $(this).prevAll().length;
    sortTable(f_rollno,n);
  });
  $("#name").click(function(){
    f_name *= -1;
    var n = $(this).prevAll().length;
    sortTable(f_name,n);
  });
  $("#classid").click(function(){
    f_classid *= -1;
    var n = $(this).prevAll().length;
    sortTable(f_classid,n);
  });
  $("#status").click(function(){
    f_status *= -1;
    var n = $(this).prevAll().length;
    sortTable(f_status,n);
  });
</script>
<script>
  $(function() {
    $('.cnf').click(function() {
      return window.confirm("Are you sure?");
    });
  });
</script></div>
</body>
</html>