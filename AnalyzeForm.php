
<?php
	/*To start pHp, go to terminal and paste this: 
	/Applications/MAMP/bin/php/php5.4.45/bin/php -S localhost:8000 -t ~/test
	*/
	/*create new git directory using php */

	$fname=$lname=$ThumbnailPhoto=$year="";
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
                if ($file_size > $maxsize)          
                    echo "Error: File size is larger than the allowed limit. <br/>";  
  
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

//uploadImages("files[]");
uploadImages('OneThumbnailPhoto', $FileForImages."/" );
uploadImages('FourProjectPhotos', $FileForImages."/");
uploadImages('TwoImagesOfCode', $FileForImages."/");
//uploadImages('CodeFiles', "Mentee1/");
uploadImages('CodeFiles', $FileForCode."/");






   



	echo "<br>";
?>
