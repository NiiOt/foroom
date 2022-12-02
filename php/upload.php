<?php
 session_start();
 $userID = $_SESSION["userID"];
 include "config.php"; 
if(isset($_FILES["file"]["type"])){
    $validextensions = array("jpeg", "jpg", "png");
    $temporary = explode(".", $_FILES["file"]["name"]);
    $file_extension = end($temporary);
    if ((($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/jpeg")
    ) && ($_FILES["file"]["size"] < 9000000000)//Approx. 100kb files can be uploaded.
    && in_array($file_extension, $validextensions)) {
            if ($_FILES["file"]["error"] > 0){
                 echo "Return Code: " . $_FILES["file"]["error"] . "<br/><br/>";
            }else{
                        $temp = $_FILES['file']['tmp_name']; // Storing source path of the file in a variable
                        $save = "how".time().".".$file_extension;
                        $targetPath = "uploads/".$save; // Target path where file is to be stored
                        
                        $src = imagecreatefrompng($temp);
    

                    list($width_min,$height_min) = getimagesize($temp);
                        $newwidth_min = 550; //Compressing width
                        $newheight_min = ($height_min/$width_min) * $newwidth_min;
                        $tmp_min = imagecreatetruecolor($newwidth_min, $newheight_min);

                        imagecopyresampled($tmp_min, $src, 0, 0, 0, 0, $newwidth_min, $newheight_min, $width_min, $height_min);

                        move_uploaded_file($temp,$targetPath) ; // Moving Uploaded file

        // $upload = imagejpeg($tmp_min,$targetPath.$save);

                         $sql = mysqli_query($con,"INSERT INTO `foroomposts`(`id`, `info`, `posterID`,`ptype`) VALUES('','$save','$userID','IMG')");
                            if($sql){
                                $posterID =$_SESSION["userID"];
                                $description = $_SESSION["username"]." posted a new image";
                                $postID = mysqli_query($con,"SELECT `id` FROM `foroomposts` WHERE `posterID`='$posterID' ORDER BY `id` DESC");
                                if($nrow= mysqli_fetch_array($postID)){
                              
                                $postID = $nrow[0];
                                // echo "$postID";
                                $notify = mysqli_query($con,"INSERT INTO `notification`(`id`,`description`,`postID`,`posterID`,`note_date`) VALUES ('','$description','$postID','$posterID','$now')");
                                if($notify){
                                    echo "Success";
                                }else{
                                    echo "Notify Failed".mysqli_error($con);
                                }}
                            }else{
                                echo mysqli_error($con);
                            }
                        



                    }
            }//End of loooooong if
        

}else{
    echo "Nothing coming";
}


?>