<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoomTypeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = [];
        $currentAction = $this->route()->getActionMethod(); // Trả về tên hàm thực hiện validate
        // dd($currentAction);
        switch ($this->method()) {
            case 'POST':
                switch ($currentAction) {
                    case 'store':
                        $rules = [
                            'name' => 'required',
                            'adults' => 'required|numeric',
                            'description' => 'required',
                            'image' => 'required',
                            'equipmentIds' => 'required',
                            // 'quantity_equipment' => 'required|numeric'
                        ];
                        break;
                    case 'update':
                        $rules = [
                            'name' => 'required',
                            'adults' => 'required|numeric',
                            'description' => 'required',
                            'equipmentIds' => 'required',
                            // 'quantity_equipments' => 'required|numeric'
                        ];
                        break;
                    default:
                        # code...
                        break;    
                }
                break;
            default:
                # code...
                break;
        }

        return $rules;
    }
    public function messages() {
        return [
            'name.required' => 'Bắt buộc nhập loại phòng',
            'adults.required' => 'Bắt buộc nhập số lượng người lớn',
            'adults.numeric' => 'Dữ liệu nhập vào phải là 1 số',
            'description.required' => 'Bắt buộc nhập mô tả',
            'image.required' => 'Bắt buộc chọn hình ảnh',
            'equipmentIds.required' => 'Bắt buộc chọn loại giường',
            'quantity_equipments.required' => 'Bắt buộc nhập số lượng',
            'quantity_equipments.numeric' => 'Dữ liệu nhập vào phải là 1 số',
        ];
    }
}
