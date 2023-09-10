<?php
ob_start();
session_start();
if($_SESSION['role']=="supervisor")
{
include 'db_connection.php';
$msg="";
$staff_id=$_SESSION['user_id'];
$user_details= mysqli_query($mysqli, "select * from staff where staff_id='$staff_id'");
$details= mysqli_fetch_array($user_details);
$staff_dept=$details['dept'];
?>
<?php
if(isset($_POST['submit']))
{
    $student_id=$_POST['student_id'];
    $chapter=$_POST['chapter'];
    $file_name=trim($_FILES["file_name"]["name"]);
$size=trim($_FILES["file_name"]["size"]);
$temp=trim($_FILES["file_name"]["tmp_name"]);
$file_type=trim($_FILES['file_name']['type']);
$name=str_replace(" ","_",$file_name);
$file= str_replace("'", "-", $name);
$locate="../documents/";
$docpath=$locate.$file;
if($file_type=="application/pdf" || $file_type=="application/msword" || $file_type=="application/vnd.openxmlformats-officedocument.wordprocessingml.document" || $file_type=="text/plain")
    { 
$min=0;
$max=1000000000;
$doc_id=mt_rand($min, $max)."su";
$sender="supervisor";
$date= date('d/m/Y');
$status="unseen";
$sql= mysqli_query($mysqli, "insert into documents values ('$doc_id','$sender','$staff_id','$chapter','$docpath','$date','$status','$student_id','$staff_id','$size','$file')");
if($sql)
{
  move_uploaded_file($temp,$docpath);
$msg="file uploaded for correction";  
}else{$msg="an error occurred ".mysqli_error($mysqli);}
    }else{$msg="wrong file type, please select doc, docx or pdf";}
}
?>
<?php
include_once 'sup_navigator.php';?>
<div class="mid_section" style="margin-top: -15px; padding-left: 10px; ">
    <form method="POST" enctype="multipart/form-data">
    <table border="0" cellspacing='5' style="width: 98%; border-bottom: 1px dashed lightcoral;">
            <tr style="background-color:lightcoral;color: white;">
                <th colspan="6" style="border-bottom:1px dashed lightcoral;height: 35px; ">
                    UPLOAD / DOWNLOAD STUDENT PROJECT FOR CORRECTION <a href="">Refresh</a>
                </th>
            </tr>
        <tr style="background-color:lightcoral;color: white;">
            <th>SN</th>
            <th>STUDENT FULL NAME</th>
            <th>CHAPTER</th>
            <th>DATE</th>
            <th>SIZE</th>
            <th>OPTION</th>
        </tr>
        <?php
$sql= mysqli_query($mysqli, "select * from documents where staff_id='$staff_id' && sender='student' && status='unseen' ORDER BY date ASC");
$count=mysqli_num_rows($sql);
if($count>0)
{
        $sn=0;
        while($result= mysqli_fetch_array($sql))
        { 
            $student_id=$result['student_id'];
$student= mysqli_query($mysqli, "select * from students where student_id='$student_id' && dept='$staff_dept'");
    $student_result=mysqli_fetch_array($student);
            $sn++;
            $size=$result['size'];
            $file_size=$size/1024;
            $doc= round($file_size);
        ?>
        <tr>
            <td style="border-bottom: 1px dashed lightcoral;"><?php echo $sn; ?></td>
<td style="border-bottom: 1px dashed lightcoral;"><?php echo $student_result['surname']." ".$student_result['f_name'];?></td>
            <td><?php echo $result['chapter'];?></td>
            <td><?php echo $result['date'];?></td>
            <td><?php echo $doc."kb";?></td>
            <td><a href="download.php?file_id=<?php echo $result['doc_id'];?>" style="background-color: #cccccc; border: 1px solid #666666; padding: 0px 3px 0px 3px;text-decoration: none; color: red;">Download</a></td>
        </tr>
<?php }}else{?>
        <tr>
            <th colspan="6"><font color='red'>No project submitted for correction</font></th>
        </tr>
<?php }?>
        <tr style="background-color:lightcoral;color: white; height: 35px;">
            <th colspan="6">UPLOAD PROJECT</th>
        </tr>
        <tr>
            <th colspan="6" style="border-top: 1px dashed lightcoral;"><font color="red"><?php echo $msg; ?></font></th>
        </tr>
        <tr>
            <th>
                Select Student:
            </th>
            <th>
                <select name="student_id" required="required">
                    <option value="">...select...</option>
<?php
$std_sup_sql= mysqli_query($mysqli, "select * from student_supervisor where staff_id='$staff_id'");
while($reslt=mysqli_fetch_array($std_sup_sql))
{
$std_id=$reslt['student_id'];
$std= mysqli_query($mysqli, "select * from students where student_id='$std_id'");
$std_rslt=mysqli_fetch_array($std);
            ?><option value="<?php echo $std_id;?>">
<?php echo $std_rslt['surname']." ".$std_rslt['f_name'];?> </option>
<?php }?>
                </select>
            </th>
            <th colspan="2">
                Chapter Name:<select name="chapter" required="required">
                    <option value="">..select..</option>
                    <option value="CHAPTER ONE">CHAPTER ONE</option>
                    <option value="CHAPTER TWO">CHAPTER TWO</option>
                    <option value="CHAPTER THREE">CHAPTER THREE</option>
                    <option value="CHAPTER FOUR">CHAPTER FOUR</option>
                    <option value="CHAPTER FIVE">CHAPTER FIVE</option>
                    <option value="CHAPTER ONE-to-FIVE">CHAPTER ONE-to-FIVE</option>
                    <option value="REFERENCES">REFERENCE</option>
                    <option value="PRE-PAGES">PRE-PAGES</option>
                    <option value="COMPLETE PROJECT">COMPLETE PROJECT</option>
                </select>
            </th>
            <th colspan="2">
                <input type="file" name="file_name" required="required">
            </th>
        </tr>
        <tr >
            <th colspan="6">
                <input type="submit" name="submit" value="UPLOAD" style="color: red;">
            </th>
        </tr>
    </table>
    </form>
            </div>
           </div>
           <?php include_once 'footer.php';?>
<?php }else{
     header('Location:login.php'); 
}