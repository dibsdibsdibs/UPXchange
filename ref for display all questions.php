<?php require_once("config.php");
if(!isset($_SESSION['login_session'])){ 
	header("location:login.php");
}
else 
{
	$userid=$_SESSION['userid'];
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Upvote and Downvote system using AJAX,Jquery,Bootstrap with MYSQL database.</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="vote_scripts.js"></script>
    </head>
    <body>
    <div class="container">
        <div div class="row">
        <div style="background:grey; color: #fff;" class="card">
            <h1>All Posts </h1>	<a href="logout.php">Logout</a>
        </div>
    </div>
    <br>
        <div class="row">
            <?php 

            $sql="SELECT * FROM posts ORDER BY post_id DESC"; 
            $stmt=$db->prepare($sql);
                $stmt->execute();
    $rows=$stmt->fetchAll();
    foreach($rows as $row)
    {

        $votes= 0;
    $sql="SELECT vote FROM uservotes WHERE postid=:postid AND userid=:userid"; 
            $stmt=$db->prepare($sql);
            $stmt->bindParam(':postid', $row['post_id'],PDO::PARAM_INT);
            $stmt->bindParam(':userid', $userid,PDO::PARAM_INT);
                $stmt->execute();
    $rows=$stmt->fetchAll();
    $up = "";
    $down = "";
    foreach($rows as $rowv){
    $rowv['vote'];
    }
    if(!empty($rowv["vote"])) {
    $vote = $rowv["vote"];
    if($vote == -1) {
    $up = "enabled";
    $down = "disabled";
    }
    if($vote == 1) {
    $up = "disabled";
    $down = "enabled";
    }
    }
    ?> <div class="col-sm-12 list">
        <div class="row card_item ">
            <div class="col-1"> 
    <div id="links-<?php echo $row['post_id']; ?>" class="voting">
                <div class="btn-vote">
    
    <input type="button" title="Vote Up " class="up" onClick="addVote(<?php echo $row['post_id']; ?>,'1')" <?php echo $up; ?> /> 

    <div class="label-vote"><?php echo $row['netvotes']; ?></div>

    <input type="button" title="Vote Down" class="down" onClick="addVote(<?php echo $row['post_id']; ?>,'-1')" <?php echo $down; ?> />
    </div>
    </div>
            </div>
            <div class="col-11">
        <li class="title"><?php echo $row["title"]; ?> </li>
        <div class="content"><?php echo $row['content']?> </div> 
    </div>
        </div>
    </div>
    <?php }
            ?> 
        </div>
    </div>
    </body>
</html>