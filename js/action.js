$(document).ready(function(){
   $replyPost = $(".replyPost");
    $replyPost.click(function(){
        id = $(this).attr("id");
        id = id.substr(8);
        text = $("#txtreply"+id).val();
       // alert(text);
        
        $.post("php/foroom.php",{status:"replyPost",postID:id,text:text},function(data){
            if(data.match("Success")){
//                Materialize.toast("Reply posted",3000);
                bodyReplace();
            }else{
                console.log(data);
            }
        })
    })

    $(".replybox").click(function(){
        
        e.preventDefault();
        tid = $(this).attr(id);
        alert(tid)
    })
    
});