<style type="text/css">
	.cell {
		float: left;
		width: 15%;
		border: 1px solid black;
	}
</style>

<html>
    <body>
        <div>New Users - 
		<!--by not passing an agument you are creating a new article   ?ArticleID=1-->
            <a href="user-edit.php">Add New User</a>
        </div>        
        <div style="display: block;">
            <!-- header info -->
            <div>
                <div class="cell">Username</div>
                <div class="cell">User status</div>
                <div class="cell"></div>
                <div class="cell">&nbsp;</div>
                <div class="cell">&nbsp;</div>
            </div>
			
			
            <?php foreach ($userList as $userData) { ?>
                <div style="clear:both;">
				
                    <div class="cell"><?php echo $userData['user_name']; ?></div>
                    <div class="cell"><?php echo $userData['user_level']; ?></div>
                    <div class="cell"><a href="user-edit.php?user_id=<?php echo $userData['user_id']; ?>">Edit</a></div>
                    <div class="cell"><a href="user-view.php?user_id=<?php echo $userData['user_id']; ?>">View</a></div>
				
				
                </div>
            <?php } ?>    
            
        </div>
    </body>
</html>