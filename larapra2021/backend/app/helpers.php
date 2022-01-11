<?php

if (!function_exists('generateStudentCode')) {
    /**
     * Generate Codes for student.
     *
     * @return mixed
     */
    function generateStudentCode()
    {
        return app()->make(\App\Helpers\Student\CodeGenerator::class)->generateStudentCode();
    }
}
