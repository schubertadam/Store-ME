<form action="{{ $action }}" method="{{ $method ?? 'post' }}">
    @csrf

    @isset($method)
        @if($method == 'put')
            @method('PUT')
        @elseif($method == 'patch')
            @method('PATCH')
        @endif
    @endisset

    {{ $slot }}

    @isset($button)
        <button type="submit" name="formButton" class="btn btn-primary">
            {{ $button }}
        </button>
    @endisset
</form>
<script type="text/javascript">
    $('form').submit(function(){
        $(this).find('button[type=submit]').prop('disabled', true);
    });
</script>
