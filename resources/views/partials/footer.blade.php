{{--조각 뷰--}}
{{--조각 뷰는 자식 뷰와 달리 @extends 키워드가 없는 순수 HTML 조각이다--}}
<footer>
    <p>저는 꼬리말입니다. 다른 뷰에서 저를 입양해 가요.</p>
</footer>

{{--@parent 위치가 script 태그 위에면 먼저 선언한 script > 현재 script 순으로 출력--}}
{{--@parent 위치가 script 태그 아래면 현재 script > 먼저 선언한 script 순으로 출력--}}
@section('script')
    <script>
        alert("저는 조각 뷰의 'script' 섹션입니다.")
    </script>
    @parent
@endsection