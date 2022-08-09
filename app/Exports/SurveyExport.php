<?php

namespace App\Exports;

use App\Survey;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class SurveyExport implements FromCollection, WithHeadings, WithMapping
{
    public $surveys;

    public function __construct($surveys)
    {
        $this->surveys = $surveys;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return $this->surveys;
    }

    public function map($survey): array
    {
        return [
            ($survey->shop && $survey->shop->name) ? $survey->shop->name : '-',
            ($survey->shop_code) ? $survey->shop_code : '-',
            ($survey->shop && $survey->shop->state) ? $survey->shop->state : '-',
            ($survey->shop && $survey->shop->city) ? $survey->shop->city : '-',
            ($survey->shop && $survey->shop->zone) ? $survey->shop->zone : '-',
            jdate('Y/m/d -- H:i:s', strtotime($survey->created_at)),
            $survey->mobile,
            $survey->point,
            implode(", ", $survey->arrStrengths),
            implode(", ", $survey->arrWeaknesses),
            $survey->comment
        ];
    }

    public function headings(): array
    {
        return [
            'فروشگاه',
            'کد فروشگاه',
            'استان',
            'شهر',
            'منطقه',
            'زمان ثبت',
            'شما رای دهنده',
            'امتیاز',
            'نقاط قوت',
            'نقاط ضعف',
            'نظر',
        ];
    }

}
