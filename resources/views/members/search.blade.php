@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="form-group">
        <input type="text" class="form-control" id="search" name="search"></input>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Firstname</th>
                <th>Surname</th>
                <th>Membertype</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
<script type="text/javascript">
$('#search').on('keyup',function(){
    $value=$(this).val();
    $.ajax({
        type : 'get',
        url : '{{route('member.search')}}',
        data:{'search':$value},
        success:function(data){
            $('tbody').html(data);
        }
    });
})
</script>
<script type="text/javascript">
    $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
</script>
@endsection