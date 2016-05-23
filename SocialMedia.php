<?php
/*To use this script simply copy the logo images into the site's images folder, include this script in the body of the main page, and instantiate a member of the class*/
/*Be sure to place the member where you want the mobilized verision of the links to appear*/
namespace SocialMedia;

class SocialMedia{
    public $links = array();
    public $business = NULL;
    public $images_location = NULL;
    public $div_width = NULL;
    private $mobile_cutoff = '800px';
    function __construct($name, $http_images_url, $width=50, $facebook_link=NULL, $instagram_link=NULL, $linkedin_link=NULL, $pinterest=NULL, $twitter_link=NULL, $youtube_link=NULL,$google_plus = NULL) {
        $this->setLink('linkedin',$linkedin_link);
        $this->setLink('pinterest',$pinterest);
        $this->setLink('instagram',$instagram_link);
        $this->setLink('twitter',$twitter_link);
        $this->setLink('youtube',$youtube_link);
        $this->setLink('facebook',$facebook_link);
        $this->setLink('google',$google_plus);
        $this->business = $name;
        $this->images_location = rtrim($http_images_url, '/') . '/';
        $this->width = (int)$width;
    }

    public function setMobileCutoff($value){
      if(is_numeric($value)){$this->mobile_cutoff=$value.'px';}
      else{
        $new_value = (int)$value;
        if($new_value!=0 && $new_value>0){
          $this->mobile_cutoff=$new_value.'px';
        }
      }
    }

    public function updateFacebook($new_link){$this->setLink('facebook',$new_link);}
    public function updateLinkedIn($new_link){$this->setLink('linkedin',$new_link);}
    public function updatePinterest($new_link){$this->setLink('pinterest',$new_link);}
    public function updateInstagram($new_link){$this->setLink('instagram',$new_link);}
    public function updateTwitter($new_link){$this->setLink('twitter',$new_link);}
    public function updateYouTube($new_link){$this->setLink('youtube',$new_link);}
    public function updateGooglePlus($new_link){$this->setLink('google',$new_link);}

    private function setLink($type,$url){
        $this->links[$type] = $url;
    }
    private function printLinks(){
            $output = array();
        foreach($this->links as $key=>$value){
            if(empty($value)){continue;}
            switch(strtolower($key)){
                case 'facebook':
                    $output[0] = '<a href="' .$value.'" target="_blank" id="'.strtolower($key).'">';
                    $output[0] .= '<img src="'.$this->images_location.'fb_icon.jpg" alt="'.$this->business.' on Facebook" title="'.$this->business.' on Facebook" align="center" /></a>';
                    break;
                case 'twitter':
                    $output[3] = '<a href="' .$value.'" target="_blank" id="'.strtolower($key).'">';
                    $output[3] .= '<img src="'.$this->images_location.'Twitter_logo.png" alt="'.$this->business.' on Twitter" title="'.$this->business.' on Twitter" align="center" /></a>';
                    break;
                case 'linkedin':
                    $output[4] = '<a href="' .$value.'" target="_blank" id="'.strtolower($key).'">';
                    $output[4] .= '<img src="'.$this->images_location.'linkedin-icon.png" alt="'.$this->business.' on LinkedIn" title="'.$this->business.' on LinkedIn" align="center" /></a>';
                    break;
                case 'instagram':
                    $output[1] = '<a href="' .$value.'" target="_blank" id="'.strtolower($key).'">';
                    $output[1] .= '<img src="'.$this->images_location.'instagram-glyph-logo.png" alt="'.$this->business.' on Instagram" title="'.$this->business.' on Instagram" align="center" /></a>';
                    break;
                case 'pinterest':
                    $output[2] = '<a href="' .$value.'" target="_blank" id="'.strtolower($key).'">';
                    $output[2] .= '<img src="'.$this->images_location.'pinterest-icon.png" alt="'.$this->business.' on Pinterest" title="'.$this->business.' on Pinterest" align="center" /></a>';
                    break;
                case 'youtube':
                    $output[5] = '<a href="' .$value.'" target="_blank" id="'.strtolower($key).'">';
                    $output[5] .= '<img src="'.$this->images_location.'youtube-icon.jpg" alt="'.$this->business.' on YouTube" title="'.$this->business.' on YouTube" align="center" /></a>';
                    break;
                case 'google':
                    $output[6] = '<a href="' .$value.'" target="_blank" id="'.strtolower($key).'">';
                    $output[6] .= '<img src="'.$this->images_location.'google-plus-icon.png" alt="'.$this->business.' on Google Plus" title="'.$this->business.' on Google Plus" align="center" /></a>';
                    break;
            }
        }
        for($i=0;$i<7;$i++){echo $output[$i];}
    }

    private function printStyles(){
        echo '<style>';
        echo 'div#social_media_buttons a{';
	echo 'display:block;';
	echo 'text-decoration:none;';
	echo 'text-align:center;';
        echo '}';
        echo 'div#social_media_buttons img{';
        echo 'width: '.$this->width.'px;';
        echo 'height:auto;}';
        echo 'div#social_media_buttons a#instagram{';
      	echo 'width:100%;';
      	echo 'background-color:#FFFFFF;';
      	echo 'padding-top:7px;';
        echo 'padding-bottom:7px;';
        echo '}';
        echo 'div#social_media_buttons a#instagram img{';
        echo 'width:95%;margin:0 auto;';
        echo '}';
        echo 'div#social_media_buttons a#pinterest{';
	//echo '/*background-color:#b51e2e;*/';
	echo 'background-color:#FFFFFF;';
	echo 'width:100%;';
	echo 'padding-top:5px;';
        echo '}';
        echo 'div#social_media_buttons a#linkedin{';
	echo 'background-color:#0977b5;';
	echo 'width:100%;';
	echo 'padding-top:10px;';
        echo '}';
        echo 'div#social_media_buttons a#twitter{';
	echo 'background-color:#55ACEE;';
	echo 'width:100%;';
	echo 'padding-top:5px;';
        echo '}';
        echo 'div#social_media_buttons a#youtube{';
	echo 'background-color:#FFFFFF;';
	echo 'border:1px solid #000000;';
	echo 'padding-top:5px;';
	echo 'text-align:center;';
        echo '}';
        echo 'div#social_media_buttons a#youtube img{';
        echo 'width:38px;';
        echo '}';
        echo 'div#social_media_buttons a#google{';
	echo 'background-color:#dc4e41;';
	echo 'border:1px solid #000000;';
	echo 'padding-top:2px;';
	echo 'text-align:center;';
        echo '}';
        echo '@media all and (min-width : '.$this->mobile_cutoff.') {';
        echo 'div#social_media_buttons{';
	echo 'width:'.$this->width.'px;';
	echo 'position:fixed;';
	echo 'top:15%;';
	echo 'left:0;';
	echo 'z-index:102;';
        echo '}';
        echo '}';/*end of min-width media query*/
        echo '@media all and (max-width : '.$this->mobile_cutoff.') {';
        echo 'div#social_media_buttons{';
	echo 'width:30%;';
        echo 'margin:1em auto;';
        echo '}';
        echo 'div#social_media_buttons a{';
        echo 'margin:1em auto;border:none !important;border-radius:10px;padding:10px;width:90% !important;';
        echo '}';
        echo 'div#social_media_buttons a img{';
        echo 'height:50px !important;width:auto !important;';
        echo '}';
        echo 'div#social_media_buttons a#facebook{';
        echo 'background:#3b5999;';
        echo '}';
        echo '}';/*end of max-width media query*/
        echo '</style>';
    }

    public function printAll(){
        $this->printStyles();
        echo '<div id="social_media_buttons">';
        $this->printLinks();
        echo '</div>';
    }
}
