<?php
namespace app\Helpers;

class Helper{

    public static function Idgeneratore($model, $trow, $lenght = 4, $prefix){
        
        $data = $model::orderBy('id','desc')->first();
       
        if(!$data){
            $og_lenght = $lenght;
            $last_number = ''; 
        } else {
            $code = substr($data->$trow, strlen($prefix)+1);
            $actual_last_number = ($code/1)*1;
            $increment_last_number = $actual_last_number+1;
            $last_number_lenght = strlen($increment_last_number);
            $og_lenght = $lenght - $last_number_lenght;
            $last_number = $increment_last_number;
        }

        $zeros = "";
        for($i=0; $i<$og_lenght; $i++){
            $zeros.="0";
        }

        return $prefix.'-'. $zeros.$last_number;
    }
}

?>