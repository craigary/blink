<?php 
$currentURL= $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$parsed = parse_url($currentURL);
$query = $parsed['query'];
parse_str($query, $params);
unset($params['page']);
$currentParameter = http_build_query($params);

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}

function getLimits($postsPerPage, $page){
    $pageStartNum = ($page - 1) * $postsPerPage + 1;
    $limitString = ' LIMIT '.$pageStartNum.', '.$postsPerPage;
    return $limitString;
}

function displayPagination ($num_rows, $postsPerPage, $page, $currentParameter) {
    $pageNumber = ceil($num_rows/$postsPerPage);
    $pageminusone = $page - 1;
    $pageplusone = $page + 1;
    $parameterPreviousString = $pageminusone.'&'.$currentParameter;
    $parameterNextString = $pageplusone.'&'.$currentParameter;
    $parameterPreviousString = rtrim($parameterPreviousString,'&');
    $parameterNextString = rtrim($parameterNextString,'&');


    if ($page == 1){
        $prevPage = '<a class="pagination-previous" href="#" style="visibility:hidden;">Previous</a>';
    } else {
        $prevPage =  '<a class="pagination-previous" href="?page='.$parameterPreviousString.'">Previous</a>';
    }

    if ($page == $pageNumber){
        $nextPage = '<a class="pagination-next" href="#" style="visibility:hidden;">Next</a>';
    } else {
        $nextPage = '<a class="pagination-next" href="?page='.$parameterNextString.'">Next</a>';
    }

    $finalresult = $prevPage.$nextPage;
    echo $finalresult;
}

// displayPagination ($num_rows, $postsPerPage, $page)

?>