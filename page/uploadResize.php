<?php

include("../Util/Uploader.php");
include("../Util/ImageResizer.php");
include("../model/Upload.php");
include("../mapping/Mapper.php");
include("../dao/dao.php");
include("../dao/UploadDao.php");
include("../dao/CommentDao.php");
$uploader = new Uploader("myfile", "images");

$returnedFilePath = $uploader->is_uploaded();

if ($returnedFilePath) {

    $upload = new Upload();
    $data = [
        'senderId' => 2,
        'receiverId' => 4,
        'title' => 'HelloWorld',
        'filePath' => $returnedFilePath,
//        'comment' => 'Please work'
    ];

    $upload = Mapper::mapUpload($upload, $data);
    if ($upload->getComment()) {
        $uploadDao = new UploadDao();
        $comment = $upload->getComment();
        $upload = $uploadDao->save($upload);
        $upload->setComment($comment);
        $commentDao = new CommentDao();
        $commentDao->save($upload);
    } else {
        $uploadDao = new UploadDao();
        $uploadDao->save($upload);
    }
    
    $row = $uploadDao->findAllByReceiverId(4);

    echo $returnedFilePath . " Uploaded <br />";
}