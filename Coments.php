<?php
session_start();

if(!isset($_SESSION["auth"]))
{
    header("Location:/");
}

require('ConnectionDb.php');
/*require('HomePageForm.php');*/
require('Header.php');
require('Menu.php');
?>

      <div  class="home-page" >
          
         <lable class="home">Coments</lable>

            <div class="coment-place">  
                
                    <div class="media" id="media">

                          <div class="new-bar"> 
                               <?php
                               
                                  $stm = $conn->prepare("SELECT coments.id, coments.id_parent_coment, coments.date_coment, coments.coment, users.name, users.picture FROM coments JOIN users on users.id = coments.user_id ");
                                    $stm->execute();

                                      while($row = $stm->fetch(PDO::FETCH_ASSOC))
                                          {  
                                                                                       
                                             $picture = $row["picture"];
                                             $id_comment = $row["id"];
                                             $parent_comment = $row["id_parent_coment"]; 
                                        if($parent_comment==0){
                                                               echo "<img class='coments-image mr-3' src='$picture'>";
                                                               echo"<div class='bord'><div class='user-name-title'>".$row["name"]."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp".$row["date_coment"]."</div></div>";
                                                               echo"<button  type='button' id='reply' data-id='$id_comment' name='reply' class=' reply btn btn-primary'><strong>Reply</strong></button>";
                                                               echo "<textarea name='coments' data-parent='$parent_comment' data-id='$id_comment' class='last-coment' readonly>".$row["coment"]."\n</textarea>";
                                                               echo "<form method='post' class='create-reply-comment reply-comment' data-id='$id_comment'><input name='parent_id' type='hidden' value='$id_comment'>
                                                                     </form>";
                                                               echo "<div class='child_coments' data-id='$id_comment'></div>";
                                                        
                                                        
                                                           }
                                          }
                                ?>                
                               
                          </div>
                    </div>
                                         
                       <div class="new-coment">
                              <form  id="create-new-comment" method="post" class="create-new-comment">
                                <img  class="mr-3 image-new-coments" src="<?php echo $_SESSION["image"]?>" alt="Generic placeholder image">
                                <textarea name="coments" class="new-coment dinam-size"></textarea> 
                                <button  type="submit" id="send" name="send" class="new-coment  send btn btn-primary"><strong>Send</strong></button>
                              </form>  
                        </div>
                   
            </div>
                                   
      </div> 
            
    <script src="./resources/js/ScriptComents.js"></script>
    <script src="./resources/js/ScriptReply.js"></script> 

<?php require('Footer.php') ?>