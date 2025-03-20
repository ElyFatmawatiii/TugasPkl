<a href="{{ route('pendaftaran.edit', $row->id) }}" class="btn btn-warning btn-sm">
    <i class="fas fa-edit"></i>
</a>

<a href="{{ route('pendaftaran.show', $row->id) }}" class="btn btn-info btn-sm">
    <i class="fas fa-eye"></i> <!-- Ikon untuk detail -->
</a>

<form id="delete-form-{{ $row->id }}" action="{{ route('pendaftaran.destroy', $row->id) }}" method="POST" class="delete-form d-inline">
    @csrf
    @method('DELETE')
    <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete('{{ $row->id }}')">
        <i class="fas fa-trash"></i>
    </button>
</form>
