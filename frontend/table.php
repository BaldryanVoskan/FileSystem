                        <!-- here is going form of uploadfile.php-->
    <?php
    include './poorcode/helper.php';
            $upload = '';
            if(isset($_GET['page'])){
                $upload ='?upload='. $_GET['page'];
            }

    ?>
        <form action="../poorcode/uploadfile.php <?php echo($upload); ?>" method="post" enctype="multipart/form-data">
            <input type="file" name="file" class="upload-file">
            <input type="submit" value="Upload File" name="button">
        </form>
             <!--here is going table-->
        <table id="mytable">
            <tr>
                <th>Name</th>
                <th>Size</th>
                <th>Created At</th>
                <th>Type</th>
                <th>Actions</th>
            </tr>
            <?php
                    if(isset($arr)){

                        if(isset($_GET['column']) && isset($_GET['type'])){
                            $column = $_GET['column'];
                            $type = $_GET['type'];
                            $arr= sortFunction($arr,$column,$type);
                        }
                $i =0;
                foreach ($arr as $value) {?>
                    <tr>
                        <td>
                            <?php if($value['type'] == 'folder') {
                                $parent_folder = '';
                                if (isset($_GET['page'])) {
                                    $parent_folder = $_GET['page'] . '/';
                                }
                                ?>
                                <a href="?page=<?php echo $parent_folder . $value['name']; ?>"><?php echo $value['name']; ?></a>
                            <?php } else { ?>
                                <?php echo $value['name']; ?>
                            <?php } ?>
                        </td>
                        <td> <?php echo($value['size'] . ' b'); ?> </td>
                        <td> <?php echo(date ("Y-m-d H:i:s",$value['date'])); ?> </td>
                        <td> <?php   echo($value['type']);  ?> </td>
                        <td>                       <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal<?=$i?>">
                                Rename
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal<?=$i?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title text-dark" id="exampleModalLabel">Folder Name</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>git
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <?php $name='';
                                             if(isset($_GET['page'])){
                                                $name = '?name='.$_GET['page'] ;
                                            } ?>

                                            <form action="../poorcode/rename.php <?php echo $name; ?>" method="post">
                                                <input type="hidden" value="<?php echo ($value['name']); ?>" name="old_name">
                                                <input type="text" placeholder="Enter New Name" class="folder-input" name="new_name">
                                                <input type="submit" value="Save" class="btn btn-warning">
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
<!--                            delete button -->
                            <?php
                                $dir = '';
                                if (isset($_GET['page'])) {
                                    $dir = '?dir=' . $_GET['page'];
                                }
                            ?>
                            <form action="../poorcode/delete.php <?php echo $dir; ?>" method="post">
                                <?php
                                    $val = $value['name'];
                                    if (isset($_GET['page'])) {
                                        $val = $_GET['page'] .'/'. $val;
                                    }
                                ?>
                                <input type="hidden" value="<?php echo($val)?>" name="file_name">
                                <input type="submit" value="DELETE" name="delete" class="btn btn-danger">
                            </form>
                        </td>
                    </tr>
                <?php $i++; }}?>
        </table>