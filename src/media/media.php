<?php

$pageTitle = "ag-Grid Blog";
$pageDescription = "a collection of blogs from ag-Grid team";
$pageKeyboards = "blogs ag-grid angular react webpack";

include('../includes/mediaHeader.php');

define('niall', 'Niall Crosby');
define('sean', 'Sean Landsman');
define('sophia', 'Sophia Lazarova');
define('amit', 'Amit Moryossef');

function featuredBlog($title, $cardImage, $link, $author, $date, $authorImage) {
    $authors = AUTHORS;
    echo <<<HTML
    <div class="col-md-4">
        <div class="card">
          <a href="$link" class="cover" style="background-image: url($cardImage)" title="$title">$title</a>
          <div class="card-body">
            <h3 class="card-title">
                <a href="$link">$title</a>
            </h3>

            <div class="media">
                <img src="/images/team/{$authorImage}.jpg">
                <div class="media-body">
                    <h4>{$author} <span>$date</span> </h4>
                </div>
            </div>
          </div>
        </div>
    </div>
HTML;
}

function recentBlog($title, $summary, $image, $link, $author, $date, $authorImage) {
    $authors = AUTHORS;
    echo <<<HTML
    <div class="row post-summary">
        <div class="col-md-3">
          <a href="$link" class="cover" style="background-image: url($image)" title="$title">$title</a>
        </div>

        <div class="col-md-9">
            <h3 class="card-title"> <a href="$link">$title</a> </h3>
            <p>$summary</p>
            <div class="media">
                <img src="/images/team/{$authorImage}.jpg">
                <div class="media-body">
                    <h4>{$author} <span>$date</span> </h4>
                </div>
            </div>
        </div>
    </div>
HTML;
}
?>

<div id="blogs-homepage">

<div id="headline">
    <h1>
        <a href="../ag-grid-blog-15-0-0/">Happy New ag-Grid v15.0.0</a>
        <span>by Sophia Lazarova | 13 December 2017</span>
    </h1>

    <a href="../ag-grid-blog-15-0-0/"><img style="margin-bottom:30px;" src="../ag-grid-blog-15-0-0/cover15-0-0.png" width='100%' class="rounded" /></a>
</div>

<div id="featured-blogs">
    <h2>Featured</h2>

    <div class="row">
    <?php
    featuredBlog(
        'Understand your data: The power of pivot tables',
        '../pivoting-blog/img-pivot.png',
        '../pivoting-blog/',
        sophia,
        '15 December 2017',
        'sophia'
    );

    featuredBlog(
        'Building a CRUD Application with ag-Grid - Part 4',
        '../ag-grid-datagrid-crud-part-1/crud_overview.png',
        '../ag-grid-datagrid-crud-part-4/',
         sean,
        '5 December 2017',
        'sean'

    );

    featuredBlog(
        'Building a CRUD Application with ag-Grid - Part 3',
        '../ag-grid-datagrid-crud-part-1/crud_overview.png',
        '../ag-grid-datagrid-crud-part-3/',
        sean,
        '21 November 2017',
        'sean'
    );

    ?>
    </div>
</div>

<div id="recent-blogs">
    <h2>RECENT</h2>
<?php
$blogPosts = json_decode(file_get_contents('blog-posts.json'), true);

    foreach($blogPosts as $post) {
        recentBlog(
            $post['title'],
            $post['summary'],
            $post['img'],
            $post['link'],
            $post['author'],
            $post['date'],
            $post['authorImage']
        );
    }
?>
</div>
</div>

<?php include_once("../includes/mediaFooter.php"); ?>
