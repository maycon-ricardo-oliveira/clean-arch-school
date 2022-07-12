<?php

namespace Arch\School\Academic\Infra\Student;

use Arch\School\Academic\Domain\Cpf;
use Arch\School\Academic\Domain\Student\Phone;
use Arch\School\Academic\Domain\Student\Student;
use Arch\School\Academic\Domain\Student\StudentRepository;
use PDO;

class StudentRepositoryPdo implements StudentRepository
{

    private PDO $conection;

    public function __construct(PDO $conection)
    {
        $this->conection = $conection;
    }

    public function add(Student $student): void
    {
        $sql = 'INSERT INTO students VALUES (:cpf, :name, :email)';
        $stmt = $this->conection->prepare($sql);
        $stmt->bindValue('cpf', $student->cpf());
        $stmt->bindValue('name', $student->name());
        $stmt->bindValue('email', $student->email());
        $stmt->execute();

        $sql = 'INSERT INTO phones VALUES (:ddd, :number, :student_cpf)';
        $stmt = $this->conection->prepare($sql);
        $stmt->bindValue('student_cpf', $student->cpf());

        /** @var Phone $phone */
        foreach ($student->phones() as $phone) {
            $stmt->bindValue('ddd', $phone->ddd());
            $stmt->bindValue('number', $phone->number());
            $stmt->execute();
        }

    }

    public function findByCpf(Cpf $cpf): Student
    {
        $sql = "SELECT cpf, name, email, ddd, number as phone_number 
                FROM students  
                LEFT JOIN phones ON phones.student_cpf = students.cpf
                WHERE students.cpf = ?";

        $stmt = $this->conection->prepare($sql);
        $stmt->bindValue(1, (string) $cpf);
        $stmt->execute();

        $studentData = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        if (count($studentData) === 0) {
            throw new StudentNotFound($cpf);
        }

        return $this->serializeStudent($studentData);
    }

    public function getAll(): array
    {
        $sql = "SELECT cpf, name, email, ddd, number as phone_number 
                FROM students  
                LEFT JOIN phones ON phones.student_cpf = students.cpf";

        $stmt = $this->conection->query($sql);
        $studentsList = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        $students = [];

        foreach ($studentsList as $studentData) {
            if (!array_key_exists($studentData['cpf'], $studentData)) {
                $students[$studentData['cpf']] = Student::withCpfNameEmail(
                    $studentData['cpf'],
                    $studentData['name'],
                    $studentData['email']
                );

                $phones = array_filter($studentData, fn($line) => $line['ddd'] !== null && $line['phone_number'] !== null);

                foreach ($phones as $phone) {
                    $students[$studentData['cpf']]->addPhone($phone['ddd'], $phone['phone_number']);
                }

            }
        }

        return array_values($students);
    }

    private function serializeStudent($studentData): Student
    {

        $firstLine = $studentData[0];
        $student = Student::withCpfNameEmail($firstLine['cpf'], $firstLine['name'], $firstLine['email']);
        $phones = array_filter($studentData, fn($line) => $line['ddd'] !== null && $line['phone_number'] !== null);

        foreach ($phones as $phone) {
            $student->addPhone($phone['ddd'], $phone['phone_number']);
        }

        return $student;
    }
}