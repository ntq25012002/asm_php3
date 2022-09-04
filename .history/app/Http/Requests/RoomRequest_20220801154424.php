<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoomRequest extends FormRequest
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
                            'room_type_id' => 'required',
                            // 'air_condition' => 'required',
                            'area' => 'required',
                            'phone' => 'required|regex:/(0)[0-9]{9}/',
                            'price' => 'required|numeric',
                            'status' => 'required',
                            'content' => 'required',
                            'feature_image' => 'required|mimes:jpeg,jpg,png,gif',
                            // 'images' => 'required|mimes:jpeg,jpg,png,gif',
                        ];
                        break;
                    case 'update':
                        $rules = [
                            'name' => 'required',
                            'room_type_id' => 'required',
                            // 'air_condition' => 'required',
                            'area' => 'required',
                            'phone' => 'required|regex:/(0)[0-9]{9}/',
                            'price' => 'required|numeric',
                            'status' => 'required',
                            'content' => 'required',
                            'feature_image' => 'required|mimes:jpeg,jpg,png,gif',
                            // 'images' => 'required|mimes:jpeg,jpg,png,gif',
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
            'name.required' => 'Bắt buộc nhập tên phòng',
            'room_type_id.required' => 'Bắt buộc chọn loại phòng',
            // 'air_condition.required' => 'Bắt buộc chọn',
            'area.required' => 'Bắt buộc nhập diện tích phòng',
            'phone.required' => 'Bắt buộc nhập số điện thoại',
            'phone.regex:/(0)[0-9]{9}/' => 'Định dạng số điện thoại chưa đúng',
            'price.required' => 'Bắt buộc nhập giá phòng',
            'price.numeric' => 'Dữ liệu nhập vào phải là 1 số',
            'status.required' => 'Bắt buộc chọn trạng thái phòng',
            'content.required' => 'Bắt buộc nhập mô tả',
            'feature_image.required' => 'Bắt buộc chọn ảnh đại diện phòng',
            'feature_image.mimes:jpeg,jpg,png,gif' => 'Chỉ hỗ trợ tải lên ảnh có định dạng :mimes',
        ];
    }
}
