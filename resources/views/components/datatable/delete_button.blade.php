<form action="{{ $route }}" method="POST" class="btn btn-datatable me-2">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-datatable btn-icon btn-transparent-dark me-2">
        <i data-feather="trash"></i>
    </button>
</form>
