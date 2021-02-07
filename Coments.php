<?php
session_start();

require('Header.php');
require('HomePageForm.php');

?>



            <div class="menu">
                   <ul class="list-navigation">
                        <li class="nav-item"><a href="./HomePage.php" class="nav-link">Profile</a></li>
                        <li class="nav-item"><a href="/Coments.php" class="nav-link">Coment</a></li>
                        <li class="nav-item"><a href="./HomePage.php" class="nav-link">Home page3</a></li>
                        <li class="nav-item"><a href="./HomePage.php" class="nav-link">Home page4</a></li>
                   </ul>
            </div>


      <div  class="home-page" >

              

                 <lable class="home">Coments</lable>

                    <div class="coment-place">  
                        
                        <div class="media" id='media'>

                                  <div class="new-bar"> 

                                  
                                       <?php
                                        $conn= new PDO("mysql:host=localhost; dbname=first", "root","root");
                  $stm = $conn->prepare("SELECT coments.date_coment, coments.coment, users.name, users.picture FROM coments JOIN users on users.id = coments.user_id ");
                                        $stm->execute();


                                              while($row = $stm->fetch(PDO::FETCH_ASSOC))
                                                  {
                                                     $picture = $row["picture"];
                                                     echo "<img class='coments-image mr-3' src='$picture'>";
                                                     echo"<h6 class='user-name-title'>".$row["name"]."   ".$row["date_coment"]."</h6>";
                                                     echo "<textarea name='coments' class='last-coment dinam-size'>".$row["coment"]."\n</textarea>";
                                                  }
                                        ?>
                                
                                      
                                  </div>
                            </div>

                                                <div class="new-coment">

                          <form  id="create-new-comment" method="post" class="create-new-comment">

                                <img  class="mr-3 image-new-coments" src="<?php echo $_SESSION["image"]?>" alt="Generic placeholder image">
                                <textarea name="coments" class="new-coment dinam-size"></textarea> 
                                <button  type="submit" id="send" name="send" class="new-coment  send btn btn-primary"><strong>Send</strong></button>

                      
                                                </div>
                          </form>   


                        </div>

                                     
                    </div> 
            
    <script src="./resources/js/ScriptComents.js"></script>

<?php require('Footer.php') ?>