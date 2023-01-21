<?php
include "functions.php";
// Load autoloader (using Composer)
require __DIR__ . '/vendor/autoload.php';
$pdf = new TCPDF();                 // create TCPDF object with default constructor args
$pdf->AddPage();                    // pretty self-explanatory

$post = new Post($_GET['postId']);
$postId = $post->getId();
$author = $post->getAuthorName();
$topicName = $post->getTopicName();
$image = new Image ($post->imageId);
$crtDate = date('d m Y');
$lastUpdate = lastUpdateShow($post->getId());


$html = '<div class="card mb-4 px-5 border-dark">
                <div class="card-body">
                    <p class="card-text"><small class="text-muted">'.$post->createdAt.'
                    <i class="fa fa-heart-o px-1 offset-md-8 text-decoration-none text-muted fs-6" aria-hidden="true">
                                <span class="top-0 start-100 translate-middle badge rounded-pill bg-info ">'.$post->likes.'
                                </span>
                            </i></small>
                            <p><small class="text-muted">Written by '.$author.'</small></p>

                    </p>
                    <h2 class="card-title my-4">'.$post->title.'</h2>
                    <img src="../blog-frontend/images/'.$image->file.'" class="card-img-top" alt="...">
                    <p class="card-text my-4">'.$post->body.'</p>
                    <p class="card-text border-bottom p-2"><small class="text-muted">Last update: '.$lastUpdate.'</small></p>
                    <div class="mb-4 text-decoration-none">
                            <a href="#"><i class="fa fa-instagram text-dark px-2 text-start" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-twitter text-dark px-2 text-start" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-pinterest-p text-dark px-2 text-start" aria-hidden="true"></i></a>
                        <span class="mb-4 px-2 offset-md-7 text-decoration-none text-muted fs-6">Topic: '.$topicName.'</span>
                    </div>
                </div>
            </div>';
$pdf->writeHTML($html, true, false, true, false, '');
ob_clean();
$pdf->Output("BlogPostNo.$postId.pdf", 'I');

