<?php

class ExcelHelper {
    
    public function fillZero($value) {
        if ($value <= 0)
            return 0
        return $value;
    }

    public function createSumField($sheet, $id, $rowcount) {
        $sheet->SetCellValue($id . $rowcount, '=SUM(' . $id . '1:' . $id . '' . ($rowcount - 1) . ')');
    }
}
