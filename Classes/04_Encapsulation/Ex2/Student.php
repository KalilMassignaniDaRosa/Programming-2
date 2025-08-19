<?php
Class Student{
    public string $name;
    private int $registration;
    private array $grades;
    private float $average;
    private int $gradeIndex;

    public function __construct(string $name, int $registration){
        $this->name = $name;
        $this->registration = $registration;
        $this->gradeIndex = 0;
        $this->average = 0;
    }

    #region Name
    public function getName(): string{
        return $this->name;
    }

    public function setName(string $name): void{
        $this->name = $name;
    }
    #endregion

    #region Registration
    public function getRegistration(): int{
        return $this->registration;
    }
    
    private function setRegistration(int $registration): void{
        $this->registration = $registration;
    }
    #endregion

    #region Grade
    // retorna todas as notas
    public function getGrades(): array{
        return $this->grades;
    }

    // registra 1 nota
    private function setGrade(int $index,float $grade): void{
        $this->grades[$index] = $grade;
    }

    public function getGradeIndex(): int{
        return $this->gradeIndex;
    }
    private function setGradeIndex(int $index): void{
        $this->gradeIndex = $index;
    }
    #endregion

    #region Average
    private function getAverage():float{
        $this->calculateAverage();
        return $this->average;
    }

    public function setAverage(float $average): void{
        $this->average = $average;
    }
    #endregion

    public function addGrade($grade): void{
        if($grade >= 0 && $grade <= 10){
            $this->setGrade($this->getGradeIndex(), $grade);
            $this->setGradeIndex($this->getGradeIndex()+1);
            echo $grade." added\n";
        }else{
            echo "Error: Grade need to be between 0 and 10!";
        }
    }

    public function calculateAverage():void{
        $total = 0.0;
        foreach($this->getGrades() as $grade){
            $total += $grade;
        }
        $average = ($total/$this->getGradeIndex());
        $this->setAverage($average);
    }

    private function situation():string{
        $average = $this->getAverage();

        if($average >= 7 && $average <= 10){
            return "Approved";
        }elseif($average >= 6){
            return "Final retake";
        }elseif($average >= 0){
            return "Failed";
        }else{
            return "Error!";
        }
    }

    public function displaySituation():void{
        echo "Situation: ".$this->situation()."\n";
    }

    public function displayAverage():void{
        echo "Average: ".$this->getAverage()."\n";
    }
}

$student1 = new Student("Kalil",1110);
$student2 = new Student("Fabiano",2222);


$student1->addGrade(9);
$student1->addGrade(8);
$student1->displayAverage();
$student1->displaySituation();
echo "\n";

$student2->addGrade(4);
$student2->addGrade(2);
$student2->displayAverage();
$student2->displaySituation();