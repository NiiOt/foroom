$txtpost = $("#txtpost");
$btnpost = $("#btnpost");
$btnreply = $("#btnreply");
$txtreply = $(".txtreply");
$replybox = $("#replybox");
$foroombody = $("#foroom");
$loginBtn = $("#loginBtn");
$lpass = $("#lpass");
$luname = $("#luname");
$registerBtn = $("#registerBtn");
$runame = $("#runame");
$email = $("#email");
$rpass = $("#rpass");
$notify = $(".notify");
$rform = $("#rform");
//alert("Hi");

notify = new Audio('sounds/alert.mp3');
log = new Audio('sounds/alert1.mp3');
notii = new Audio('sounds/alert2.mp3');

$registerBtn.click(function(){
    // alert()
    avatar = $rform.find('input[name=avatar]:checked').val();
    // alert(avatar)
    username = $runame.val();
    email = $email.val();
    password = $rpass.val();
    // console.log(username);?

    if(username !="" && email !="" && password !=""){
        $.post("php/foroom.php",{status:"register",username:username,password:password,email:email,avatar:avatar},function(data){
            if(data.match("Success")){
                // Materialize.toast("Registration was successful",3000);
                window.location = "login.html";
            }else{
                console.log(data)
            }
        })
    }

});




// }

$loginBtn.click(function(){
    // alert();
    username = $luname.val();
    password = $lpass.val();

    if(username !="" && password !=""){
        $.post("php/foroom.php",{status:"login",username:username,password:password},function(data){
            if(data.match("Success")){
                // Materialize.toast("Registration was successful",3000);
                window.location = "index.html";
            }else{
                console.log(data)
            }
        })
    }

})





$.post("php/foroom.php",{status:"loadContent"},function(data){
    $foroombody.prepend(data);
})


function bodyReplace(){
    $.post("php/foroom.php",{status:"loadContent"},function(data){
    $foroombody.html(data);
})
}


    setInterval(function(){
       if($txtreply.focus()){
         loadNotification();
        
       }else{
         bodyReplace();
         loadNotification();
       }
    },1500)



$btnreply.click(function(){
    
    post = $txtreply.val();
    if(post==""){
        $txtreply.focus();
    }else{
       alert(post);
        tempBox = "<div class='list-group'> <div class='list-group-item media'>"
                    +"<a href='#' class='pull-left'><img src='img/demo/profile-pics/5.jpg' alt='' class='lgi-img'></a>"+
                    "<div class='media-body'><a href='#' class='lgi-heading'>David Nathan <small class='c-gray m-l-10'>Sending...</small></a>"
                    +"<small class='lgi-text'>"+post+"</small></div></div></div>";
        $replybox.apppend(tempBox);
        $txtreply.val("");
        $.post("php/foroom.php",{status:"reply",info:post},function(data){
            
        });
    }
            
})//End of reply click event


$btnpost.click(function(){
    post = $txtpost.val();

    if(post==""){
        $txtpost.focus();
    }else{        
        tempBox = "<div class='card w-item'><div class='card-header'><div class='media'><div class='pull-left'>"
                  +"<img class='avatar-img' src='img/demo/profile-pics/1.jpg' alt=''></div>"
                  +"<div class='media-body'><h2>Sending..<small>Posted: now</small>"
                  +"</h2></div></div></div><div class='card-body card-padding'><p>"+post+"</p></div><div class='wi-comments' id='replybox'>"
                  +"<div class='wic-form'><form><textarea placeholder='Write something...' data-ma-action='wall-comment-open' id='txtreply'></textarea>"
                  +"<div class='wicf-actions text-right'><button class='btn btn-sm btn-link' data-ma-action='wall-comment-close'>Cancel</button>"
                  +"<button class='btn btn-sm btn-primary' id='btnreply' type='button'>Post</button></form></div></div></div></div>";
        
//        alert(tempBox);
        
        $foroombody.prepend(tempBox);
        $txtpost.val("");
        $.post("php/foroom.php",{status:"newPost",post:post},function(data){
                console.log(data)
            if(data.match("Success")){
                bodyReplace();
                notify.play();
            }
        });
    }  
})//End of button Post


 $("#btnlinkpost").click(function(){
                alert();
                post = $("#txtpostlink").val()
                if(post==""){
                    $("#txtpostlink").focus()
                }else{

                   tempBox = "<div class='card w-item'><div class='card-header'><div class='media'><div class='pull-left'>"
                          +"<img class='avatar-img' src='img/demo/profile-pics/1.jpg' alt=''></div>"
                          +"<div class='media-body'><h2>Sending..<small>Posted: now</small>"
                          +"</h2></div></div></div><div class='card-body card-padding'><p><a href='"+post+"'>"+post+"</a></p></div><div class='wi-comments' id='replybox'>"
                          +"<div class='wic-form'><form><textarea placeholder='Write something...' data-ma-action='wall-comment-open' id='txtreply'></textarea>"
                          +"<div class='wicf-actions text-right'><button class='btn btn-sm btn-link' data-ma-action='wall-comment-close'>Cancel</button>"
                          +"<button class='btn btn-sm btn-primary' id='btnreply' type='button'>Post</button></form></div></div></div></div>";
                
                    //        alert(tempBox);
                            
                            $foroombody.prepend(tempBox);
                            $("#txtlinkpost").val("");
                            $.post("php/foroom.php",{status:"newlinkPost",post:post},function(data){
                                    // console.log(data)
                                if(data.match("Success")){
                                    bodyReplace();
                                    notify.play();
                                }
                            });
                }
            })



                // $("#btnimgpost").click(function(e){
                //         e.preventDefault();
                //         $.ajax({
                //             url: "php/upload.php",        // Url to which the request is send
                //             type: "POST",             // Type of request to be send, called as method
                //             data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                //             contentType: false,       // The content type used when sending data to the server.
                //             cache: false,             // To unable request pages to be cached
                //             processData:false,        // To send DOMDocument or non processed data file it is set to false
                //         success: function(data)   // A function to be called if request succeeds
                //         {
                //             alert(data);
                //             $('#loading').hide();
                //             $("#message").html(data);
                //         },
                //         error: function(data){
                //             $("#message").html(data)
                //         }
                //     });
                // })




//load notifications
function loadNotification(){
    $.post("php/foroom.php",{status:"loadNotification"},function(data){
        $("#notification").html(data);
        // notii.play();
        // console.log(data)
    })
}


loadNotification();


//Load chat members
function loadMembers(){
    console.log("data")
    // $.post("php/foroom.php",{status:"loadMembers"},function(data){
    //     $("#chatlist").html(data);
    //     console.log(data)
    // })
}

loadMembers();

//Logout
            //Parameter
            $('#logout').click(function(){
                log.play();
                swal({   
                    title: "Are you sure?",   
                    text: "Do you really want to logout?",   
                    type: "warning",   
                    showCancelButton: true,   
                    confirmButtonText: "Yes!",
                    cancelButtonText: "No!",   
                }).then(function(isConfirm){
                    if (isConfirm) {     
                        swal("Confirmed!", "Logging you out.", "success");  
                        $.post("php/foroom.php",{status:"logout"},function(data){
                            console.log(data)
                            if(data=="Out"){
                                window.location ="login.html";
                            }
                        }) 
                    } else {     
                        swal("Cancelled", "Your imaginary file is safe :)", "error");   
                    } 
                });
            });



// $.notify.click(function(e){
//     e.preventDefault();
//     url = $(this).attr(id);
//     url = "replybox"+url;
//     window.location
// })
