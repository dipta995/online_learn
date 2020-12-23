<?php 
include_once 'dbcon.php';
class ViewClass extends DatabaseConnection
{
	
	public function __construct(){
		$this->connectDataBase();
		
		
		}

	public function catview(){
		$sqlquery = "SELECT * FROM category_table";
		$result = $this->queryfunk_help($sqlquery);
		return $result;
		}
		public function teacherview($teacher_id){
		$sqlquery = "SELECT * FROM teacher_table WHERE teacher_id='$teacher_id'";
		$result = $this->queryfunk_help($sqlquery);
		$value = mysqli_fetch_array($result);
		$res = "<div class='ca-pic set-bg' data-setbg='".$value['teacher_image']."'></div><p>".$value['teacher_name']."";
		 
		return $res;
		}
	public function coursefeature(){
		$sqlquery = "SELECT * FROM course_table WHERE course_feature=1";
		$result = $this->queryfunk_help($sqlquery);
		return $result;
		}
	public function allcourses(){
		$sqlquery = "SELECT * FROM course_table";
		$result = $this->queryfunk_help($sqlquery);
		return $result;
		}
	public function coursesviewbyid($id){
		$sqlquery = "SELECT * FROM course_table WHERE course_id = $id";
		$result = $this->queryfunk_help($sqlquery);
		return $result;
		}
	public function enrollcart($id){
			$sqlquery = "SELECT * FROM enrole_student_list WHERE student_id = '$id'";
			$result = $this->queryfunk($sqlquery);
			return $result->num_rows;
			 
			}



	public function allcoursesbyauthId($id){
		$sqlquery = "SELECT * FROM course_table WHERE teacher_id = '$id'";
		$result = $this->queryfunk_help($sqlquery);
		return $result;
		}
	public function coursefeaturebycatid($cat){
			$sqlquery = "SELECT * FROM course_table WHERE category_id = '$cat'";
			$result = $this->queryfunk_help($sqlquery);
			return $result;
			}
	public function relatedcourse($cat){
				$sqlquery = "SELECT * FROM course_table WHERE category_id = '$cat' ";
				$result = $this->queryfunk_help($sqlquery);
				return $result;
				}

		public function videogetall($id){
			$sqlquery = "SELECT * FROM video_table WHERE course_id = '$id'";
		$result = $this->queryfunk_help($sqlquery);
		return $result;
		}
	/*	public function titleview($id){
			$sqlquery = "SELECT * FROM  course_table WHERE course_id = '$id'";
		$result = $this->queryfunk_help($sqlquery);
		return $result;
		}*/
		public function enrolestudentcount($id){
					$sqlquery = "SELECT * FROM enrole_student_list WHERE course_id = '$id'";
				$result = $this->queryfunk_help($sqlquery);
				if ($result==NULL) {
					return 0;
				}else{
				$result = mysqli_num_rows($result);
				return $result;
				}
				
				}
		public function coursecount($id){
					$sqlquery = "SELECT * FROM course_table WHERE category_id = '$id'";
				$result = $this->queryfunk_help($sqlquery);
				if ($result==NULL) {
					return 0;
				}else{
				$result = mysqli_num_rows($result);
				return $result;
				}
				
				}
		public function logincheck($table_name,$email,$pass,$mail,$ps,$link){

				$mail = mysqli_real_escape_string($this->db,$mail);
				$ps = mysqli_real_escape_string($this->db,$ps);
					$sqlquery = "SELECT * FROM $table_name WHERE $email = '$mail' AND $pass ='$ps'";
				$result = $this->queryfunk_help($sqlquery);
				$value = mysqli_fetch_array($result);
			
					if (mysqli_num_rows($result)>0) {
						$_SESSION['true'] = true;
						$_SESSION['name']=$value['student_name'];
						$_SESSION['student_id']=$value['student_id'];
				 
						echo "<script> window.location = '$link';</script>";					}
				
				
				
				
				}



public function logincheckteacher($table_name,$email,$pass,$mail,$ps,$link){
			
				$mail = mysqli_real_escape_string($this->db,$mail);
				$ps = mysqli_real_escape_string($this->db,$ps);
					$sqlquery = "SELECT * FROM $table_name WHERE $email = '$mail' AND $pass ='$ps'";
				$result = $this->queryfunk_help($sqlquery);
				$value = mysqli_fetch_array($result);
			
					if (mysqli_num_rows($result)>0) {
						$_SESSION['true'] = true;
						$_SESSION['teacher_auth'] = 'teacher_auth';
					 
						$_SESSION['name']=$value['teacher_name'];
						$_SESSION['student_id']=$value['teacher_id'];

					
							
						
							echo "<script> window.location = '$link';</script>";

						
						//echo "<script> window.location = '$link';</script>";					
					}
				
				
				
				
				}


		public function coursecatjoin($id){
			$sqlquery = "SELECT * FROM course_table LEFT JOIN category_table ON course_table.category_id = category_table.category_id WHERE course_id = $id";
			$result = $this->queryfunk_help($sqlquery);
			return $result;
		}
		public function viewcommentbyid($id){
					$sqlquery = "SELECT * FROM comment_table LEFT JOIN student_table ON comment_table.student_id = student_table.student_id WHERE course_id = $id";
					$result = $this->queryfunk_help($sqlquery);
					return $result;
				}
		public function viewreplayid($id){
							$sqlquery = "SELECT * FROM replay_table LEFT JOIN teacher_table ON replay_table.teacher_id = teacher_table.teacher_id WHERE comment_id = $id";
							$result = $this->queryfunk_help($sqlquery);
							return $result;
						}

		public function allcoursesenroll($id){
					$sqlquery = "SELECT * FROM course_table LEFT JOIN enrole_student_list ON course_table.course_id = enrole_student_list.course_id WHERE student_id = $id";
					$result = $this->queryfunk($sqlquery);
					return $result;
				}



	
}
 ?>