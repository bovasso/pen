@layout('layouts/main')
@section('content')
    <form action="/register/group_code" method="get" accept-charset="utf-8">
        <input type="text" name="groupCode">
        <button type="submit">Continue</button>
    </form>    
@endsection