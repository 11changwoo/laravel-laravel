<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticlesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    //사용자가 이 폼 리퀘스트를 주입받는 메서드에 접근할 권한이 있는지를 검사하여 서비스를 보호하는 일을 한다.
    public function authorize()
    {
//        return false;
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    //유효성 검사 규칙을 정의한다.
    public function rules()
    {
        return [
            //
            'title' => ['required'],
            'content' => ['required', 'min:10'],
        ];
    }

    //사용자 정의 유효성 검사 오류 메시지를 정의한다.
    //:attribute 라는 특수한 자리 표시자를 이용하고 있다.
    public function messages()
    {
        return [
            'required' => ':attribute은(는) 필수 입력 항목이다.',
            'min' => ':attribute은(는) 최소 :min 글자 이상이 필요합니다.',
        ];
    }

    //오류 메시지에 표시할 필드 이름을 사용자 친화적인 이름으로 바꿀 수 있다.
    //이 메서드가 없다면 'title은(는) 필수 입력 항목입니다.' 로 오류 메시지가 표시된다.
    public function attributes()
    {
        return [
            'title' => '제목',
            'content' => '본문',
        ];
    }
}
