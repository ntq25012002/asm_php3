<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EquipmentRequest extends FormRequest
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
        // $id = $this->getId();
        // dd($currentAction);
        switch ($this->method()) {
            case 'POST':
                switch ($currentAction) {
                    case 'store':
                        $rules = [
                            'name' => 'required',
                            'description' => 'required',
                            'image' => 'required|mimes:jpeg,jpg,png,gif|max:1000',
                        ];
                        break;
                    case 'update':
                        $rules = [
                            'name' => 'required',
                            'description' => 'required',
                            'image' => 'required|mimes:jpeg,jpg,png,gif',
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
            'name.required' => 'Bắt buộc nhập tên thiết bị',
            'description.required' => 'Bắt buộc nhập mô tả',
            'image.required' => 'Bắt buộc chọn hình ảnh',
            'image.mimes' => 'Định dạng hình ảnh chưa đúng',
            
        ];
    }
}
