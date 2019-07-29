<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>라라벨 입문</title>
    @yield('style')
</head>
<body>

    @yield('content') {{-- 상속받는 자식이 가진 content라고 이름 붙인 섹션을 여기에 출력한다는 의미 --}}

</body>
    @yield('script')
</html>