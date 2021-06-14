                                        <!-- Modal of folder -->

    <!-- Trigger the modal with a button -->
    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"><img src="../image/folder.jpg" style="width: 20px; height: 20px;" /></button>

    <!-- Modal  -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Create New Folder</h4>
                </div>
                <div class="modal-body">
                    <form action="../poorcode/folder.php" method="post">
                        <?php $page = '';
                            if(!empty($_GET['page'])) {
                                $page = $_GET['page'];
                        }
                        ?>
                        <input type="hidden" name="folder_name" value="<?php  echo $page;?>">
                        <input type="text" placeholder="Enter Folder Name" name="folderName">
                        <input type="submit" value="Create" name="button">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<?php
         $sort='';
         if(isset($_GET['page'])){
             $sort = 'page=' . $_GET['page'] . '&';
         }

                $x = '3';
              if(isset($_GET['type'])){
                  if($_GET['type'] == '3'){
                      $x = '4';
                  }
                  if($_GET['type'] == '4'){
                      $x = '3';
                  }
              }
?>
                                        <!--    here is going modal of sort    -->
                                        <!-- Default dropright button -->
                    <div class="btn-group dropright">
                        <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">                             Sort By
                         </button>
                        <div class="dropdown-menu">
                               <a href="../index.php?<?php echo $sort ?>column=size&type=<?php echo($x); ?>">Size</a><br>
                               <a href="../index.php?<?php echo $sort ?>column=name&type=<?php echo($x); ?>">Name</a><br>
                               <a href="../index.php?<?php echo $sort ?>column=date&type=<?php echo($x); ?>">date</a><br>
                        </div>
                    </div>
                         <div class="dropdown-menu">
                         <!-- Dropdown menu links -->
                         </div>