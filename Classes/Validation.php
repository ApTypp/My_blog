<?php

class Validation {

    public $error_message;

    protected $rules = array(
        'username' => 'required|alpha_numeric|max_len,20|min_len,3',
        'password' => 'required|alpha_numeric|max_len,50|min_len,5');

    public function splitRules ($rules){
        $splittedRules = explode('|',$rules);
        return $splittedRules;
    }

    public function splitRulesByComma ($rule){
        $splittedRulesByComma = explode(',',$rule);
        return $splittedRulesByComma;
    }

    protected function validate_required($key,$value){
        if (empty($value)){
            $key = ucfirst($key);
            $this->error_message = $key.' is empty.';
            return false;
        }
//        echo 'required good <br />';
        return true;
    }

    protected function validate_alpha_numeric($key, $value){
        if (!ctype_alnum($value)){
            $key = ucfirst($key);
            $this->error_message = $key.' must contain only alpha-numeric characters.';
            return false;
        }
//        echo 'alpha_numeric good <br />';
        return true;
    }

    protected function validate_max_len($key, $value,$parameter){
        if (mb_strlen($value)>$parameter){
            $this->error_message = 'Maximum length of '.$key.' must be less or equal to '.$parameter.' characters.';
            return false;
        }
//        echo 'max len is good <br />';
        return true;
    }

    protected function validate_min_len($key,$value,$parameter){
        if (mb_strlen($value)<$parameter){
            $this->error_message = 'Minimum length of '.$key.' must be more or equal to '.$parameter.' characters.';
            return false;
        }
//        echo 'min len is good';
        return true;
    }

    public function isValid (array $data) {

        foreach ($data as $key=>$value){
            foreach ($this->rules as $key1=>$value1){
                if ($key === $key1){
//                    echo 'Smth finded: '.$key.'<br />';
                    $rules = $this->splitRules($value1);
                    foreach ($rules as $rule){
                        if (preg_match('/,/',$rule)){
                            $rule = $this->splitRulesByComma($rule);
                            $method = 'validate_'.$rule[0];
                            if (!$this->$method($key,$value,$rule[1])){
//                                echo $this->error_message;
                                return false;
                            }
                        } else {
                            $method = 'validate_'.$rule;
                            if (!$this->$method($key,$value)){
//                                echo $this->error_message;
                                return false;
                            }
                        }

                    }
                }
            }
        }

        return true;
    }

}
$validate = new Validation();
//$validate->isValid(array('username' => 'asss', 'password' => 'asdss%')); TEST
?>