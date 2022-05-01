<html>
<head>
<link rel="stylesheet" href="../css/styles.css">
	<title>New User Login</title>
</head>
    <body>
        <form action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" method="post">
            <?php if (isset($errorsArray['user_name'])) { ?>
                <div><?php echo $errorsArray['user_name']; ?></div>
            <?php } ?>
			
			
			     <?php if (isset($errorsArray['user_level'])) { ?>
                <div><?php echo $errorsArray['user_level']; ?></div>
            <?php } ?>
			
            <div id="box">
            <div style="font-size: 20px;margin: 10px;color: white;">Login</div>
            username: <input id="text" input type="text" name="user_name" value="<?php echo (isset($dataArray['user_name']) ? $dataArray['user_name'] : ''); ?>"/><br>
            password: <input id="text" textarea name="pass_word"><?php echo (isset($dataArray['pass_word']) ? $dataArray['pass_word'] : ''); ?></textarea><br>
            user level: <input id="text" input type="text" name="user_level" value="<?php echo (isset($dataArray['user_level']) ? $dataArray['user_level'] : ''); ?>"/><br>
        
            <br>
            <br>
    		
            <input id="button" input type="submit" name="Save" value="Save"/>
            <input id="button" input type="submit" name="Cancel" value="Cancel"/>            
        </form> 
        </div>       
    </body>
</html>