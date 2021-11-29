<?php 
  include('includes/config.php');

  if(isset($_SESSION['id'])) {
    $sql = "SELECT * FROM user WHERE id='{$_SESSION["id"]}'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);

    $name = $row['name'];
    $email = $row['email'];
    $img_path = $row['img_path'];
  }
 
  if(isset($_POST['submit']) && isset($_SESSION['id'])) {
    // Verifying CSRF Token
    if(!empty($_POST['csrftoken'])) {
      if(hash_equals($_SESSION['token'], $_POST['csrftoken'])) {
        $comment=$_POST['comment'];
        $postid=intval($_GET['nid']);
        $query=mysqli_query($con,"insert into tblcomments(postId,name,email,comment,img_path) values('$postid','$name','$email','$comment','$img_path')");
        if($query):
          unset($_SESSION['token']);
        endif;
      }
    }    
  }
  else if(isset($_POST['submit']) && !isset($_SESSION['id'])) {
    echo "<script>alert('You are not the user. Please login');</script>"; 
  }

  if(isset($_SESSION['id'])) {
    $sql1 = "SELECT img_path FROM tblcomments WHERE email = '$email'";
    $result1 = $con->query($sql1);

    if ($result1->num_rows > 0) {
      while($row = $result1->fetch_assoc()) {
        $img_path1 = $img_path;
        $sql1 = "UPDATE tblcomments SET img_path = $img_path1 WHERE email='$email'";
        $con->query($sql1);
      }
    }
  }

  $postid=intval($_GET['nid']);
  $sql = "SELECT viewCounter FROM tblposts WHERE id = '$postid'";
  $result = $con->query($sql);

  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $visits = $row["viewCounter"];
      $sql = "UPDATE tblposts SET viewCounter = $visits+1 WHERE id ='$postid'";
      $con->query($sql);
    }
  } else {
      echo "No results";
  }
?>
