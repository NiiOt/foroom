<?php
include "config.php";
session_start();
$status=$_POST["status"];
$userID = $_SESSION["userID"];

if($status=="loadContent"){
    $sql = mysqli_query($con,"SELECT `foroomposts`.`info`,`foroomposts`.`posterID`,`foroomposts`.`postdate`,`members`.`username`,`foroomposts`.`id`,`members`.`avatar`,`foroomposts`.`ptype` FROM `foroomposts` LEFT JOIN `members` ON `foroomposts`.`posterID` = `members`.`id` ORDER BY `postdate` DESC");
    if(mysqli_num_rows($sql)>0){
        while($row = mysqli_fetch_array($sql)){
            if($row[6]=="LINK"){
                echo " <div class='card w-item' id='post$row[4]'><div class='card-header'><div class='media'><div class='pull-left'>
                  <img class='avatar-img' src='img/demo/profile-pics/$row[5]' alt=''></div>
                  <div class='media-body'><h2>$row[3]<small>Posted: $row[2]</small>
                  </h2></div></div></div><div class='card-body card-padding'><p><a href='$row[0]'>$row[0]</a></p> <div class='wi-stats clearfix'>
                                        <div class='wis-numbers'>
                                            <span><i class='zmdi zmdi-comments'></i> 20</span>
                                            <span class='active'><i class='zmdi zmdi-favorite'></i> 78</span>
                                        </div>

                                        <div class='wis-commentors'>
                                            <a href='#'><img src='img/demo/profile-pics/2.jpg' alt=''></a>
                                            <a href='#'><img src='img/demo/profile-pics/3.jpg' alt=''></a>
                                        </div>
                                    </div></div><div class='wi-comments' id='replybox'>";
                    $replyQuery = mysqli_query($con,"SELECT `postID`, `info`, `replierID`, `replydate`,`members`.`username`,`members`.`avatar` FROM `foroomreplies` LEFT JOIN `members` ON `replierID` = `members`.`id` WHERE `postID` ='$row[4]' ORDER BY `foroomreplies`.`replydate` ASC");
                    if(mysqli_num_rows($replyQuery)>0){
                        while($rrow = mysqli_fetch_array($replyQuery)){

                            echo " <div class='list-group'> <div class='list-group-item media'> <a href='#' class='pull-left'><img src='img/demo/profile-pics/$rrow[5]' alt='' class='lgi-img'></a>
                                <div class='media-body'><a href='#' class='lgi-heading'>$rrow[4] <small class='c-gray m-l-10'>$rrow[3]</small></a>
                                <small class='lgi-text'>$rrow[1]</small></div></div></div>";
                        }
                    }
                
                   // <a data-toggle='modal' href='#modalDefault' class='replybox' id='$row[4]'></a>
            echo" <div class='wic-form'><form>  <textarea placeholder='Post a reply...' data-ma-action='wall-comment-open' id='txtreply$row[4]' class='txtreply'></textarea>
                  <div class='wicf-actions text-right'><button class='btn btn-sm btn-link' data-ma-action='wall-comment-close'>Cancel</button>
                  <button class='btn btn-sm btn-success replyPost' id='btnreply$row[4]' type='button'>Post</button></form></div></div></div></div>";
         
            }else if($row[6]=="IMG"){
                 echo " <div class='card w-item' id='post$row[4]'><div class='card-header'><div class='media'><div class='pull-left'>
                  <img class='avatar-img' src='img/demo/profile-pics/$row[5]' alt=''></div>
                  <div class='media-body'><h2>$row[3]<small>Posted: $row[2]</small>
                  </h2></div></div></div><div class='card-body card-padding'><p>$row[0]</p> 
                                 <img src='php/uploads/$row[0]' class='img-round img-responsive' height='200px'><br/><br/>


                                <div class='wi-stats clearfix'>
                                        <div class='wis-numbers'>
                                            <span><i class='zmdi zmdi-comments'></i> 20</span>
                                            <span class='active'><i class='zmdi zmdi-favorite'></i> 78</span>
                                        </div>

                                       
                                    </div></div><div class='wi-comments' id='replybox'>";
                    $replyQuery = mysqli_query($con,"SELECT `postID`, `info`, `replierID`, `replydate`,`members`.`username`,`members`.`avatar` FROM `foroomreplies` LEFT JOIN `members` ON `replierID` = `members`.`id` WHERE `postID` ='$row[4]' ORDER BY `foroomreplies`.`replydate` ASC");
                    if(mysqli_num_rows($replyQuery)>0){
                        while($rrow = mysqli_fetch_array($replyQuery)){

                            echo " <div class='list-group'> <div class='list-group-item media'> <a href='#' class='pull-left'><img src='img/demo/profile-pics/$rrow[5]' alt='' class='lgi-img'></a>
                                <div class='media-body'><a href='#' class='lgi-heading'>$rrow[4] <small class='c-gray m-l-10'>$rrow[3]</small></a>
                                <small class='lgi-text'>$rrow[1]</small></div></div></div>";
                        }
                    }
                
                   // <a data-toggle='modal' href='#modalDefault' class='replybox' id='$row[4]'></a>
            echo" <div class='wic-form'><form>  <textarea placeholder='Post a reply...' data-ma-action='wall-comment-open' id='txtreply$row[4]' class='txtreply'></textarea>
                  <div class='wicf-actions text-right'><button class='btn btn-sm btn-link' data-ma-action='wall-comment-close'>Cancel</button>
                  <button class='btn btn-sm btn-success replyPost' id='btnreply$row[4]' type='button'>Post</button></form></div></div></div></div>";                    





            }else{

            echo " <div class='card w-item' id='post$row[4]'><div class='card-header'><div class='media'><div class='pull-left'>
                  <img class='avatar-img' src='img/demo/profile-pics/$row[5]' alt=''></div>
                  <div class='media-body'><h2>$row[3]<small>Posted: $row[2]</small>
                  </h2></div></div></div><div class='card-body card-padding'><p>$row[0]</p> <div class='wi-stats clearfix'>
                                        <div class='wis-numbers'>
                                            <span><i class='zmdi zmdi-comments'></i> 20</span>
                                            <span class='active'><i class='zmdi zmdi-favorite'></i> 78</span>
                                        </div>

                                       
                                    </div></div><div class='wi-comments' id='replybox'>";
                    $replyQuery = mysqli_query($con,"SELECT `postID`, `info`, `replierID`, `replydate`,`members`.`username`,`members`.`avatar` FROM `foroomreplies` LEFT JOIN `members` ON `replierID` = `members`.`id` WHERE `postID` ='$row[4]' ORDER BY `foroomreplies`.`replydate` ASC");
                    if(mysqli_num_rows($replyQuery)>0){
                        while($rrow = mysqli_fetch_array($replyQuery)){

                            echo " <div class='list-group'> <div class='list-group-item media'> <a href='#' class='pull-left'><img src='img/demo/profile-pics/$rrow[5]' alt='' class='lgi-img'></a>
                                <div class='media-body'><a href='#' class='lgi-heading'>$rrow[4] <small class='c-gray m-l-10'>$rrow[3]</small></a>
                                <small class='lgi-text'>$rrow[1]</small></div></div></div>";
                        }
                    }
                
                   // <a data-toggle='modal' href='#modalDefault' class='replybox' id='$row[4]'></a>
            echo" <div class='wic-form'><form>  <textarea placeholder='Post a reply...' data-ma-action='wall-comment-open' id='txtreply$row[4]' class='txtreply'></textarea>
                  <div class='wicf-actions text-right'><button class='btn btn-sm btn-link' data-ma-action='wall-comment-close'>Cancel</button>
                  <button class='btn btn-sm btn-success replyPost' id='btnreply$row[4]' type='button'>Post</button></form></div></div></div></div>";
            }
        }echo "<script src='js/action.js'></script>";
    }else{
        echo "No posts";
    }

}else if($status=="newPost"){
    $post = $_POST['post'];
    $sql = mysqli_query($con,"INSERT INTO `foroomposts`(`id`, `info`, `posterID`) VALUES('','$post','$userID')");
    if($sql){
        $posterID =$_SESSION["userID"];
        $description = $_SESSION["username"]." started a new topic";
        $postID = mysqli_query($con,"SELECT `id` FROM `foroomposts` WHERE `posterID`='$posterID' ORDER BY `id` DESC");
        if($nrow= mysqli_fetch_array($postID)){
      
        $postID = filter_var($nrow[0],FILTER_SANITIZE_STRING);
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

}else if($status=="newlinkPost"){
    $post = $_POST['post'];
    $sql = mysqli_query($con,"INSERT INTO `foroomposts`(`id`, `info`, `posterID`,`ptype`) VALUES('','$post','$userID','LINK')");
    if($sql){
        $posterID =$_SESSION["userID"];
        $description = $_SESSION["username"]." sent a link";
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

}else if($status=="replyPost"){
    $post = $_POST["text"];
    $postID = $_POST["postID"];
    
    $sql = mysqli_query($con,"INSERT INTO `foroomreplies`(`postID`, `info`, `replierID`) VALUES('$postID','$post','$userID') ");
    if($sql){
         $posterID =$_SESSION["userID"];
        $description = $_SESSION["username"]." commented on a topic";
       $notify = mysqli_query($con,"INSERT INTO `notification`(`id`,`description`,`postID`,`posterID`,`note_date`) VALUES ('','$description','$postID','$posterID','$now')");
         if($notify){
            echo "Success";
        }else{
            echo "Notify Failed".mysqli_error($con);
        }
    }else{
        echo mysqli_error($con);
    }

}else if($status=="register"){
    $username =$_POST["username"];
    $password = md5($_POST["password"]);
    $email = $_POST["email"];
    $avatar = $_POST["avatar"];

    $sql = mysqli_query($con,"INSERT INTO `members`(`id`, `username`, `email`, `password`,`avatar`) VALUES ('','$username','$email','$password','$avatar')");
    if($sql){
        echo "Success";
    }else{
        echo "Failed".mysqli_error($con);
    }

}else if($status=="login"){
    $username = $_POST["username"];
    $password = md5($_POST["password"]);

    $sql = mysqli_query($con,"SELECT * FROM `members` WHERE  `username` = '$username' AND `password` ='$password'");
    if(mysqli_num_rows($sql)>0){
        while($row = mysqli_fetch_array($sql)){
            $_SESSION["userID"] = $row[0];
            $_SESSION["username"] = $row[1];
            $_SESSION["session"] = time();
            echo "Success";
            // $_SESSION[]
        }
    }else{
        echo "Please register first".mysqli_error($con);
    }

}else if($status=="getSession"){
    if($_SESSION["session"]==""){
        echo "false";
    }else{
        echo strtoupper($_SESSION["username"]);
    }


}else if($status=="loadNotification"){
    $userID = $_SESSION["userID"]; 
    $sql = mysqli_query($con,"SELECT `description`,`postID`,`note_date`,`avatar` FROM `notification` INNER JOIN `members` ON `members`.`id` = `notification`.`posterID` WHERE `posterID` !='$userID' ORDER BY `notification`.`id` DESC LIMIT 5");
    if(mysqli_num_rows($sql)>0){
        while($row = mysqli_fetch_array($sql)){
            echo "<a class='list-group-item media notify' href='#post$row[1]'>
                        <div class='pull-left'>
                            <img class='lgi-img' src='img/demo/profile-pics/$row[3]' alt=''>
                        </div>
                        <div class='media-body'>
                            <div class='lgi-heading'>$row[2]</div>
                                <small class='lgi-text'>$row[0]</small>
                            </div>
                    </a>
                 ";
        }
    }else{
        echo "You have no notifications";
    }

}elseif($status=="loadMembers"){
     $userID = $_SESSION["userID"]; 
    $sql = mysqli_query($con,"SELECT `username`,`id`,`avatar` FROM `members` WHERE `id` !='$userID'");
    if(mysqli_num_rows($sql)>0){
        while($row = mysqli_fetch_array($sql)){
            echo "<div class='list-group'>
                        <a class='list-group-item media' href='#'>
                            <div class='pull-left p-relative'>
                                <img class='lgi-img' src='img/demo/profile-pics/$row[2]' alt=''>
                                <i class='chat-status-busy'></i>
                            </div>
                            <div class='media-body'>
                                <div class='lgi-heading'>$row[0]</div>
                                <small class='lgi-text'>Available</small>
                            </div>
                        </a>

                      </div>
                 ";
        
}
}




}else if($status=="logout"){
  
    session_destroy();
    echo "Out";
    
    }



