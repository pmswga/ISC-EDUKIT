<?php
    
    class CEnum
    {
        private $values;
        
        function CEnum(...$params)
        {
            foreach($params as $val) $this->values[] .= $val;
        }
        
        public function At($i)
        {
            return $this->values[$i];
        }
    }

?>