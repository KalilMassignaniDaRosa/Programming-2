<?php
class Student{
    public string $name;
    public float $average;

    public function __construct(string $name,$average){
        $this->name = $name;
        $this->average = $average;
    }

    public function verifyApprove():bool {
        return $this->average >= 7 ? true : false;
    }

    public function returnSituation(bool $situation): string{
        return $situation ?"Approved":"Failed";
    }
}

$s1 = new Student("Arthur", 8.5);
$s2 = new Student("Flávia",5);

echo "Student: ". $s1->name ."\nSituation: ".$s1->returnSituation($s1->verifyApprove())."\n";
echo "Student: ". $s2->name ."\nSituation: ".$s2->returnSituation($s2->verifyApprove())."\n";
