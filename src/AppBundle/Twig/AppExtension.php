<?php 
namespace AppBundle\Twig;

class AppExtension extends \Twig_Extension
{
    public function getFilters()
    {
        return array(            
            new \Twig_SimpleFilter('slugify', array($this, 'slugify')),
            new \Twig_SimpleFilter('format_date', array($this, 'formatDate')),
        	new \Twig_SimpleFilter('md5', array($this, 'md5')),
        	new \Twig_SimpleFilter('wrap', array($this, 'wrap')),
            new \Twig_SimpleFilter('timelaps', array($this, 'timelaps')),
            new \Twig_SimpleFilter('badgeList', array($this, 'badgeList')),
        );
    }
    
    /**
     *
     * @param string $text
     * @return string
     */
    public function badgeList($text)
    {
        
        $badges = explode(",", $text);
        $string = "";
        foreach ($badges as $value) {
            $string.= "<span class='badge badge-success'>$value</span>";
        }
        
        return $string;
    }


    public function getName()
    {
        return 'app_extension';
    }
    
    /**
     * 
     * @param \DateTime $date
     * @return string
     */
    public function formatDate(\DateTime $date) {
                                          
        $format_date = sprintf("%d de %s %s - %s", $date->format("d"), self::getEsMonth($date->format("n")), $date->format("Y"), $date->format("h:i"));
        
        return $format_date;
        
    }
    
    /**
     *
     * @param string $text
     * @return string
     */
    public function slugify($text)
    {
    
        $titleUrl = self::replaceAccents($text);
    
        // trim and lowercase
        $xtext = strtolower(trim($titleUrl, '-'));
    
        return $xtext;
    }
    
    /**
     *
     * @param string $text
     * @param int $quantity
     * @return string
     */
    public function wrap($text, $quantity = 15)
    {        
    
    	// trim and lowercase
    	$xtext = substr($text, 0, $quantity);
    
    	return $xtext;
    }
    
    /**
     *
     * @param string $text
     * @return string
     */
    public function md5($text)
    {        
    	return md5($text);
    }
    
    public static function getEsMonth($month) {
        $months =  array(
            "1" => "Enero",
            "2" => "Febrero",
            "3" => "Marzo",
            "4" => "Abril",
            "5" => "Mayo",
            "6" => "Junio",
            "7" => "Julio",
            "8" => "Agosto",
            "9" => "Septiembre",
            "10" => "Octubre",
            "11" => "Noviembre",
            "12" => "Diciembre"
        );
    
        return ($months[$month]);
    }
    
    public static function getEsMonthAbrv($month) {
        $months =  array(
            "1" => "Ene",
            "2" => "Feb",
            "3" => "Mar",
            "4" => "Abr",
            "5" => "May",
            "6" => "Jun",
            "7" => "Jul",
            "8" => "Ago",
            "9" => "Sep",
            "10" => "Oct",
            "11" => "Nov",
            "12" => "Dic"
        );
    
        return ($months[$month]);
    }
    
    public static function getEsDay($day) {
        $days =  array(
            "1" => "Lunes",
            "2" => "Martes",
            "3" => "Miercoles",
            "4" => "Jueves",
            "5" => "Viernes",
            "6" => "Sabado",
            "7" => "Domingo"
    
        );
    
        return ($days[$day]);
    }
    
    static public function replaceAccents($str) {
        $a = array('�', '�', '�', '�', '�', '�', '�', '�', '�', '�', ' ', ',', '�', '�', '.', '�', '?', '�', ';', '"', '#', '�', '�', ':', '/', '\'');
        $b = array('A', 'E', 'I', 'O', 'U', 'a', 'e', 'i', 'o', 'u', '-', '-', 'n', 'n', '',  '',  '',  '', '',  '',  '',  '',  '',  '-', '-', '-');
        return str_replace($a, $b, $str);
    }
    
    
    
    public function timelaps($get_dinitial, $get_dend ){
        
        
        $timelaps = "";
        $now = new \DateTime();
        if (is_a($get_dinitial, 'DateTime')){
            
            $date_initial = $get_dinitial;
        }else{
            $date_initial = new \DateTime($get_dinitial);
        }
        
        if (is_a($get_dend, 'DateTime')){
            $date_end = $get_dend;
        }else{
            if(strlen($get_dend) <= 0){
                return "Activo" ;
            }
            $date_end = new \DateTime($get_dend);
        }
        
        $since_start = $date_initial->diff($date_end);
        
        $days = $since_start->days;
        $months =  $since_start->m;
        $hours = $since_start->h;
        $minutes = $since_start->i;
        $seconds = $since_start->s;
        
        $str_date = "";
        
        if($months > 1){
            $str_date .= "$months Meses ";
        }elseif($months > 0){
            $str_date .= "$months Mes ";
        }
        
        if($days > 1){
            $str_date .= "$days dias ";
        }elseif($days > 0){
            $str_date = "$days dia ";
        }
        
        if($hours > 0){
            if(strlen($hours) == 1){
                $str_date .= "0";
            }
            $str_date .= "$hours:";
        }else{
            $str_date .= "00:";
        }
        
        if($minutes > 0){
            if(strlen($minutes) == 1){
                $str_date .= "0";
            }
            $str_date .= "$minutes:";
        }else{
            $str_date .= "00:";
        }
        
        if($seconds > 0){
            if(strlen($seconds) == 1){
                $str_date .= "0";
            }
            $str_date .= "$seconds";
        }else{
            $str_date .= "00";
        }
        
        
        
        return $str_date ;
    }
}

?>