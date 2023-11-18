<?php
// Connect to your MySQL database
header("Content-type: text/xml");
date_default_timezone_set('Asia/Kolkata');
include './dashboard/services/__api.php';


// Check if the connection was successful
if (!$con) {
    echo "Failed to connect to MySQL: " . $con->connect_error;
    exit();
}

// Retrieve the list of pages from the database

$pages = array(
    'services-page',
    'more-services',
    'blogs',
    'about-us',
    'request-a-free-quote',
);
$pagess = array(
    'services',
    'blogs',
);
$xml = '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL;
$xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . PHP_EOL;
$url = htmlspecialchars('https://anytimemove.com/');
$xml .= "\t<url>\n";
$xml .= "\t\t<loc>$url</loc>\n";
$xml .= "\t\t<lastmod>"."2023-06-22T13:23:31+05:30"."</lastmod>\n";
$xml .= "\t\t<changefreq>weekly</changefreq>\n";
$xml .= "\t\t<priority>1.00</priority>\n";
$xml .= "\t</url>\n";

foreach($pages as $page){
        $url = htmlspecialchars('https://anytimemove.com/'.$page);
        $xml .= "\t<url>\n";
        $xml .= "\t\t<loc>$url</loc>\n";
        $xml .= "\t\t<lastmod>"."2023-06-23T16:29:31+05:30"."</lastmod>\n";
        $xml .= "\t\t<changefreq>weekly</changefreq>\n";
        $xml .= "\t\t<priority>0.8</priority>\n";
        $xml .= "\t</url>\n";
}
foreach($pagess as $page){
    if($page == 'city'){
        $query = "SELECT * FROM  city ";
    }
    else{
        $query = "SELECT * FROM  $page";
    }
    $result =  mysqli_query($con,$query);
    // Create the sitemap XML
    if(mysqli_num_rows($result)>0){
        while ($row = mysqli_fetch_assoc($result)) {
            if($page == 'city'){
                $url = htmlspecialchars('https://anytimemove.com/'.$row['slug']);
                $xml .= "\t<url>\n";
                $xml .= "\t\t<loc>$url</loc>\n";
                $xml .= "\t\t<lastmod>" . $row['added_on'] . "</lastmod>\n";
                $xml .= "\t\t<changefreq>weekly</changefreq>\n";
                $xml .= "\t\t<priority>0.8</priority>\n";
                $xml .= "\t</url>\n";
            }else{
                $url = htmlspecialchars('https://anytimemove.com/'.$row['slug']);
                $xml .= "\t<url>\n";
                $xml .= "\t\t<loc>$url</loc>\n";
                $xml .= "\t\t<lastmod>" . $row['added_on'] . "</lastmod>\n";
                $xml .= "\t\t<changefreq>weekly</changefreq>\n";
                $xml .= "\t\t<priority>0.8</priority>\n";
                $xml .= "\t</url>\n";
            }
        }
    }else{echo 'Not Found';}

   
}
$xml .= '</urlset>';

// Set the file path for the sitemap XML
$sitemapPath = './sitemap.xml';

// Write the XML content to the sitemap file
file_put_contents($sitemapPath, $xml);
// Close the database connection
$con->close();

// Output a success message
echo "Sitemap generated successfully!";
?>