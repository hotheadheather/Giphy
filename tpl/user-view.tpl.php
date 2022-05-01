<html>
    <body>
        username: <?php echo (isset($dataArray['user_name']) ? $dataArray['user_name'] : ''); ?><br>
        password: <?php echo (isset($dataArray['pass_word']) ? $dataArray['pass_word'] : ''); ?><br>
        level: <?php echo (isset($dataArray['user_level']) ? $dataArray['user_level'] : ''); ?><br>
      
		<a href="user-list.php">Back</a>
    </body>
</html>