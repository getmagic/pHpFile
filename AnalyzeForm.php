
<?php
	/*To start pHp, go to terminal and paste this: 
	/Applications/MAMP/bin/php/php5.4.45/bin/php -S localhost:8000 -t ~/test
	*/
	/*create new git directory using php */

    //SAY IF U SELECT HARDWARE AND SOMEHOW PRESS THE SOFTWARE BUTTONS BY GOING TO INSPECT, IT WILL IGNORE IT
   // echo $_COOKIE["UserAuthenticationValue"]; 
    
	$fname=$lname=$ThumbnailPhoto=$year=$ProjectType="";
	$fname = $_POST["First-Name"];
	$lname = $_POST["Last-Name"];
    $year= $_POST["Year-you-were-a-mentee"];
	echo "<br>";
	//Make Abbreviation (works)
		$LastInitial=substr($lname, 0, 1); //gets the first character of the last name
		$LastInitial=strtoupper($LastInitial); //makes the first character of last name uppercase
		$FirstInitial=substr($fname, 0, 1); //gets first character of teh first name
		$FirstInitial=strtoupper($FirstInitial); //makes the first character of the first name uppercase
		$RestofFirst=substr($fname, 1); //gets all of fname except for first character
		$RestofFirst=strtolower($RestofFirst); //makes all of fname except first character lowercase
		$Abbrev=$FirstInitial.$RestofFirst.$LastInitial;
	echo $Abbrev;

	echo "<br>";

    //works
    //$FileToCheck="/Users/skamboj2022/Downloads/TestPlaceFile/images/2017/Ruchik";
    $FileForImages="/Users/skamboj2022/Downloads/TestPlaceFile/images/".$year."/".$Abbrev;
    $FileForCode="/Users/skamboj2022/Downloads/TestPlaceFile/MenteeCodes/".$year."/Mentee".$Abbrev;
    //if file does not exist it will create a new file
function createNestedDirectories($directoryToMake){
    if ( !file_exists( $directoryToMake ) && !is_dir( $directoryToMake ) ) {
        mkdir($directoryToMake, 0777, true);
        echo "Directory is created <br>";
    }
    else{
        echo "Directory already exists <br>";
    }

}
createNestedDirectories($FileForImages);
createNestedDirectories($FileForCode);

    /*if ( !file_exists( $FileToCheck ) && !is_dir( $FileToCheck ) ) {
        mkdir($FileToCheck, 0777, true);
        echo "Directory is created <br>";
    }
    else{
        echo "Directory already exists <br>";
    }*/

/*function createNewIndexHtml($FileDirection){
    if(isset( $_POST['Type-of-Project'])){  
        if ($_POST['Type-of-Project']=="Hardware"){
            echo "<br> Hardware selected <br>";
            //$formatTemplate="Your name is %s";
            //$fname = $_POST["First-Name"];
            //$content=sprintf($formatTemplate, $fname);
            $fname = $_POST["First-Name"];
            $fileforCSS='/Users/skamboj2022/Downloads/Internship/newProject/getmagic.github.io/';
            $fileforVideo='/Users/skamboj2022/Downloads/TestPlaceFile/images/'.$year.'/'.$Abbrev.'/';
           // $content="My name is {$fname}";
            $content="<!DOCTYPE html>
                        <html lang='en'>
                        <head> 
                            <title>{$fname}'s Project</title>
                            <link rel='stylesheet' href={$fileforCSS}css/bootstrap.min.css>
                            <link rel='stylesheet' href={$fileforCSS}css/reset.css>
                            <link rel='stylesheet' href={$fileforCSS}css/cubeportfolio.min.css>
                            <link rel='stylesheet' href={$fileforCSS}css/owl.carousel.min.css>
                            <link rel='stylesheet' href={$fileforCSS}css/owl.theme.default.min.css>
                            <link rel='stylesheet' href={$fileforCSS}css/magnific-popup.css> 
                            <link rel='stylesheet' href={$fileforCSS}css/style.css>
                            <link rel='stylesheet' href={$fileforCSS}icon-fonts/fontawesome-5.0.6/css/fontawesome-all.min.css>
                            <link rel='stylesheet' href={$fileforCSS}icon-fonts/etlinefont/style.css>
                            <link href='https://fonts.googleapis.com/css?family=Poppins:400,500,600,700,800' rel='stylesheet'>
                        </head>
                        <body>
                             <div class='wrapper'>
                                <header class='type-1 dark'>
                                    <a class='logo float-left'><img height='60' src={$fileforCSS}images/Logo/MAGICLogo.png></a>
                                    <nav class='float-right'>
                                         <ul>
                                            <li><a href={$fileforCSS}index.html#home>Home</a></li>
                                            <li><a href={$fileforCSS}index.html#about>About</a></li>
                                            <li><a href={$fileforCSS}index.html#blog>Student Projects</a></li>
                                         </ul>
                                    </nav>
                                    <div class='nav-icon'>
                                        <span></span>
                                         <span></span>
                                        <span></span>
                                    </div>
                                 </header>
                                 <div class='article-content padbot_90 padding_60 text-center'>
                                    <div class='container'>
                                        <div class='col-lg-8 offset-lg-2'>
                                            <h2 class='port-title-three top_60'>{$fname}'s Project</h2><br>
                                                <p class='text-type-two top_15'>Project Description (where to find it, how your project works, etc)</p>
                
                
                                         </div>
                                    </div>
                                 </div>
                                 <div style='padding-bottom: 60px;' class='full-image padding_15'>
                                    <div class='container'>
                                        <video class='lightbox' width='60%' style='margin: 0 auto; display: block;' controls>
                                             <source type='video/mp4' src={$fileforVideo}ScreenRecording.mp4 >
                                            Your browser does not support HTML video. 
                                        </video>
            
                                    </div>
                                </div>
                             </div>
                             <footer id='footercontacts' class='type-1'>
                                <div class='cont text-center padding_90'>
                                    <p>Copyright © 2019 MAGIC, All rights Reserved.</p>
                                    <div class='social top_30'>
                                        <a href='https://www.facebook.com/GirlsGetMAGIC/'><i class='fab fa-facebook'></i>  </a>
                                        <a href='https://twitter.com/STEMmagic'><i class='fab fa-twitter' aria-hidden='true'></i>  </a>
                                    </div>
                                    <br>
                                    <br>
                                    <div class='information col-md-8 offset-md-2'>
                                        <div class='row'>
                                            <div class='col-md-4 col-sm-6 info text-center wow' data-wow-delay='0.9s'>
                                                <p><b>Official Website </b><br> getmagic.org</p>
                                            </div>
                                            <div class='col-md-4 col-sm-6 info text-center wow' data-wow-delay='1.3s'>
                                                <p><b>Location</b><br>San Jose, California, USA</p>
                                            </div>
                                            <div class='col-md-4 col-sm-12 info text-center wow' data-wow-delay='1.7s'>
                                                <p><b>Email</b> <br>info@getmagic.org</p>
                                            </div>
                                        </div>
                                    </div>

                                 </div>
                            </footer>
                            <script src={$fileforCSS}js/jquery-2.1.4.min.js></script>
<script src={$fileforCSS}js/owl.carousel.min.js></script>
<script src={$fileforCSS}js/jquery.cubeportfolio.min.js></script>
<script src={$fileforCSS}js/jquery.magnific-popup.min.js></script>
<script src={$fileforCSS}js/main.js></script>

</body>
</html>";
             $fp = fopen($FileDirection . "/index.html","wb");
            fwrite($fp,$content);
            fclose($fp);
        }         
    }
}*/

    

function uploadImages($nameofinput, $placetostore){
	// Configure upload directory and allowed file types 
    //$upload_dir = 'uploads'.DIRECTORY_SEPARATOR; 
    //$upload_dir="/Users/skamboj2022/Downloads/TestFilePath/";
    //$upload_dir="/Users/skamboj2022/Downloads/TestPlaceFile/". $placetostore;
    $upload_dir=$placetostore;
    $allowed_types = array('png'); 
    $number=0;
      
    // Define maxsize for files i.e 2MB 
    $maxsize = 2 * 1024 * 1024;  
   
        // Loop through each file in files[] array 
        foreach ($_FILES[$nameofinput]['tmp_name'] as $key => $value) { 
	        $file_tmpname = $_FILES[$nameofinput]['tmp_name'][$key]; 
            $file_name = $_FILES[$nameofinput]['name'][$key]; 
            //$file_size = $_FILES['files']['size'][$key]; 
            $file_size = $_FILES[$nameofinput]['size'][$key];
            $file_ext = pathinfo($file_name, PATHINFO_EXTENSION); 

            $number=$number+1;
            switch ($nameofinput){
            	case 'OneThumbnailPhoto':
            		$newfilename="Thumbnail_Photo.png";
            		break;
            	case 'FourProjectPhotos':
            		$newfilename="Example_Photo".$number.".".$file_ext;
            		break;
            	case 'TwoImagesOfCode':
            		$newfilename="Code".$number.".".$file_ext;
            		break;
                case 'Screenrecord':
                    $newfilename="ScreenRecording.mp4";
                    break;
            	default: 
            		$newfilename=$file_name;
            		break;
            }
            
  
            // Set upload file path 
           // $filepath = $upload_dir.$file_name; 
            $filepath=$upload_dir.$newfilename;
           
  
            // Check file type is allowed or not 
            //if(in_array(strtolower($file_ext), $allowed_types)) { 
  
                // Verify file size - 2MB max  
               /* if ($file_size > $maxsize)          
                    echo "Error: File size is larger than the allowed limit. <br/>";  */
  
                // If file with name already exist then 
                if(file_exists($filepath)) { 
                     echo "Sorry, {$file_name} already exists. <br/>";
                } 
                else { 
                    if( move_uploaded_file($file_tmpname, $filepath)) { 
                        echo "{$file_name} was renamed {$newfilename} and successfully uploaded <br />"; 
                    } 
                    else {                      
                        echo "Error uploading {$file_name} <br />";  
                    } 
                } 
           // } //end of if in_array
            /*else { 
                  
                // If file extention not valid 
                echo "Error uploading {$file_name} ";  
                echo "({$file_ext} file type is not allowed)<br / >"; 
            }  //end of else*/
        } //end of foreach

}








uploadImages('OneThumbnailPhoto', $FileForImages."/" );
uploadImages('FourProjectPhotos', $FileForImages."/");
uploadImages('TwoImagesOfCode', $FileForImages."/");

if ($_POST['Type-of-Project']=="Hardware" || $_POST['Type-of-Software']=="App" || $_POST['Type-of-Software']=="other"){
uploadImages('Screenrecord', $FileForImages."/");
}


uploadImages('CodeFiles', $FileForCode."/");




//createNewIndexHtml($FileForCode."/");

$FileDirection=$FileForCode."/";
$EditedFname=$FirstInitial.$RestofFirst;

if(isset( $_POST['Type-of-Project'])){  
        /*if ($_POST['Type-of-Project']=="Hardware"){*/
        if ($_POST['Type-of-Project']=="Hardware" || $_POST['Type-of-Software']=="App" || $_POST['Type-of-Software']=="other"){
            echo "<br> Hardware/ App/ Other selected <br>";
            //$formatTemplate="Your name is %s";
            //$fname = $_POST["First-Name"];
            //$content=sprintf($formatTemplate, $fname);
            $fileforCSS='/Users/skamboj2022/Downloads/Internship/newProject/getmagic.github.io/';
            $ProjectDescription=$_POST["Description-Of-NonSoftware-Project"];
           // $content="My name is {$fname}";
            $content="<!DOCTYPE html>
                        <html lang='en'>
                        <head> 
                            <title>{$EditedFname}'s Project</title>
                            <link rel='stylesheet' href={$fileforCSS}css/bootstrap.min.css>
                            <link rel='stylesheet' href={$fileforCSS}css/reset.css>
                            <link rel='stylesheet' href={$fileforCSS}css/cubeportfolio.min.css>
                            <link rel='stylesheet' href={$fileforCSS}css/owl.carousel.min.css>
                            <link rel='stylesheet' href={$fileforCSS}css/owl.theme.default.min.css>
                            <link rel='stylesheet' href={$fileforCSS}css/magnific-popup.css> 
                            <link rel='stylesheet' href={$fileforCSS}css/style.css>
                            <link rel='stylesheet' href={$fileforCSS}icon-fonts/fontawesome-5.0.6/css/fontawesome-all.min.css>
                            <link rel='stylesheet' href={$fileforCSS}icon-fonts/etlinefont/style.css>
                            <link href='https://fonts.googleapis.com/css?family=Poppins:400,500,600,700,800' rel='stylesheet'>
                        </head>
                        <body>
                             <div class='wrapper'>
                                <header class='type-1 dark'>
                                    <a class='logo float-left'><img height='60' src={$fileforCSS}images/Logo/MAGICLogo.png></a>
                                    <nav class='float-right'>
                                         <ul>
                                            <li><a href={$fileforCSS}index.html#home>Home</a></li>
                                            <li><a href={$fileforCSS}index.html#about>About</a></li>
                                            <li><a href={$fileforCSS}index.html#blog>Student Projects</a></li>
                                         </ul>
                                    </nav>
                                    <div class='nav-icon'>
                                        <span></span>
                                         <span></span>
                                        <span></span>
                                    </div>
                                 </header>
                                 <div class='article-content padbot_90 padding_60 text-center'>
                                    <div class='container'>
                                        <div class='col-lg-8 offset-lg-2'>
                                            <h2 class='port-title-three top_60'>{$EditedFname}'s Project</h2><br>
                                                <p class='text-type-two top_15'>{$ProjectDescription}</p>
                
                
                                         </div>
                                    </div>
                                 </div>
                                 <div style='padding-bottom: 60px;' class='full-image padding_15'>
                                    <div class='container'>
                                        <video class='lightbox' width='60%' style='margin: 0 auto; display: block;' controls>
                                             <source type='video/mp4' src={$FileForImages}/ScreenRecording.mp4 >
                                            Your browser does not support HTML video. 
                                        </video>
            
                                    </div>
                                </div>
                             </div>
                             <footer id='footercontacts' class='type-1'>
                                <div class='cont text-center padding_90'>
                                    <p>Copyright © 2019 MAGIC, All rights Reserved.</p>
                                    <div class='social top_30'>
                                        <a href='https://www.facebook.com/GirlsGetMAGIC/'><i class='fab fa-facebook'></i>  </a>
                                        <a href='https://twitter.com/STEMmagic'><i class='fab fa-twitter' aria-hidden='true'></i>  </a>
                                    </div>
                                    <br>
                                    <br>
                                    <div class='information col-md-8 offset-md-2'>
                                        <div class='row'>
                                            <div class='col-md-4 col-sm-6 info text-center wow' data-wow-delay='0.9s'>
                                                <p><b>Official Website </b><br> getmagic.org</p>
                                            </div>
                                            <div class='col-md-4 col-sm-6 info text-center wow' data-wow-delay='1.3s'>
                                                <p><b>Location</b><br>San Jose, California, USA</p>
                                            </div>
                                            <div class='col-md-4 col-sm-12 info text-center wow' data-wow-delay='1.7s'>
                                                <p><b>Email</b> <br>info@getmagic.org</p>
                                            </div>
                                        </div>
                                    </div>

                                 </div>
                            </footer>
                            <script src={$fileforCSS}js/jquery-2.1.4.min.js></script>
<script src={$fileforCSS}js/owl.carousel.min.js></script>
<script src={$fileforCSS}js/jquery.cubeportfolio.min.js></script>
<script src={$fileforCSS}js/jquery.magnific-popup.min.js></script>
<script src={$fileforCSS}js/main.js></script>

</body>
</html>";
             $fp = fopen($FileDirection . "/index.html","wb");
            fwrite($fp,$content);
            fclose($fp);
        }         
    }



function saveMenteeInformation($firstname, $lastname, $yearmentee){
    $fp=fopen("/Users/skamboj2022/Downloads/TestPlaceFile/MenteeInfo.html", "a") or die ("Unable to open Mentee Info File");
    $txtToAdd="         <h2>{$firstname} {$lastname} - {$yearmentee} </h2>
                            <p> Mentee Grade : </p>
                       ";
    fwrite($fp, $txtToAdd);
}

saveMenteeInformation($fname, $lname, $year);


   



	echo "<br>";
?>

