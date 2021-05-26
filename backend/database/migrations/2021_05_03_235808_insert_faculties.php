<?php

use App\Models\Department;
use App\Models\Faculty;
use Illuminate\Database\Migrations\Migration;

class InsertFaculties extends Migration
{
    private $faculties = [
        'Економічний факультет' => [
            'Кафедра економіки підприємств',
            'Кафедра економічної теорії та підприємництва',
            'Кафедра інноватики та управління',
            'Кафедра маркетингу та бізнес-адміністрування',
            'Кафедра обліку і аудиту',
            'Кафедра транспортного менеджменту і логістики',
            'Кафедра фінансів і банківської справи',
        ],
        'Енергетичний факультет' => [
            'Електроенергетичні комплекси та системи',
            'Кафедра охорони праці й навколишнього середовища',
            'Кафедра промислових теплоенергетичних установок і теплопостачання',
            'Системи автоматизації та електроприводу',
        ],
        'Металургійний факультет' => [
            'Кафедра матеріалознавства та перспективних технологій',
            'Кафедра металургія чорних металів',
            'Кафедра обробки металів тиском',
            'Кафедра теорії металургійних процесів і ливарного виробництва',
            'Кафедра хімічної технології і інженерії',
        ],
        'Соціально-гуманітарний факультет' => [
            'Кафедра перекладу',
            'Кафедра соціології та соціальної роботи',
            'Кафедра туризму',
            'Кафедра української мови та слов’янської філології',
            'Кафедра фізичного виховання і спорту',
            'Кафедра філософських наук та історії України',
        ],
        'Факультет інженерної та мовної підготовки' => [
            'Кафедра гуманітарних дисциплін і мовної підготовки іноземних громадян',
            'Кафедра загальноосвітніх дисциплін',
            'Кафедра іноземних мов',
        ],
        'Факультет інформаційних технологій' => [
            'Кафедра автоматизації і комп’ютерних технологій',
            'Кафедра біомедичної інженерії',
            'Кафедра вищої та прикладної математики',
            'Кафедра інформатики',
            'Кафедра комп’ютерних наук',
            'Кафедра фізики',
        ],
        'Факультет машинобудування та зварювання' => [
            'Кафедра «Архітектура»',
            'Кафедра автоматизації та механізації зварювального виробництва',
            'Кафедра металургії і технології зварювального виробництва',
            'Кафедра механічного обладнання заводів чорної металургії',
            'Кафедра наноінженерії у галузевому машинобудуванні',
            'Кафедра підйомно-транспортних машин і деталей машин',
            'Кафедра технології машинобудування',
        ],
        'Факультет транспортних технологій' => [
            'Кафедра автомобільного транспорту',
            'Кафедра технології міжнародних перевезень і логістики',
            'Кафедра транспортних технологій підприємств',
        ],
    ];

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        foreach ($this->faculties as $faculty => $departments) {
            $facultyInstance = Faculty::create([
                'name' => $faculty
            ]);

            foreach ($departments as $department) {
                Department::create([
                    'name' => $department,
                    'faculty_id' => $facultyInstance->id,
                ]);
            }
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Faculty::whereId('name', array_keys($this->faculties))->delete();
    }
}
