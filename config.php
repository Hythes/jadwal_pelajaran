<?php 
/**
 * 
 */
error_reporting(0);
class Jadwal{
	function query($data){
		$local = "localhost";
		$id = "root";
		$pass = "mysql";
		$db = "sekolah";
		$conn = mysqli_connect($local,$id,$pass,$db);
		return mysqli_query($conn,$data);
	}
	function pr(){
		$woa = array();
		$w = $this->query("SELECT * FROM pr");
		while($ulg = mysqli_fetch_assoc($w)){
			array_push($woa, $ulg);
		}
		return $woa;
	}
	function ulg(){
		$resp = array();
		$q = $this->query("SELECT * FROM ulangan");
		while($pr = mysqli_fetch_assoc($q)){
			array_push($resp,$pr);
		}
		return $resp;
	}
	function jadwal(){
		$resp = array();
		$q = $this->query("SELECT * FROM jadwal");
		while($pr = mysqli_fetch_assoc($q)){
			array_push($resp, $pr);
		}
		return $resp;
	}
	//----------------------------------------//
	var $dayId = array("senin","selasa","rabu","kamis","jumat","sabtu","minggu");
	var $dayEn = array("monday","tuesday",'wednesday','thursday','friday','saturday','sunday');
	//----------------------------------------//
	function dayEngToInd($data){
		for($i;$i<=7;$i++){
			if($data == $this->dayEn[$i]){
				$data = $this->dayId[$i];
			}
		}
		return $data;
	}
	function tomorrow($slug){
		for ($i=0; $i <=7 ; $i++) { 
			if($slug == $this->dayId[$i]){
				$slug = $this->dayId[$i++];
			}
		}
		return $slug;
	}
	function guru(){
		$response = array();
		$wa = $this->query("SELECT * FROM guru");
		while($aw = mysqli_fetch_assoc($wa)){
			array_push($response,$aw);
		}
		return $response;
	}
	function realJamToJamSekolah($data){
		$slug = intval(str_replace(".", "", $data));
		for ($i=599; $i <=900 ; $i++) { 
			if($slug >= 600){
				$show = "jam_1";
				if($slug >=700){
					$show = "jam_2";
					if($slug >=800){
						$show = "jam_3";
						if($slug >=900){
							$show = "jam_4";
						}
					}
				}
			}
		}
		return $show;
	}
	function hourToInt($slug){
		$re = explode("_",$slug);
		return intval($re[1]);
	}
	function intToHour($data){
		$show = "jam_".$data;
		return strval($show);
	}
}
 ?>