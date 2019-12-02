<?php include("head.php"); ?>
<?php include("header.php"); ?>


<body>
    <div class="body">
        <h1>Bienvenue, <?php echo $_SESSION['username'];?></h1>
        <a href="?action=modifyanddelete_account">Modifier / Supprimer un compte</a></br>
        <?php
            if($_GET['action']=='modifyanddelete_account')
            {
                $select = $db->prepare("SELECT * FROM users");
                $select->execute();
                while($s=$select->fetch(PDO::FETCH_OBJ))
                {
                    ?>
                    <?php echo $s->username; ?> = <?php echo $s->email;?> / <?php echo $s->tel; ?> / <?php echo $s->categorie; ?> 
                    <br><?php echo "Message : $s->message" ?> 
                    <a href="?action=modify_account&amp;id=<?php echo $s->id; ?>">Modifier</a></br>
                    <a href="?action=delete_account&amp;id=<?php echo $s->id; ?>">Supprimer</a></br>
                    <?php 
                } 
            }
            else if($_GET['action']=='modify_account')
            {
                $id=$_GET['id'];
                $select = $db->prepare("SELECT * FROM users WHERE id= $id");
                $select->execute();
                $data = $select->fetch(PDO::FETCH_OBJ);
                ?>
                <form action="" method="post">
                    <h3>Nom de compte :</h3><input value="<?php echo $data->username; ?>" type="text" name="author" size="50"/>
                    <h3>Email :</h3><textarea name="content" rows="15" cols="40"/><?php echo $data->email; ?></textarea>
                    <input type="submit" name="submit" value="Modifier"/>
                </form>
                <?php
                if(isset($_POST['submit']))
                {
                    $username=$_POST['username'];
                    $email=$_POST['email'];
                    $update = $db->prepare("UPDATE users SET author='$username', messages='$email' WHERE id=$id");
                    $update->execute();
                    print("<script type=\"text/javascript\">setTimeout('location=(\"admin.php?action=modifyanddelete_account\")' ,10);</script>");
                }
            }
            else if($_GET['action']=='delete_account')
            {
                    $id=$_GET['id'];
                    $delete = $db->prepare("DELETE FROM users WHERE id=$id");
                    $delete->execute();
            }
        }
        ?>
    </div>
</body>

<?php include("footer.php"); ?>
</html>