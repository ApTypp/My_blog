<?php

class Validator {

    public $errorMessage;

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
            $this->errorMessage .= $key.' is empty.<br />';
            return false;
        }
//        echo 'required good <br />';
        return true;
    }

    protected function validate_alpha_numeric($key, $value){
        if (!ctype_alnum($value)){
            $key = ucfirst($key);
            $this->errorMessage .= $key.' must contain only alpha-numeric characters.<br />';
            return false;
        }
//        echo 'alpha_numeric good <br />';
        return true;
    }

    protected function validate_max_len($key, $value,$parameter){
        if (mb_strlen($value)>$parameter){
            $this->errorMessage .= 'Maximum length of '.$key.' must be less or equal to '.$parameter.' characters.<br />';
            return false;
        }
//        echo 'max len is good <br />';
        return true;
    }

    protected function validate_min_len($key,$value,$parameter){
        if (mb_strlen($value)<$parameter){
            $this->errorMessage .= 'Minimum length of '.$key.' must be more or equal to '.$parameter.' characters.<br />';
            return false;
        }
//        echo 'min len is good';
        return true;
    }

    public function isValid (array $data, array $rules) {
        if (empty($rules)){
            $rules = $this->rules;
        }
        foreach ($data as $key=>$value){
            foreach ($rules as $key1=>$value1){
                if ($key === $key1){
//                    echo 'Smth finded: '.$key.'<br />';
                    $rulesList = $this->splitRules($value1);
                    foreach ($rulesList as $rule){
                        if (preg_match('/,/',$rule)){
                            $rule = $this->splitRulesByComma($rule);
                            $method = 'validate_'.$rule[0];
                            $this->$method($key,$value,$rule[1]);
                        } else {
                            $method = 'validate_'.$rule;
                            $this->$method($key,$value);
                        }

                    }
                }
            }
        }
        if (isset($this->errorMessage)){
//            echo $this->errorMessage;
            return false;
        }
        
        return true;
    }

}
$validate = new Validator();
//$validate->isValid(array('username' => 'asss', 'password' => 'asdss%')); TEST
?>