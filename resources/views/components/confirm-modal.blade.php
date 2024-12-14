<!-- Modal de Confirmação -->
<div id="modal-{{ $id }}" class="fixed inset-0 bg-gray-500 bg-opacity-50 justify-center items-center z-50 hidden">
    <div class="bg-white p-6 rounded-lg w-1/3">
        <h2 class="text-xl font-bold">Excluir Contato</h2>
        <p class="mt-2">Você tem certeza que deseja excluir este contato?</p>

        <form id="delete-form-{{ $id }}" action="{{ route('contacts.destroy', $id) }}" method="POST" class="mt-4">
            @csrf
            @method('DELETE')

            <div class="flex justify-end space-x-2">
                <button type="button" id="cancel-button-{{ $id }}" class="bg-gray-500 text-white px-4 py-2 rounded" onclick="closeModal({{ $id }})">
                    Cancelar
                </button>
                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">
                    Excluir
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    function openModal(id) {
        document.getElementById("modal-" + id).classList.remove("hidden");
        document.getElementById("modal-" + id).classList.add("flex");
    }

    function closeModal(id) {
        document.getElementById("modal-" + id).classList.remove("flex");
        document.getElementById("modal-" + id).classList.add("hidden");
    }
</script>
