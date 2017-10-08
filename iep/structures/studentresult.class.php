<?php
    declare(strict_types = 1);
    namespace IEP\Structures;

    /*!

    */

    class StudentResult
    {
        private $student;
        private $answers;
        private $mark;
        private $date;

        public function __construct($student, array $answers, int $mark, string $date)
        {
            $this->student = $student;
            $this->answers = $answers;
            $this->mark = $mark;
            $this->date = $date;
        }

        public function student()
        {
            return $this->student;
        }
        
        public function answers() : array
        {
            return $this->answers;
        }

        public function mark() : int
        {
            return $this->mark;
        }

        public function date() : string
        {
            return $this->date;
        }

    }


?>