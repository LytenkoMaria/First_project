<?php
session_start();

if(!isset($_SESSION["auth"]))
{
    header("Location:/");
}

require('ConnectionDb.php');
require('Header.php');
require('Menu.php');
?>

  <div  class="home-page" >     
    <lable class="home">Comments</lable>
      <div class="comments-place">        
        <div class="media" id="media">
          <div class="new-bar"> 
           <?php
           
              $stm = $conn->prepare("SELECT comments.id, comments.id_parent_comments, comments.date_comments, comments.comments, users.name, users.picture FROM comments JOIN users on users.id = comments.user_id ");
                  $stm->execute();

                  while($row = $stm->fetch(PDO::FETCH_ASSOC))
                    {                                                        
                      $picture = $row["picture"];
                      $id_comments = $row["id"];
                      $parent_comments = $row["id_parent_comments"]; 
                        if($parent_comments==0){
                            echo "<img class='comments-image mr-3' src='$picture'>";
                            echo"<div class='bord'><div class='user-name-title'>".$row["name"]."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp".$row["date_comments"]."</div></div>";
                            echo"<button  type='button' id='reply' data-id='$id_comments' name='reply' class=' reply btn btn-primary'><strong>Reply</strong></button>";
                            echo "<textarea name='comments' data-parent='$parent_comments' data-id='$id_comments' class='last-comments' readonly>".$row["comments"]."\n</textarea>";
                            echo "<form method='post' class='create-reply-comments reply-comments' data-id='$id_comments'><input name='parent_id' type='hidden' value='$id_comments'></form>";
                            echo "<div class='child_comments' data-id='$id_comments'></div>";
                         }
                    }
            ?>                            
          </div>
        </div>                    
          <div class="new-comments">
              <form  id="create-new-comments" method="post" class="create-new-comments">
                  <img  class="mr-3 image-new-comments" src="<?php echo $_SESSION["image"]?>" alt="Generic placeholder image">
                  <textarea name="comments" class="new-comments dinam-size"></textarea> 
                  <button  type="submit" id="send" name="send" class="new-comments  send btn btn-primary"><strong>Send</strong></button>
              </form>  
          </div>            
      </div>                               
  </div> 
            
    <script src="./resources/js/ScriptComments.js"></script>
    <script src="./resources/js/ScriptReply.js"></script> 

<?php require('Footer.php') ?>