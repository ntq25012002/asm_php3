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
                            'title' => 'required',
                            'description' => 'required',
                            'file' => 'required|mimes:jpeg,jpg,png,gif',
                        ];
                        break;
                    case 'update':
                        $rules = [
                            'title' => 'required',
                            'description' => 'required',
                            'file' => 'mimes:jpeg,jpg,png,gif',
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
            'title.required' => 'Bắt buộc nhập tên thiết bị',
            'description.required' => 'Bắt buộc nhập mô tả',
            'file.required' => 'Bắt buộc chọn hình ảnh',
            'file.mimes' => 'Định dạng hình ảnh chưa đúng',
        ];
    }
}
