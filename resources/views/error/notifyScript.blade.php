@if (Session::has('success'))
<script>
    $.notify("{{ Session::get('success') }}","success");
</script>
@endif