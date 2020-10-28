<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
class TeachingInspectionInfo extends Model
{
    protected $table = "teaching_inspection_info";
    public $timestamps = true;
    protected $guarded = [];
    /**
     * 安全检查情况
     * @author yuanshuxin <github.com/CoderYsx>
     * @return \Illuminate\Http\JsonResponse
     */
    public static function ysx_safecheck(){

        try {
            $res = DB::table('teaching_inspection_info')
                ->join('laboratory', 'laboratory.laboratory_id', '=', 'teaching_inspection_info.laboratory_id')
                ->select('laboratory.laboratory_name')->get();
            return $res;
        } catch (\Exception $e) {
            logError('失败',[$e->getMessage()]);
            return null;
        }

    }

    /**
     * 数量统计
     * @author yuanshuxin <github.com/CoderYsx>
     * @return \Illuminate\Http\JsonResponse
     */
    public static function ysx_checkcount(){
        try {
            $res = DB::table('chview')->get();
            return $res;
        } catch (\Exception $e) {
            logError('失败',[$e->getMessage()]);
            return null;
        }
    }

    /**
     * 检查统计
     * @author yuanshuxin <github.com/CoderYsx>
     * @return \Illuminate\Http\JsonResponse
     */
    public static function ysx_checkStatistics(){
        try {
            $res = DB::table('chstatistics')->get();
            return $res;
        } catch (\Exception $e) {
            logError('失败',[$e->getMessage()]);
            return null;
        }
    }

}
