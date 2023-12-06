<?php
    $kunci = mysqli_connect("localhost", "root", "", "rouy7122_uts_pemweb");
    if($_GET['type'] == "post")//delete post and all comments on post
    {
        $sqlComments = "SELECT * FROM comments WHERE reply_type='post' AND reply_to = '{$_GET['id']}'";
        $keranjangComments = mysqli_query($kunci, $sqlComments);
        while($comments = mysqli_fetch_assoc($keranjangComments))//for all comments on post
        {
            $sqlReply = "SELECT * FROM comments WHERE reply_to = '{$comments['id']}' AND reply_type='comment'";
            $keranjangReply = mysqli_query($kunci, $sqlReply);
            while($reply = mysqli_fetch_assoc($keranjangReply))//delete all likes from replies on comment
            {
                $sqlReplyLikes = "DELETE FROM likes WHERE liked_id = '{$reply['id']}' AND type='comment'";
                mysqli_query($kunci, $sqlReplyLikes);
            }
            $sqlCommentLikes = "DELETE FROM likes WHERE liked_id = '{$comments['id']}' AND type='comment'";
            $sqlReply = "DELETE FROM comments WHERE reply_to = '{$comments['id']}' AND reply_type='comment'";
            mysqli_query($kunci, $sqlCommentLikes);//delete likes from comment
            mysqli_query($kunci, $sqlReply);//delete all replies on comment
        }
        $sql = "DELETE FROM posts WHERE id = '{$_GET['id']}'";
        $sqlComments = "DELETE FROM comments WHERE reply_to = '{$_GET['id']}' AND reply_type='post'";
        $sqlLikes = "DELETE FROM likes WHERE liked_id = '{$_GET['id']}' AND type='post'";
        mysqli_query($kunci, $sqlLikes);//delete all likes on post
        mysqli_query($kunci, $sqlComments);//delete all comments on post
        mysqli_query($kunci, $sql);//delete post
    }
    elseif($_GET['type'] == "comment")//delete comment and all replies to comment
    {
        $sqlReply = "SELECT * FROM comments WHERE reply_to = '{$_GET['id']}' AND reply_type='comment'";
        $keranjangReply = mysqli_query($kunci, $sqlReply);
        while($reply = mysqli_fetch_assoc($keranjangReply))
        {
            $sqlReplyLikes = "DELETE FROM likes WHERE liked_id = '{$reply['id']}' AND type='comment'";
            mysqli_query($kunci, $sqlReplyLikes);
        }
        $sqlCommentLikes = "DELETE FROM likes WHERE liked_id = '{$_GET['id']}' AND type='comment'";
        $sqlReply = "DELETE FROM comments WHERE reply_to = '{$_GET['id']}' AND reply_type='comment'";
        $sql = "DELETE FROM comments WHERE id = '{$_GET['id']}'";
        mysqli_query($kunci, $sqlCommentLikes);
        mysqli_query($kunci, $sqlReply);
        mysqli_query($kunci, $sql);
    }
    elseif($_GET['type'] == "reply")//delete reply
    {
        $sql = "DELETE FROM comments WHERE id = '{$_GET['id']}'";
        $sqlReplyLikes = "DELETE FROM likes WHERE liked_id = '{$_GET['id']}' AND type='comment'";
        mysqli_query($kunci, $sqlReplyLikes);
        mysqli_query($kunci, $sql);
    }
    elseif($_GET['type'] == "profile")//delete profile
    {
        $sql = "SELECT * FROM posts WHERE posted_by = '{$_GET['id']}'";
        $keranjang = mysqli_query($kunci, $sql);
        while($posts = mysqli_fetch_assoc($keranjang))//for all posts by user
        {
            $sqlComments = "SELECT * FROM comments WHERE reply_type='post' AND reply_to = '{$posts['id']}'";
            $keranjangComments = mysqli_query($kunci, $sqlComments);
            while($comments = mysqli_fetch_assoc($keranjangComments))//for all comments on post
            {
                $sqlReply = "SELECT * FROM comments WHERE reply_to = '{$comments['id']}' AND reply_type='comment'";
                $keranjangReply = mysqli_query($kunci, $sqlReply);
                while($reply = mysqli_fetch_assoc($keranjangReply))//delete all likes from replies on comment
                {
                    $sqlReplyLikes = "DELETE FROM likes WHERE liked_id = '{$reply['id']}' AND type='comment'";
                    mysqli_query($kunci, $sqlReplyLikes);
                }
                $sqlCommentLikes = "DELETE FROM likes WHERE liked_id = '{$comments['id']}' AND type='comment'";
                $sqlReply = "DELETE FROM comments WHERE reply_to = '{$comments['id']}' AND reply_type='comment'";
                mysqli_query($kunci, $sqlCommentLikes);//delete like from comment
                mysqli_query($kunci, $sqlReply);//delete all replies on comment
            }
            $sqlLikes = "DELETE FROM likes WHERE liked_id = '{$posts['id']}' AND type='post'";
            $sqlComments = "DELETE FROM comments WHERE reply_to = '{$posts['id']}' AND reply_type='post'";
            mysqli_query($kunci, $sqlComments);//delete all comments on post
            mysqli_query($kunci, $sqlLikes);//delete all likes on post
        }
        $sqlComments = "DELETE FROM comments WHERE posted_by = '{$_GET['id']}'";//delete all comments by user
        $sqlLikes = "DELETE FROM likes WHERE liked_by = '{$_GET['id']}'";//delete all likes by user
        $sqlPosts = "DELETE FROM posts WHERE posted_by = '{$_GET['id']}'";//delete all posts by user
        $sql = "DELETE FROM users WHERE id = '{$_GET['id']}'";//delete user
        mysqli_query($kunci, $sqlLikes);
        mysqli_query($kunci, $sqlComments);
        mysqli_query($kunci, $sqlPosts);
        mysqli_query($kunci, $sql);
    }
    header("location: {$_GET['from']}");
?>