<?php
require_once('../inc/LoginCredentials.class.php');

$loginCredentials = new LoginCredentials();

/*
// testing the search
$userList = $newsArticle->getList(
    "user_id",
    "DESC",
    "user_name",
    "Article"
);

var_dump($userList);die;
*/

$userList = $loginCredentials->getListFiltered(
    (isset($_GET['filterColumn']) ? $_GET['filterColumn'] : null),
    (isset($_GET['filterText']) ? $_GET['filterText'] : null),
    (isset($_GET['sortColumn']) ? $_GET['sortColumn'] : null),
    (isset($_GET['sortDirection']) ? $_GET['sortDirection'] : null)
);

//var_dump($userList);

?>
<style type="text/css">
	.cell {
		float: left;
		width: 15%;
		border: 1px solid black;
	}
</style>
<html>
    <body>
        <div>New User - <a href="user-edit.php">Add New user</a></div>        
        <div>
            <form action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" method="GET">
                Search: 
                <select name="filterColumn">
                    <option value="user_name">username</option>
                    <option value="user_level">user level</option>
                    <option value="pass_word">password</option>                    
                </select>
                &nbsp;<input type="text" name="filterText"/>
                &nbsp;<input type="submit" name="filter" value="Search"/>
            </form>
        </div>
		<div>
            <table border="1">
                <tr>
                    <th>Username&nbsp;-&nbsp;<a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>?sortColumn=user_name&sortDirection=ASC">A</a>&nbsp;<a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>?sortColumn=user_name&sortDirection=DESC">D</a></th>
                    <th>User level&nbsp;-&nbsp;<a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>?sortColumn=user_level&sortDirection=ASC">A</a>&nbsp;<a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>?sortColumn=user_level&sortDirection=DESC">D</a></th>
                    
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                </tr>
                <?php foreach ($userList as $userData) 
                { ?>
                    <tr>
                        <td><?php echo $userData['user_name']; ?></td>                
                        <td><?php echo $userData['user_level']; ?></td>                
                       
                        <td><a href="user-edit.php?user_id=<?php echo $userData['user_id']; ?>">Edit</a></td>
                        <td><a href="user-view.php?user_id=<?php echo $userData['user_id']; ?>">View</a></td>
                            
                    </tr>
                <?php } ?>                
            </table>
        </div>
    </body>
</html>