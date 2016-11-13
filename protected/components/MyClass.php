
class MyClass extends CApplicationComponent {

    //private $imgHost ="http://m.maplecity.com.cn/";
	private $imgHost ="http://ca.maplecity.com.cn/";
	
	private $TREB_IMG_HOST = "http://1546690846.rsc.cdn77.org/treb/";//CDN Treb Large Image URL
	private $TREB_TN_HOST = "http://1546690846.rsc.cdn77.org/trebtn/"; //CDN Treb Thumbnail
	private $TREB_MID_HOST = "http://1546690846.rsc.cdn77.org/trebmid/";//CDN Treb Medium Image URL
	//private $CREA_IMG_HOST = "http://ca.maplecity.com.cn/mlspic/crea/";//CDN CREA Large Image URL
	//private $CREA_TN_HOST = "http://ca.maplecity.com.cn/mlspic/crea/creamtn/";//CDN CREA Thumbnail
	//private $CREA_MID_HOST = "http://ca.maplecity.com.cn/mlspic/crea/creamid/"; //CDN CREA Medium Image 
	
	private $CREA_IMG_HOST = "http://creac.citym.ca/";//CDN CREA Large Image URL
	private $CREA_TN_HOST = "http://creac.citym.ca/creamtn/";//CDN CREA Thumbnail
	private $CREA_MID_HOST = "http://creac.citym.ca/creamid/"; //CDN CREA Medium Image 
	
    private $MAPLEAPP_SPA_SECRET = "Wg1qczn2IKXHEfzOCtqFbFCwKhu-kkqiAKlBRx_7VotguYFnKOWZMJEuDVQMXVnG";
    private $MAPLEAPP_SPA_AUD = ['9fNpEj70wvf86dv5DeXPijTnkLVX5QZi'];
    private $PROFILE_FAVLIST_MAX = 20;
    private $PROFILE_CENTER_MAX = 10;
	private $STR_MEMBER_ONLY = '登录用户可见';
	private $IMG_ZANWU = 'static/images/zanwu.jpg';
	private $IMG_MEMBER = 'static/images/memberonly.jpg';
 
 public function get_my_info() {
 
 }

public	function getPicture($county,$ml_num,$src,$fullList,$pic_num){
			
			$county = preg_replace('/\s+/', '', $county);
			$county = str_replace("&","",$county);
			$dir="mlspic/crea/creamid/".$county."/Photo".$ml_num."/";
			$dirtn="mlspic/crea/creatn/".$county."/Photo".$ml_num."/";
			$num_files = 0;
			
			//Return CDN and non-CDN thumbnail and medium picture
			if ( $fullList == 0){
				if ( $pic_num > 0) { //Treb picture meta data is updated after 2016/10/29
				
					$p1 = $this->TREB_MID_HOST."Photo".$ml_num."/Photo".$ml_num."-1.jpeg";
					$p2 = $this->CREA_MID_HOST.$county."/Photo".$ml_num."/Photo".$ml_num."-1.jpg";
					$picList['CdnCoverImg'] = ($src != "CREA")? $p1: $p2;
					
					$p3 = $this->TREB_TN_HOST."Photo".$ml_num."/Photo".$ml_num."-1.jpeg";
					$p4 = $this->CREA_TN_HOST.$county."/Photo".$ml_num."/Photo".$ml_num."-1.jpg";
					$picList['CdnCoverImgtn'] = ($src != "CREA")? $p3: $p4;
				
				} else {  //fall back to scan dir if num = 0
					if(is_dir($dir)){
						$picfiles =  scandir($dir);
						$num_files = count(scandir($dir))-2;
					}
				

					if ( $num_files > 0)    {
						$picList['CoverImg'] = $dir.$picfiles[2];
						$picList['CoverImgtn'] = $dirtn.$picfiles[2];
						//CDN FULL URL
						$p1 = $this->TREB_MID_HOST."Photo".$ml_num."/"."Photo".$ml_num."-1.jpeg";
						$p2 = $this->CREA_MID_HOST.$county."/Photo".$ml_num."/".$picfiles[2];
						$picList['CdnCoverImg'] = ($src != "CREA")? $p1: $p2;
						
						$p3 = $this->TREB_TN_HOST."Photo".$ml_num."/"."Photo".$ml_num."-1.jpeg";
						$p4 = $this->CREA_TN_HOST.$county."/Photo".$ml_num."/".$picfiles[2];
						$picList['CdnCoverImgtn'] = ($src != "CREA")? $p3: $p4;
					
						
					}else {
						
						//CDN FULL URL
						 $picList['CdnCoverImg'] = $this->imgHost.$this->IMG_ZANWU;
						 $picList['CdnCoverImgtn'] = $this->imgHost.$this->IMG_ZANWU;
					}
					/*
					$picList['CoverImg'] = $this->maskVOW($src,$picList['CoverImg'],$this->IMG_MEMBER);
					$picList['CoverImgtn'] = $this->maskVOW($src,$picList['CoverImgtn'],$this->IMG_MEMBER);
					$picList['CdnCoverImg'] = $this->maskVOW($src,$picList['CdnCoverImg'],$this->imgHost.$this->IMG_MEMBER);
					$picList['CdnCoverImgtn'] = $this->maskVOW($src,$picList['CdnCoverImgtn'],$this->imgHost.$this->IMG_MEMBER);
					*/
				}
			}
			
			//Return CDN and non-CDN full picture list
			if ( $fullList == 1){
				if ( $pic_num > 0) { //Treb picture meta data is updated after 2016/10/29
					for ($x = 1; $x <= $pic_num; $x++) {
						
						$p1 = $this->TREB_IMG_HOST."Photo".$ml_num."/"."Photo".$ml_num."-".$x.".jpeg";
						$p2 = $this->CREA_IMG_HOST.$county."/Photo".$ml_num."/"."Photo".$ml_num."-".$x.".jpg";
						$p3 = "Photo".$ml_num."/"."Photo".$ml_num."-".$x.".jpeg"; 
						$p4 = $county."/Photo".$ml_num."/"."Photo".$ml_num."-".$x.".jpg"; 
						$cdn_photos[] = ($src != "CREA")? $p1: $p2;
						$photos[] = ($src != "CREA")? $p3: $p4; //backward compatible with 0.0.6. No prefix host
					}
				} else {
					$rdir=$county."/Photo".$ml_num."/";
					$dir="mlspic/crea/".$rdir;
					$photos = array();
					$cdn_photos = array();
					if (is_dir($dir)){
						$picfiles =  scandir($dir);
						$num_files = count($picfiles)-2;
						if ( $num_files > 0)    {
							for ($x = 2; $x <= $num_files + 1; $x++) {
								$fileIndex = $x - 1;
								$p1 = $this->TREB_IMG_HOST."Photo".$ml_num."/"."Photo".$ml_num."-".$fileIndex.".jpeg";
								$p2 = $this->CREA_IMG_HOST.$county."/Photo".$ml_num."/".$picfiles[$x];
								$cdn_photos[] = ($src != "CREA")? $p1: $p2;
							
								$photos[] = $rdir.$picfiles[$x];
							}    
						}
					
					}
			
				} 

				if ( count($photos) == 0 ) {
					$photos = array($this->IMG_ZANWU);
					$cdn_photos = array($this->imgHost.$this->IMG_ZANWU);
				}
				
				$picList['photos'] = $photos;
				$picList['cdn_photos'] = $cdn_photos;
						
			}
			
		
			return $picList;
			

	}
	
 
}
