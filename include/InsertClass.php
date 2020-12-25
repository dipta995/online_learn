<?php 
include_once 'dbcon.php';
class InsertClass extends DatabaseConnection
{
	
	public function __construct(){
		$this->connectDataBase();
		
		
		}


	public function studentregistration($input){
		$student_name = mysqli_real_escape_string($this->db,$input['student_name']);
		$student_email = mysqli_real_escape_string($this->db,$input['student_email']);
		$student_phone = mysqli_real_escape_string($this->db,$input['student_phone']);
		$student_password = mysqli_real_escape_string($this->db,$input['student_password']);
		$gender = mysqli_real_escape_string($this->db,$input['gender']);

		if (empty($student_name) || empty($student_email) || empty($student_phone) || empty($student_password)) {
			return $message = "<div class='alert alert-warning' role='alert'>Field must not be empty!</div>";
		} else{
			$query = "INSERT INTO student_table(student_name,student_email,student_phone,student_password,gender)VALUES('$student_name','$student_email','$student_phone','$student_password','$gender')"; 
			$result = $this->queryfunk($query);
			if ($result) {
				/*return $message = "<div class='alert alert-success' role='alert'>Successfully Registered</div>";*/
				return $message = "<script> window.location = 'login.php';</script>";
			}
		
		}

	}
	public function teacherregistration($input){
			$teacher_name = mysqli_real_escape_string($this->db,$input['teacher_name']);
			$teacher_email = mysqli_real_escape_string($this->db,$input['teacher_email']);
			$teacher_phone = mysqli_real_escape_string($this->db,$input['teacher_phone']);
			$teacher_password = mysqli_real_escape_string($this->db,$input['teacher_password']);

			if (empty($teacher_name) || empty($teacher_email) || empty($teacher_phone) || empty($teacher_password)) {
				return $message = "<div class='alert alert-warning' role='alert'>Field must not be empty!</div>";
			} else{
				$query = "INSERT INTO teacher_table(teacher_name,teacher_email,teacher_phone,teacher_password)VALUES('$teacher_name','$teacher_email','$teacher_phone','$teacher_password')"; 
				$result = $this->queryfunk($query);
				if ($result) {
					return $message = "<div class='alert alert-success' role='alert'>Successfully Registered</div>";
				}
			
			}

		}


	public function enrollfunk($data){
		$student_id = mysqli_real_escape_string($this->db,$data['student_id']);
		$course_id = mysqli_real_escape_string($this->db,$data['course_id']);
		$price = mysqli_real_escape_string($this->db,$data['price']);
		$sqlquery = "SELECT * FROM enrole_student_list WHERE student_id = '$student_id' AND course_id ='$course_id'";
				$getre = $this->queryfunk($sqlquery);
				//$value = mysqli_fetch_array($result);
				

				if ($getre->num_rows>0) {
				 
					return $message = "<div class='alert alert-danger' role='alert'>Already Registered </div>";

				}else{

					$query = "INSERT INTO enrole_student_list(student_id,course_id,price)VALUES('$student_id','$course_id','$price')"; 
			$result = $this->queryfunk($query);
			if ($result) {
				return $message = "<div class='alert alert-success' role='alert'>Successfully Registered</div>";
				return "<script> window.location = 'enrollcart.php';</script>";
			}

				}


	}

	public function createcourse_t($data,$files,$teacher_id){
		$course_title = mysqli_real_escape_string($this->db,$data['course_title']);
		$course_details = mysqli_real_escape_string($this->db,$data['course_details']);
		$price = mysqli_real_escape_string($this->db,$data['price']);
		$category_id  = mysqli_real_escape_string($this->db,$data['category_id']);

		$file_name = $files['image']['name'];
      	$file_size =$files['image']['size'];
      	$file_tmp =$files['image']['tmp_name'];
      	$file_type=$files['image']['type'];
      	$div            = explode('.', $file_name);
	  	$file_ext       = strtolower(end($div));
       
    
      	$uploaded_image = "img/".$file_name;
	    $move_image = "img/".$file_name;

      
      $extensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,$move_image);

         $query = "INSERT INTO course_table(course_title,course_details,category_id,teacher_id,price,course_image)VALUES('$course_title','$course_details','$category_id','$teacher_id','$price','$uploaded_image')"; 
			$result = $this->queryfunk($query);





         return $message = "<div class='alert alert-success' role='alert'>Successfully Inserted</div>";
      }else{
         print_r($errors);
      }

	}


	public function addvideo_t($data,$files,$id){
			$video_title = mysqli_real_escape_string($this->db,$data['video_title']);
			

			$file_name = $files['video_file']['name'];
	      	$file_size =$files['video_file']['size'];
	      	$file_tmp =$files['video_file']['tmp_name'];
	      	$file_type=$files['video_file']['type'];
	      	$div            = explode('.', $file_name);
		  	$file_ext       = strtolower(end($div));
	       
	    
	      	$uploaded_image = "video/".$file_name;
		    $move_image = "video/".$file_name;

	      
	      $extensions= array("mp4","avi","3gp","flv","mov","mpeg");
	      
	      if(in_array($file_ext,$extensions)=== false){
	         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
	      }
	      
	      /*if($file_size > 2097152){
	         $errors[]='File size must be excately 2 MB';
	      }*/
	      
	      if(empty($errors)==true){
	         move_uploaded_file($file_tmp,$move_image);

	         $query = "INSERT INTO video_table(video_title,course_id,video_file)VALUES('$video_title','$id','$uploaded_image')"; 
				$result = $this->queryfunk($query);

				return $message = "<div class='alert alert-success' role='alert'>Successfully Inserted</div>";
	      }else{
	         print_r($errors);
	      }

		}

		public function rattinginput($data,$student_id,$course_id){
		
			 
			$newhit = mysqli_real_escape_string($this->db, $data['rating']);
			$testque = "SELECT * FROM ratecheck_table WHERE course_id=$course_id AND student_id=$student_id";
			$checkrate = $this->queryfunk($testque);
			 
			
					if (mysqli_num_rows($checkrate)>0) {
echo "ALREADY RATED";
					}else{

				





			 
			$query = "SELECT * FROM course_table WHERE course_id=$course_id";
			$result = $this->queryfunk_help($query);
			$getd = $result->fetch_assoc();
			$prehit = $getd['rat_total'];
			$avgrat = $getd['rat_hit'];


			$presenthit = number_format($prehit)+($newhit);
			$avgratcheck = number_format($avgrat)+1;







			if (empty($presenthit)) {
				$msg = "Field must not be empty";
				return $msg;
			}else{
			$sql = "INSERT INTO ratecheck_table(student_id,course_id)VALUES('$student_id','$course_id')";
			$sqls= "UPDATE course_table SET rat_total = '$presenthit', rat_hit = '$avgratcheck' WHERE course_id = '$course_id'";
			$insert_row = $this->queryfunk($sql);
		 
			$insertss = $this->queryfunk($sqls);
			if ($insert_row) {
					
					$message = "<span style='color:green;'>post inserted</span>";
					return $message;
				}else{
					$message = "<span style='color:red;'>post not inserted</span>";
					return $message;
				}

			}

				}
		}


		public function sendcomment($data,$id,$course_id){
		$comment = mysqli_real_escape_string($this->db,$data['comment']);
		if (empty($comment)) {
			
		}else{
					$query = "INSERT INTO comment_table(student_id,course_id,comment)VALUES('$id','$course_id','$comment')"; 
			$result = $this->queryfunk($query);
			if ($result) {
				return $message = "<div class='alert alert-success' role='alert'>Successfully Registered</div>";
				//return "<script> window.location = 'enrollcart.php';</script>";
			}
		}
	 	}



	public function sendreplay($data,$id){
			$replay = mysqli_real_escape_string($this->db,$data['replay']);
			$comment_id = mysqli_real_escape_string($this->db,$data['comment_id']);
			if (empty($replay)) {
				
			}else{
						$query = "INSERT INTO replay_table(replay,teacher_id,comment_id)VALUES('$replay','$id','$comment_id')"; 
				$result = $this->queryfunk($query);
				if ($result) {
					return $message = "<div class='alert alert-success' role='alert'>Successfully Registered</div>";
					//return "<script> window.location = 'enrollcart.php';</script>";
				}

			}
		 


					


		}










}
