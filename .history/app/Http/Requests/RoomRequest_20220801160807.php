<?php

namespace App\Http\Requests;
use Illuminate\Http\Request;

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
    public function rules(Request $request)
    {
        $rules = [];
        $currentAction = $this->route()->getActionMethod(); // Trả về tên hàm thực hiện validate
        // dd($currentAction);
        switch ($this->method()) {
            case 'POST':
                switch ($currentAction) {
                    case 'store':
                        $rules = [
                            'name' => 'required|unique:rooms,name',
                            'room_type_id' => 'required',
                            // 'air_condition' => 'required',
                            'area' => 'required',
                            'phone_number' => 'required|regex:/(0)[0-9]{9}/',
                            'price' => 'required|numeric',
                            'status' => 'required',
                            'content' => 'required',
                            'feature_image' => 'required|mimes:jpeg,jpg,png,gif',
                            // 'images' => 'required|mimes:jpeg,jpg,png,gif',
                        ];
                        break;
                    case 'update':
                        $id = $request->id;
                        $rules = [
                            'name' => 'required|unique:rooms,name,'.$id,
                            'room_type_id' => 'required',
                            // 'air_condition' => 'required',
                            'area' => 'required|numeric',
                            'phone_number' => 'required|max:10|regex:/(0)[0-9]{9}/',
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
            'name.unique' => 'Phòng đã tồn tại',
            'room_type_id.required' => 'Bắt buộc chọn loại phòng',
            // 'air_condition.required' => 'Bắt buộc chọn',
            'area.required' => 'Bắt buộc nhập diện tích phòng',
            'area.numeric' => 'Dữ liệu nhập vào phải là 1 số',
            'phone_number.required' => 'Bắt buộc nhập số điện thoại',
            'phone_number.regex' => 'Định dạng số điện thoại chưa đúng',
            'phone_number.max' => 'Số điện thoại chỉ có :max chữ số',
            'price.required' => 'Bắt buộc nhập giá phòng',
            'price.numeric' => 'Dữ liệu nhập vào phải là 1 số',
            'status.required' => 'Bắt buộc chọn trạng thái phòng',
            'content.required' => 'Bắt buộc nhập mô tả',
            'feature_image.required' => 'Bắt buộc chọn ảnh đại diện phòng',
            'feature_image.mimes:jpeg,jpg,png,gif' => 'Chỉ hỗ trợ tải lên ảnh có định dạng :mimes',
        ];
    }
}
