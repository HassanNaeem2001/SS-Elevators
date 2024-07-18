<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class quotation extends Model
{
    use HasFactory;
    protected $fillable = [
        'client_name', // Add any other fields here that you want to allow for mass assignment
        'client_address',
        'elevator_type',
        'elevator_detail',
        'elevator_doc_title',
        'electrical_instruments',
        'electrical_quantity',
        'electrical_price',
        'mechanical_instruments',
        'mechanical_quantity',
        'mechanical_price',
        'no_of_elevator_structure',
        'elevator_s_details',
        'elevator_s_quantity',
        'elevator_s_price',
        'delivery_time',
        'delivery_unit',
        'completion_time',
        'completion_unit',
        'installation_charges',
        'total_bill',
        'quotation_no',
    ];
}
